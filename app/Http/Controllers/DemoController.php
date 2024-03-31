<?php

namespace App\Http\Controllers;

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
        $size = 500;
        $tileSize = 7;
        $scale = 5;
        $seed = microtime(true) * 10000;

        $generator = new PerlinNoiseHelper($seed);
        for ($iy = 0; $iy < $size; $iy++) {
            for ($ix = 0; $ix < $size; $ix++) {
                $map[$iy][$ix] = $generator->noise($ix, $iy, $size, array(6));
            }
        }

        $image = imagecreatetruecolor($size, $size);

        for ($iy = 0; $iy < $size/$tileSize; $iy++) {
            for ($ix = 0; $ix < $size/$tileSize; $ix++) {
                $h = self::getColor($map[$iy][$ix]);
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
}
