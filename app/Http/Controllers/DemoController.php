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
        $seed = 'buhurt';
        $octaves = array(3, 6, 12, 24);
        $size = 1000;
        $tileSize = 5;
        $filename = 'visual5';
        $map = new MapHelper(1, $seed, $octaves, $size, $tileSize);
        $map->getNoiseMap();
        $map->getBiomeMap();
        $image = $map->getImage();
        $fullPath = $map->saveImage($image, $filename);

        $data = array(
            'seed' => $seed,
            'fullPath' => $fullPath,
        );
        return view('games.demo', $data);
    }
}
