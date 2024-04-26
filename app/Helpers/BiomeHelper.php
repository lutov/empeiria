<?php


namespace App\Helpers;


use App\Models\Worlds\Biome;

class BiomeHelper
{
    /**
     * @param float $tileHeight
     * @param HeightMapHelper $heightMap
     * @return int
     */
    public static function getIdByTileHeight(float $tileHeight, HeightMapHelper $heightMap)
    {
        $biomes = Biome::all();
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
        $biome = Biome::find($id);
        return array(
            'red' => $biome->red,
            'green' => $biome->green,
            'blue' => $biome->blue,
        );
    }

}
