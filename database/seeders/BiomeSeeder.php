<?php

namespace Database\Seeders;

use App\Models\Worlds\Biome;
use Illuminate\Database\Seeder;

class BiomeSeeder extends Seeder
{
    /**
     * @var array
     */
    private array $params = array(
        [
            'name' => "Abyss",
            'height_min' => 0,
            'height_max' => 39,
            'temperature_min' => -10,
            'temperature_max' => 50,
            'humidity_min' => -10,
            'humidity_max' => 999,
            'color' => '#090140'
        ],
        [
            'name' => "Ocean",
            'height_min' => 40,
            'height_max' => 129,
            'temperature_min' => -10,
            'temperature_max' => 50,
            'humidity_min' => -10,
            'humidity_max' => 999,
            'color' => '#2107D8'
        ],
        [
            'name' => "IceLands",
            'height_min' => 0,
            'height_max' => 170,
            'temperature_min' => -999,
            'temperature_max' => 0,
            'humidity_min' => -999,
            'humidity_max' => 999,
            'color' => '#75FCF2'
        ],
        [
            'name' => "Shore",
            'height_min' => 130,
            'height_max' => 135,
            'temperature_min' => 0,
            'temperature_max' => 50,
            'humidity_min' => -999,
            'humidity_max' => 50,
            'color' => '#C7CE00'
        ],
        [
            'name' => "SnowyShore",
            'height_min' => 130,
            'height_max' => 135,
            'temperature_min' => -999,
            'temperature_max' => 0,
            'humidity_min' => -999,
            'humidity_max' => 999,
            'color' => '#EDFCA8'
        ],
        [
            'name' => "Plains",
            'height_min' => 135,
            'height_max' => 169,
            'temperature_min' => 0,
            'temperature_max' => 50,
            'humidity_min' => 0,
            'humidity_max' => 50,
            'color' => '#40D115'
        ],
        [
            'name' => "FireLands",
            'height_min' => 135,
            'height_max' => 169,
            'temperature_min' => 50,
            'temperature_max' => 999,
            'humidity_min' => -999,
            'humidity_max' => 30,
            'color' => '#E57307'
        ],
        [
            'name' => "Forest",
            'height_min' => 140,
            'height_max' => 169,
            'temperature_min' => 0,
            'temperature_max' => 25,
            'humidity_min' => 5,
            'humidity_max' => 30,
            'color' => '#128B03'
        ],
        [
            'name' => "Tundra",
            'height_min' => 140,
            'height_max' => 169,
            'temperature_min' => -10,
            'temperature_max' => 0,
            'humidity_min' => 5,
            'humidity_max' => 999,
            'color' => '#745F4E'
        ],
        [
            'name' => "Desert",
            'height_min' => 135,
            'height_max' => 169,
            'temperature_min' => 30,
            'temperature_max' => 999,
            'humidity_min' => -999,
            'humidity_max' => 5,
            'color' => '#CBB848'
        ],
        [
            'name' => "GrassyHills",
            'height_min' => 160,
            'height_max' => 189,
            'temperature_min' => 5,
            'temperature_max' => 25,
            'humidity_min' => 5,
            'humidity_max' => 30,
            'color' => '#2E7612'
        ],
        [
            'name' => "ForestyHills",
            'height_min' => 160,
            'height_max' => 189,
            'temperature_min' => 5,
            'temperature_max' => 30,
            'humidity_min' => 0,
            'humidity_max' => 30,
            'color' => '#1B5504'
        ],
        [
            'name' => "MuddyHills",
            'height_min' => 170,
            'height_max' => 189,
            'temperature_min' => 0,
            'temperature_max' => 40,
            'humidity_min' => 0,
            'humidity_max' => 50,
            'color' => '#984319'
        ],
        [
            'name' => "DryHills",
            'height_min' => 140,
            'height_max' => 189,
            'temperature_min' => 10,
            'temperature_max' => 40,
            'humidity_min' => -999,
            'humidity_max' => 0,
            'color' => '#C6950A'
        ],
        [
            'name' => "SnowyHills",
            'height_min' => 170,
            'height_max' => 189,
            'temperature_min' => -999,
            'temperature_max' => 0,
            'humidity_min' => -999,
            'humidity_max' => 999,
            'color' => '#1FA27C'
        ],
        [
            'name' => "DesertDunes",
            'height_min' => 170,
            'height_max' => 189,
            'temperature_min' => 30,
            'temperature_max' => 999,
            'humidity_min' => -999,
            'humidity_max' => 0,
            'color' => '#7E7109'
        ],
        [
            'name' => "Volcano",
            'height_min' => 170,
            'height_max' => 255,
            'temperature_min' => 30,
            'temperature_max' => 999,
            'humidity_min' => -999,
            'humidity_max' => 35,
            'color' => '#AF1109'
        ],
        [
            'name' => "RockyMountains",
            'height_min' => 180,
            'height_max' => 255,
            'temperature_min' => -999,
            'temperature_max' => 30,
            'humidity_min' => -999,
            'humidity_max' => 40,
            'color' => '#43100D'
        ],
        [
            'name' => "IceMountains",
            'height_min' => 180,
            'height_max' => 255,
            'temperature_min' => -999,
            'temperature_max' => 0,
            'humidity_min' => 5,
            'humidity_max' => 999,
            'color' => '#5B6A63'
        ],
        [
            'name' => "Swamp",
            'height_min' => 130,
            'height_max' => 170,
            'temperature_min' => 0,
            'temperature_max' => 35,
            'humidity_min' => 40,
            'humidity_max' => 999,
            'color' => '#052403'
        ],
        [
            'name' => "RainForest",
            'height_min' => 140,
            'height_max' => 180,
            'temperature_min' => 30,
            'temperature_max' => 40,
            'humidity_min' => 40,
            'humidity_max' => 999,
            'color' => '#324B28'
        ],
        [
            'name' => "DryLands",
            'height_min' => 0,
            'height_max' => 150,
            'temperature_min' => 0,
            'temperature_max' => 40,
            'humidity_min' => -999,
            'humidity_max' => 0,
            'color' => '#834C10'
        ],
        [
            'name' => "Savannah",
            'height_min' => 135,
            'height_max' => 169,
            'temperature_min' => 20,
            'temperature_max' => 50,
            'humidity_min' => -10,
            'humidity_max' => 10,
            'color' => '#767618'
        ],
        [
            'name' => "GeyserLand",
            'height_min' => 130,
            'height_max' => 170,
            'temperature_min' => 40,
            'temperature_max' => 999,
            'humidity_min' => 40,
            'humidity_max' => 999,
            'color' => '#3A3B55'
        ],
        [
            'name' => "None",
            'height_min' => 0,
            'height_max' => 255,
            'temperature_min' => -999,
            'temperature_max' => 999,
            'humidity_min' => -999,
            'humidity_max' => 999,
            'color' => '#E513C3'
        ],
    );

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->params as $param) {
            $biome = new Biome();
            $biome->name = $param['name'];
            $biome->height_min = $param['height_min'];
            $biome->height_max = $param['height_max'];
            $biome->temperature_min = $param['temperature_min'];
            $biome->temperature_max = $param['temperature_max'];
            $biome->humidity_min = $param['humidity_min'];
            $biome->humidity_max = $param['humidity_max'];
            $biome->color = $param['color'];
            $biome->save();
        }
    }
}
