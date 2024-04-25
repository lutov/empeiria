<?php

namespace App\Http\Controllers;

use App\Helpers\HeightMapHelper;
use App\Helpers\PerlinNoiseHelper;
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
        $map = array();
        $filename = 'visual.png';
        $size = 1000;
        $tileSize = 5;
        $scale = 5;
        $seed = microtime(true) * 10000;
        $highestPoint = 0.0;
        $lowestPoint = 0.0;

        $generator = new PerlinNoiseHelper($seed);
        for ($iy = 0; $iy < $size; $iy++) {
            for ($ix = 0; $ix < $size; $ix++) {
                $map[$iy][$ix] = $generator->noise($ix, $iy, $size, array(3, 6, 12, 24));
            }

            //dd(min($map[$iy]).' — '.max($map[$iy]));

            $lowPoint = min($map[$iy]);
            if($lowPoint < $lowestPoint) {
                $lowestPoint = $lowPoint;
            }

            $highPoint = max($map[$iy]);
            if($highestPoint < $highPoint) {
                $highestPoint = $highPoint;
            }
        }
        //dd($map);
        //dd($lowestPoint.' — '.$highestPoint);
        $height = new HeightMapHelper($lowestPoint, $highestPoint);

        $image = imagecreatetruecolor($size, $size);

        for ($iy = 0; $iy < $size/$tileSize; $iy++) {
            for ($ix = 0; $ix < $size/$tileSize; $ix++) {
                $h = self::getColor($map[$iy][$ix], $height);
                $color = imagecolorallocate($image, $h['r'], $h['g'], $h['b']);
                //imagesetpixel($image, $ix, $iy, $color);
                imagefilledrectangle($image, ($ix * $tileSize), ($iy * $tileSize),($ix * $tileSize) + $tileSize, ($iy * $tileSize) + $tileSize, $color);
            }
        }

        imagepng($image, $filename);
        imagedestroy($image);

        $data = array(
            'seed' => $seed,
            'filename' => $filename,
        );
        return view('games.demo', $data);

    }

    /**
     * @param float $v
     * @param HeightMapHelper $height
     * @return int[]
     */
    public static function getColor(float $v, HeightMapHelper $height)
    {
        $result = array('r' => 255, 'g' => 255, 'b' => 255);

        $rockBottom = array('r' => 40,      'g' => 100,     'b' => 138);
        $deepWater  = array('r' => 48,      'g' => 113,     'b' => 155);
        $midWater   = array('r' => 39,      'g' => 125,     'b' => 180);
        $water      = array('r' => 31,      'g' => 136,     'b' => 204);
        $wetSand    = array('r' => 118,     'g' => 167,     'b' => 140);
        $sand       = array('r' => 205,     'g' => 198,     'b' => 76);
        $dirt       = array('r' => 192,     'g' => 171,     'b' => 69);
        $soil       = array('r' => 155,     'g' => 90,      'b' => 48);
        $grass      = array('r' => 115,     'g' => 123,     'b' => 48);
        $bush       = array('r' => 71,      'g' => 140,     'b' => 59);
        $forest     = array('r' => 67,      'g' => 124,     'b' => 70);
        $stone      = array('r' => 72,      'g' => 113,     'b' => 79);
        $hill       = array('r' => 115,     'g' => 150,     'b' => 128);
        $rock       = array('r' => 161,     'g' => 175,     'b' => 184);
        $snow       = array('r' => 204,     'g' => 222,     'b' => 234);

        if($v < $height->get(10)) {
            $result = $rockBottom;
        } else if($v < $height->get(20)) {
            $result = $deepWater;
        }  else if($v < $height->get(30)) {
            $result = $midWater;
        } else if($v < $height->get(45)) {
            $result = $water;
        } else if($v < $height->get(50)) {
            $result = $wetSand;
        } else if($v < $height->get(53)) {
            $result = $sand;
        }  else if($v < $height->get(56)) {
            $result = $dirt;
        } else if($v < $height->get(58)) {
            $result = $soil;
        }  else if($v < $height->get(60)) {
            $result = $grass;
        } else if($v < $height->get(65)) {
            $result = $bush;
        } else if($v < $height->get(70)) {
            $result = $forest;
        }  else if($v < $height->get(75)) {
            $result = $stone;
        }  else if($v < $height->get(80)) {
            $result = $hill;
        }   else if($v < $height->get(90)) {
            $result = $rock;
        } else {
            $result = $snow;
        }
        return $result;
    }
}
