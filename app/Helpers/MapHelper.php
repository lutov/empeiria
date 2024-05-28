<?php


namespace App\Helpers;


use App\Models\Names\Name;
use App\Models\Worlds\Structure;
use App\Models\Worlds\World;
use Illuminate\Support\Facades\File;

class MapHelper
{
    public int $worldId;
    public string $seed;
    public array $octaves;
    public int $size;
    public int $tileSize;
    public float $scale;
    public array $noiseMap;
    public array $mask;
    public HeightMapHelper $heightMap;
    public array $biomeMap;
    public array $biomeArray;
    public array $structureMap;
    public $image;

    /**
     * MapHelper constructor.
     * @param int $worldId
     * @param string $seed
     * @param array $octaves
     * @param int $size
     * @param int $tileSize
     * @param int $scale
     */
    public function __construct(
        int $worldId = 0,
        string $seed = '',
        array $octaves = array(),
        int $size = 0,
        int $tileSize = 0,
        int $scale = 0
    ) {
        $this->worldId = $worldId;
        $this->seed = $seed;
        $this->octaves = $octaves;
        $this->size = $size;
        $this->tileSize = $tileSize;
        $this->scale = $scale;
        $this->structureMap = array();
    }

    /**
     * @return array
     */
    public function getNoiseMap()
    {
        $seed = (is_int($this->seed)) ? $this->seed : crc32($this->seed);
        $octaves = $this->octaves;
        $size = $this->size;
        $scale = $this->scale;
        $highestPoint = 0.0;
        $lowestPoint = 0.0;
        $map = array();
        $generator = new PerlinNoiseHelper($seed);
        $sizeY = ($size * $scale);
        $sizeX = ($size * $scale);
        for ($iy = 0; $iy < $sizeY; $iy++) {
            for ($ix = 0; $ix < $sizeX; $ix++) {
                $base = $generator->noise($ix, $iy, $size, array(64));
                $noise = $generator->noise($ix, $iy, $size, $octaves);
                $map[$iy][$ix] = $base + ($noise / 4);
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
        $this->heightMap = new HeightMapHelper($lowestPoint, $highestPoint);
        $this->noiseMap = $map;
        return $map;
    }

    /**
     * @return array
     */
    public function getBiomeMap()
    {
        $size = $this->size;
        $tileSize = $this->tileSize;
        $scale = $this->scale;
        $map = $this->noiseMap;
        $heightMap = $this->heightMap;
        $biomeMap = array();
        $biomeArray = array();
        for ($iy = 0; $iy < ($size * $scale) / $tileSize; $iy++) {
            for ($ix = 0; $ix < ($size * $scale) / $tileSize; $ix++) {
                $biomeId = BiomeHelper::getIdByTileHeight($map[$iy][$ix], $heightMap);
                $biomeMap[$iy][$ix] = $biomeId;
                $biomeArray[$biomeId][] = array('y' => $iy, 'x' => $ix);
            }
        }
        $this->biomeMap = $biomeMap;
        $this->biomeArray = $biomeArray;
        return $biomeMap;
    }

    /**
     * @return false|resource
     */
    public function getImage()
    {
        $size = $this->size;
        $tileSize = $this->tileSize;
        $scale = $this->scale;
        $biomeMap = $this->biomeMap;
        $image = imagecreatetruecolor(($size * $scale), ($size * $scale));
        for ($iy = 0; $iy < ($size * $scale) / $tileSize; $iy++) {
            for ($ix = 0; $ix < ($size * $scale) / $tileSize; $ix++) {
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

    /**
     * @param null $structures
     */
    public function createStructures($structures = null)
    {
        if(!$structures) {
            $structures = Structure::all();
        }
        $worldId = $this->worldId;
        $world = World::find($worldId);
        foreach($structures as $structure) {
            $frequency = $structure->frequency;
            for($i = 0; $i < $frequency; $i++) {
                $newStructure = array();
                $name = Name::random(array('city' => 1));
                $newStructure['name'] = $name;
                $position = $this->positionStructure($structure);
                if($position) {
                    $newStructure['position_y'] = $position['y'];
                    $newStructure['position_x'] = $position['x'];
                    $world->structures()->attach($structure->id, $newStructure);
                }
            }
        }
    }

    /**
     * @param Structure $structure
     * @return int[]
     */
    protected function positionStructure(Structure $structure) {
        $position = array('y' => 0, 'x' => 0);
        $biomeArray = $this->biomeArray;
        $structureMap = $this->structureMap;
        $structureBiomes = $structure->biomes;
        $mapSize = (int) $this->size * $this->scale;
        if(count($biomeArray)) {
            $bid = array_rand($structureBiomes);
            $biomeId = $structureBiomes[$bid];
            if(isset($biomeArray[$biomeId]) && count($biomeArray[$biomeId])) {
                $pid = array_rand($biomeArray[$biomeId]);
                $position = $biomeArray[$biomeId][$pid];

                $size_y = $structure->size_y;
                $size_x = $structure->size_x;
                for($sy = 0; $sy < $size_y; $sy++) {
                    for($sx = 0; $sx < $size_x; $sx++) {
                        $pz = $structure->z_index;
                        $py = $position['y'] + $sy;
                        $px = $position['x'] + $sx;

                        /*
                        $isPointEmpty = !isset($structureMap[$pz][$py][$px]);
                        $isInsideBoundaries = (($py < ($mapSize - 15)) && ($px < ($mapSize - 15)));
                        if($isPointEmpty) {
                            $structureMap[$pz][$py][$px] = $structure->id;
                        } else {
                            return null;
                            //return $this->positionStructure($structure);
                        }
                        */

                        $structureMap[$pz][$py][$px] = $structure->id;

                    }
                }
            }
        }
        $this->structureMap = $structureMap;
        return $position;
    }
}
