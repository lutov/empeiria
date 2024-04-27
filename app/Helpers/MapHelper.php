<?php


namespace App\Helpers;


use Illuminate\Support\Facades\File;

class MapHelper
{
    public int $worldId;
    public string $seed;
    public array $octaves;
    public int $size;
    public int $tileSize;
    public array $noiseMap;
    public HeightMapHelper $heightMap;
    public array $biomeMap;
    public $image;

    /**
     * MapHelper constructor.
     * @param int $worldId
     * @param string $seed
     * @param array $octaves
     * @param int $size
     * @param int $tileSize
     */
    public function __construct(
        int $worldId = 0,
        string $seed = '',
        array $octaves = array(),
        int $size = 0,
        int $tileSize = 0
    ) {
        $this->worldId = $worldId;
        $this->seed = $seed;
        $this->octaves = $octaves;
        $this->size = $size;
        $this->tileSize = $tileSize;
    }

    /**
     * @return array
     */
    public function getNoiseMap()
    {
        $seed = (is_int($this->seed)) ? $this->seed : crc32($this->seed);
        $octaves = $this->octaves;
        $size = $this->size;
        $highestPoint = 0.0;
        $lowestPoint = 0.0;
        $map = array();
        $generator = new PerlinNoiseHelper($seed);
        for ($iy = 0; $iy < $size; $iy++) {
            for ($ix = 0; $ix < $size; $ix++) {
                $map[$iy][$ix] = $generator->noise($ix, $iy, $size, $octaves);
            }

            $lowPoint = min($map[$iy]);
            if ($lowPoint < $lowestPoint) {
                $lowestPoint = $lowPoint;
            }

            $highPoint = max($map[$iy]);
            if ($highestPoint < $highPoint) {
                $highestPoint = $highPoint;
            }
        }
        $this->noiseMap = $map;
        $this->heightMap = new HeightMapHelper($lowestPoint, $highestPoint);
        return $map;
    }

    /**
     * @return array
     */
    public function getBiomeMap()
    {
        $size = $this->size;
        $tileSize = $this->tileSize;
        $map = $this->noiseMap;
        $heightMap = $this->heightMap;
        $biomeMap = array();
        for ($iy = 0; $iy < $size / $tileSize; $iy++) {
            for ($ix = 0; $ix < $size / $tileSize; $ix++) {
                $biomeMap[$iy][$ix] = BiomeHelper::getIdByTileHeight($map[$iy][$ix], $heightMap);
            }
        }
        $this->biomeMap = $biomeMap;
        return $biomeMap;
    }

    /**
     * @return false|resource
     */
    public function getImage()
    {
        $size = $this->size;
        $tileSize = $this->tileSize;
        $biomeMap = $this->biomeMap;
        $image = imagecreatetruecolor($size, $size);
        for ($iy = 0; $iy < $size / $tileSize; $iy++) {
            for ($ix = 0; $ix < $size / $tileSize; $ix++) {
                $rgb = BiomeHelper::getRGB($biomeMap[$iy][$ix]);
                $color = imagecolorallocate($image, $rgb['red'], $rgb['green'], $rgb['blue']);
                imagefilledrectangle(
                    $image,
                    ($ix * $tileSize),
                    ($iy * $tileSize),
                    ($ix * $tileSize) + $tileSize,
                    ($iy * $tileSize) + $tileSize,
                    $color
                );
            }
        }
        return $image;
    }

    /**
     * @param $image
     * @param string $filename
     * @return string
     */
    public function saveImage($image, string $filename)
    {
        $worldId = $this->worldId;
        $path = 'img/worlds/' . $worldId;
        if (!File::exists($path)) {
            File::makeDirectory(public_path($path));
        }
        $fullPath = $path . '/' . $filename . '.png';
        imagepng($image, public_path($fullPath));
        imagedestroy($image);
        return $fullPath;
    }

    /**
     * @param $image
     * @return false|string
     */
    public function returnImage($image)
    {
        ob_start();
        imagepng($image);
        $imageContent = ob_get_clean();
        imagedestroy($image);
        return $imageContent;
    }

    /**
     * @return false|string
     */
    public function getPreview()
    {
        // TODO check performance
        $seed = (is_int($this->seed)) ? $this->seed : crc32($this->seed);
        $octaves = $this->octaves;
        $size = $this->size;
        $tileSize = $this->tileSize;
        $highestPoint = 0.0;
        $lowestPoint = 0.0;
        $map = array();
        $generator = new PerlinNoiseHelper($seed);
        for ($iy = 0; $iy < $size; $iy++) {
            for ($ix = 0; $ix < $size; $ix++) {
                $map[$iy][$ix] = $generator->noise($ix, $iy, $size, $octaves);
            }

            $lowPoint = min($map[$iy]);
            if ($lowPoint < $lowestPoint) {
                $lowestPoint = $lowPoint;
            }

            $highPoint = max($map[$iy]);
            if ($highestPoint < $highPoint) {
                $highestPoint = $highPoint;
            }
        }
        $heightMap = new HeightMapHelper($lowestPoint, $highestPoint);
        $image = imagecreatetruecolor($size, $size);
        for ($iy = 0; $iy < $size / $tileSize; $iy++) {
            for ($ix = 0; $ix < $size / $tileSize; $ix++) {
                $biomeId = BiomeHelper::getIdByTileHeight($map[$iy][$ix], $heightMap);
                $rgb = BiomeHelper::getRGB($biomeId);
                $color = imagecolorallocate($image, $rgb['red'], $rgb['green'], $rgb['blue']);
                imagefilledrectangle(
                    $image,
                    ($ix * $tileSize),
                    ($iy * $tileSize),
                    ($ix * $tileSize) + $tileSize,
                    ($iy * $tileSize) + $tileSize,
                    $color
                );
            }
        }
        ob_start();
        imagepng($image);
        $imageContent = ob_get_clean();
        imagedestroy($image);
        return $imageContent;
    }
}
