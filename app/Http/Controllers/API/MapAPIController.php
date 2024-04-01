<?php

namespace App\Http\Controllers\API;

use App\Helpers\PerlinNoiseHelper;
use Illuminate\Http\Request;

class MapAPIController extends APIController
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function preview(Request $request)
    {
        $map = array();

        $seed = crc32($request->get('seed'));
        $octaves = (int) $request->get('octaves', 6);

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
                //imagesetpixel($image, $ix, $iy, $color);
                imagefilledrectangle($image, ($ix * $tileSize), ($iy * $tileSize),($ix * $tileSize) + $tileSize, ($iy * $tileSize) + $tileSize, $color);
            }
        }

        //imagepng($image);
        ob_start();
        imagepng($image);
        $imageEncoded = ob_get_clean();
        imagedestroy($image);

        return base64_encode($imageEncoded);
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
