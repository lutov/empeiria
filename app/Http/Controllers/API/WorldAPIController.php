<?php

namespace App\Http\Controllers\API;

use App\Helpers\MapHelper;
use App\Models\Worlds\Biome;
use App\Models\Worlds\World;
use BlackScorp\Astar\Astar;
use BlackScorp\Astar\Grid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class WorldAPIController extends APIController
{

    /**
     * @return mixed
     */
    public function index()
    {
        $user = Auth::user();
        return World::where('user_id', $user->id)->get();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function preview(Request $request)
    {
        $seed = $request->get('seed');
        $octaves = explode(', ', $request->get('octaves'));
        foreach($octaves as $key => $value) {
            $octaves[$key] = (int) $value;
        }
        $size = 200;
        $tileSize = 2;
        $map = new MapHelper(1, $seed, $octaves, $size, $tileSize);
        $preview = $map->getPreview();
        return base64_encode($preview);
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function show(int $id)
    {
        return World::find($id);
    }

    /**
     * @param  Request  $request
     * @return World
     */
    public function store(Request $request)
    {
        $world = new World();
        $user = Auth::user();
        $gameId = $request->get('gameId');
        $name = $request->get('name');
        $seed = $request->get('seed');
        $octaves = $request->get('octaves');
        if(is_string($octaves)) {
            $octaves = explode(', ', $octaves);
            foreach($octaves as $key => $value) {
                $octaves[$key] = (int) $value;
            }
        }
        $size = $request->get('size');
        $tileSize = $request->get('tile_size');
        $scale = $request->get('scale');
        if (!empty($name)) {
            $world->user_id = $user->id;
            $world->game_id = $gameId;
            $world->name = $name;
            $world->seed = $seed;
            $world->octaves = $octaves;
            $world->size = $size;
            $world->tile_size = $tileSize;
            $world->scale = $scale;
            $world->save();
            self::createMap($world);
        }
        return $world;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function update(int $id)
    {
        $world = World::find($id);
        if (isset($world->id)) {
            //
        }
        return $world;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        $world = World::find($id);
        if (isset($world->id)) {
            $world->delete();
        }
        return $world;
    }

    /**
     * @param World $world
     */
    private static function createMap(World $world)
    {
        $worldId = $world->id;
        $seed = $world->seed;
        $octaves = $world->octaves; // array(3, 6, 12, 24);
        $size = $world->size; // 100
        $tileSize = $world->tile_size; // 6;
        $scale = $world->scale; // 12;
        $filename = 'map';
        $map = new MapHelper($worldId, $seed, $octaves, $size, $tileSize, $scale);
        $map->getNoiseMap();
        $map->getBiomeMap();
        $image = $map->getImage();
        $map->saveImage($image, $filename);
        $map->createStructures();
    }

    /**
     * @param Request $request
     * @param int $id
     * @return array
     */
    public function path(Request $request, int $id)
    {
        $result = array();
        $path = array();
        $world = World::find($id);
        $tileSize = 6;

        $x = $request->get('x');
        $y = $request->get('y');
        $mouseX = $request->get('mouseX');
        $mouseY = $request->get('mouseY');

        if($x < $mouseX) {
            $startX = $x;
            $endX = $mouseX;
        } else {
            $startX = $mouseX;
            $endX = $x;
        }

        if($y < $mouseY) {
            $startY = $y;
            $endY = $mouseY;
        } else {
            $startY = $mouseY;
            $endY = $y;
        }

        $startTileY = (int) round(($startY / $tileSize), 0, PHP_ROUND_HALF_DOWN);
        $startTileX = (int) round(($startX / $tileSize), 0, PHP_ROUND_HALF_DOWN);
        $endTileY = (int) round(($endY / $tileSize), 0, PHP_ROUND_HALF_DOWN);
        $endTileX = (int) round(($endX / $tileSize), 0, PHP_ROUND_HALF_DOWN);

        if (isset($world->id)) {
            // TODO add refresh option
            $biomeMap = Cache::rememberForever('biome_map_'.$world->id, function () use ($world, $tileSize) {
                $octaves = array(3, 6, 12, 24);
                $size = 100;
                $scale = 12;
                $map = new MapHelper($world->id, $world->seed, $octaves, $size, $tileSize, $scale);
                $map->getNoiseMap();
                return $map->getBiomeMap();
            });

            $map = array();
            for($iy = $startY; $iy <= $endY; $iy++) {
                for($ix = $startX; $ix <= $endX; $ix++) {
                    $tileY = (int) round(($iy / $tileSize), 0, PHP_ROUND_HALF_DOWN);
                    $tileX = (int) round(($ix / $tileSize), 0, PHP_ROUND_HALF_DOWN);
                    if(isset($map[$tileY][$tileX])) {
                        continue;
                    }
                    $biomeId = $biomeMap[$tileY][$tileX];
                    $biome = Cache::rememberForever('biome_'.$biomeId, function () use ($biomeId) {
                        return Biome::find($biomeId);
                    });
                    $map[$tileY][$tileX] = $biome->energy_cost;
                }
            }

            $energy = 0;
            $grid = new Grid($map);
            $startPosition = $grid->getPoint($startTileY, $startTileX);
            $endPosition = $grid->getPoint($endTileY, $endTileX);
            $aStar = new Astar($grid);
            $nodes = $aStar->search($startPosition,$endPosition);
            if(count($nodes)) {
                foreach($nodes as $key => $node) {
                    $path[$key] = array($node->getY(), $node->getX());
                    $energy += $map[$node->getY()][$node->getX()];
                }
                $result['energy'] = $energy;
                $result['path'] = $path;
            } else {
                // echo "Path not found";
            }
        }
        return $result;
    }

    /**
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function structures(Request $request, int $id)
    {
        $world = World::find($id);
        $structures = $world->structures()->orderBy('z_index')->get();
        return $structures;
    }

}
