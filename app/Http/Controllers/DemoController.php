<?php

namespace App\Http\Controllers;

use App\Helpers\MapHelper;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DemoController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $worldId = 4;
        $seed = 'buhurt';
        $octaves = array(3, 6, 12, 24);
        $size = 100;
        $tileSize = 6;
        $scale = 12;
        $filename = 'visual12';
        $map = new MapHelper($worldId, $seed, $octaves, $size, $tileSize, $scale);
        $map->getNoiseMap();
        $map->getBiomeMap();
        //$image = $map->getImage();
        //$fullPath = $map->saveImage($image, $filename);
        $fullPath = 'img/worlds/' . $worldId . '/map.png';
        $map->createStructures();

        $data = array(
            'seed' => $seed,
            'fullPath' => $fullPath,
        );
        return view('games.demo', $data);
    }
}
