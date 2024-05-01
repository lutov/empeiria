<?php


namespace App\Helpers;


use App\Models\Worlds\Biome;
use Illuminate\Support\Facades\Cache;

class BiomeHelper
{
    /**
     * @param float $tileHeight
     * @param HeightMapHelper $heightMap
     * @return int
     */
    public static function getIdByTileHeight(float $tileHeight, HeightMapHelper $heightMap)
    {
        $biomes = Cache::rememberForever('biomes', function () {
            return Biome::all();
        });
        foreach($biomes as $biome) {
            if($tileHeight < $heightMap->get($biome->height)) {
                return $biome->id;
            }
        }
        return 0;
    }

    /**
     * @param int $id
     * @return array
     */
    public static function getRGB(int $id)
    {
        $result = array(
            'red' => 255,
            'green' => 255,
            'blue' => 255,
        );
        $biome = Cache::rememberForever('biome_'.$id, function () use ($id) {
            return Biome::find($id);
        });
        if($biome) {
            $result = array(
                'red' => $biome->red,
                'green' => $biome->green,
                'blue' => $biome->blue,
            );
        }
        return $result;
    }

}
