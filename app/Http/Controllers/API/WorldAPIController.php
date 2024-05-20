<?php

namespace App\Http\Controllers\API;

use App\Helpers\MapHelper;
use App\Helpers\PerlinNoiseHelper;
use App\Models\Worlds\Biome;
use App\Models\Worlds\World;
use BlackScorp\Astar\Astar;
use BlackScorp\Astar\Grid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

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

        if (!empty($name)) {
            $world->user_id = $user->id;
            $world->game_id = $gameId;
            $world->name = $name;
            $world->seed = $seed;
            $world->octaves = $octaves;
            $world->save();

            //$world->map()->create();
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
        // TODO reuse code from MapAPIController
        $map = array();

        $seed = crc32($world->seed);
        $octaves = (int) $world->octaves;

        $size = 500;
        $tileSize = 7;

        $generator = new PerlinNoiseHelper($seed);
        for ($iy = 0; $iy < $size; $iy++) {
            for ($ix = 0; $ix < $size; $ix++) {
                $map[$iy][$ix] = $generator->noise($ix, $iy, $size, array($octaves));
            }
        }

        $image = imagecreatetruecolor($size, $size);

        for ($iy = 0; $iy < $size/$tileSize; $iy++) {
            for ($ix = 0; $ix < $size/$tileSize; $ix++) {
                $h = self::getColor($map[$iy][$ix]);
                $color = imagecolorallocate($image, $h['r'], $h['g'], $h['b']);
                imagefilledrectangle($image, ($ix * $tileSize), ($iy * $tileSize),($ix * $tileSize) + $tileSize, ($iy * $tileSize) + $tileSize, $color);
            }
        }

        $path = 'img/worlds/'.$world->id;
        File::makeDirectory(public_path($path));
        $filename = $path.'/map.png';
        imagepng($image, public_path($filename));
        imagedestroy($image);
    }

    /**
     * @param float $v
     * @return int[]
     */
    public static function getColor(float $v)
    {
        $result = array('r' => 255, 'g' => 255, 'b' => 255);
        if($v < -0.5) {
            // deep water
            $result = array('r' => 48, 'g' => 113, 'b' => 155);
        } else if($v < -0.1) {
            // water
            $result = array('r' => 31, 'g' => 136, 'b' => 204);
        } else if($v < 0.0) {
            // sand
            $result = array('r' => 205, 'g' => 198, 'b' => 76);
        } else if($v < 0.2) {
            // soil
            $result = array('r' => 155, 'g' => 90, 'b' => 48);
        } else if($v < 0.4) {
            // grass
            $result = array('r' => 75, 'g' => 156, 'b' => 48);
        } else if($v < 0.8) {
            // forest
            $result = array('r' => 67, 'g' => 124, 'b' => 70);
        } else {
            // rock
            $result = array('r' => 161, 'g' => 175, 'b' => 184);
        }
        return $result;
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
        $structures = $world->structures;
        return $structures;
    }

}
