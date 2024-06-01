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
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class GameController extends Controller
{
    /**
     * @param Request $request
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
        /*
        $map = MapHelper::generate2();
        $map = WaterHelper::addWater($map);
        $map = LandscapeHelper::addHeight($map);
        */
        //$river = RiverHelper::generate(144, 144);
        /*
        return view('demo', array(
            'map' => MapHelper::render2D($map),
            //'river' => RiverHelper::render2D($river),
        ));
        */
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
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|RedirectResponse
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $games = Game::where('user_id', $user->id)->get();
        if(count($games)) {
            $game = $games->first();
            return redirect()->route('worlds', ['gameId' => $game->id]);
        }
        $data = array(
            'user' => $user,
            'games' => $games,
        );
        return view('games.games', $data);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return Factory|View
     */
    public function show(Request $request, int $id)
    {
        $game = Game::find($id);
        $data = array(
            'id' => $id,
            'game' => $game,
        );
        return view('games.game', $data);
    }
}
