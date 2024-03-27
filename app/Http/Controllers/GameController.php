<?php

namespace App\Http\Controllers;

use App\Helpers\BiomeHelper;
use App\Helpers\ColorHelper;
use App\Helpers\LandscapeHelper;
use App\Helpers\MapHelper;
use App\Helpers\PerlinNoiseHelper;
use App\Helpers\WaterHelper;
use App\Models\Games\Game;
use App\Models\Worlds\Biome;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class GameController extends Controller
{

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return Application|Factory|\Illuminate\Contracts\View\View
     * @throws Exception
     */
    public function demo(Request $request)
    {
        /*
        $biomes = Biome::all();
        $map['tiles'] = BiomeHelper::calculateHeight(10, 10, 0.005, $biomes);
        //dd($map);
        return view('demo', array(
            'map' => BiomeHelper::renderBiomes($map),
        ));
        */
        //$map = BiomeHelper::generateMap();
        //dd($map);
        $map = MapHelper::generate2();
        $map = WaterHelper::addWater($map);
        $map = LandscapeHelper::addHeight($map);
        //$river = RiverHelper::generate(144, 144);
        return view('demo', array(
            'map' => MapHelper::render2D($map),
            //'river' => RiverHelper::render2D($river),
        ));
        /*
        $x = $y = 4;
        $pixel = 16;
        $luminosity = 'dark';
        $gd = imagecreatetruecolor($x * $pixel * 2, $y * $pixel * 2);
        $image = array();
        $hue = ColorHelper::getRandomHue();
        for ($i = 0; $i < $x; $i++) {
            $colors = ColorHelper::many($x, array('luminosity' => $luminosity, 'hue' => $hue, 'format' => 'rgb'));
            foreach ($colors as $key => $color) {
                $colorId = imagecolorallocate($gd, $color['r'], $color['g'], $color['b']);
                $image[$i][$key] = $colorId;
            }
            $image[$i] = array_merge($image[$i], array_reverse($image[$i]));
        }
        $image = array_merge($image, array_reverse($image));
        //dd($image);
        $y1 = 0;
        foreach ($image as $i => $row) {
            $x1 = 0;
            $y2 = $y1 + ($pixel - 1);
            foreach ($row as $key => $color) {
                $x2 = $x1 + ($pixel - 1);
                imagefilledrectangle($gd, $x1, $y1, $x2, $y2, $color);
                $x1 = $x2 + 1;
            }
            $y1 = $y2 + 1;
        }

        header('Content-Type: image/png');
        imagepng($gd);
        //die();
        $path = 'img/squads/banners/003.png';
        imagepng($gd, public_path($path));
        imagedestroy($gd);
        */
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        return Game::where('user_id', $user->id)->get();
    }

    /**
     * @param Request $request
     * @return Game
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $game = new Game();
        $game->user_id = $user->id;
        $game->name = 'New Game '.date('Y-m-d H:i:s');
        $game->description = '';
        $game->save();
        return $game;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id)
    {
        return Game::find($id);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return Factory|View
     * @throws Exception
     */
    public function world(Request $request, int $id = 0)
    {

        //$map = MapHelper::generate();

        $key = 'world_map_' . $id;
        $seconds = 60 * 60;
        $map = Cache::remember($key, $seconds, function () {
            return MapHelper::generate();
        });

        MapHelper::draw($map, $id);

        echo MapHelper::render($map, $id);

        return view('world', array(
            'id' => $id,
        ));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return Factory|View
     */
    public function factions(Request $request, int $id = 0)
    {
        return view('faction', array(
            'request' => $request,
            'id' => $id,
        ));
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function squads(Request $request)
    {
        return view('game.squads', array(
            'request' => $request,
        ));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return Factory|\Illuminate\Contracts\View\View
     */
    public function squad(Request $request, int $id)
    {
        return view('game.squad', array(
            'request' => $request,
            'id' => $id,
        ));
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function characters(Request $request)
    {
        return view('game.characters', array(
            'request' => $request,
        ));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return Factory|View
     */
    public function character(Request $request, int $id = 0)
    {
        return view('game.character', array(
            'request' => $request,
            'id' => $id,
        ));
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function conversations(Request $request)
    {
        return view('conversations', array(
            'request' => $request,
        ));
    }

}
