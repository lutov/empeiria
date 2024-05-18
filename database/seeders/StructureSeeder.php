<?php

namespace Database\Seeders;

use App\Models\Worlds\Structure;
use Illuminate\Database\Seeder;

class StructureSeeder extends Seeder
{
    public function run()
    {
        $structures = array(
            array(
                'name' => 'Capital City',
                'slug' => 'capital_city',
                'description' => '',
                'alt_description' => '',
                'frequency' => 1,
                'start_y' => 360,
                'start_x' => 0,
                'size_y' => 90,
                'size_x' => 90,
                'biome_id' => 1,
            ),
            array(
                'name' => 'Dark Capital',
                'slug' => 'dark_capital',
                'description' => '',
                'alt_description' => '',
                'frequency' => 1,
                'start_y' => 450,
                'start_x' => 0,
                'size_y' => 90,
                'size_x' => 90,
                'biome_id' => 1,
            ),
            array(
                'name' => 'Capital Fortress',
                'slug' => 'capital_fortress',
                'frequency' => 1,
                'description' => '',
                'alt_description' => '',
                'start_y' => 360,
                'start_x' => 100,
                'size_y' => 90,
                'size_x' => 90,
                'biome_id' => 1,
            ),
            array(
                'name' => 'Palace City',
                'slug' => 'palace_city',
                'description' => '',
                'alt_description' => '',
                'frequency' => 2,
                'start_y' => 195,
                'start_x' => 160,
                'size_y' => 60,
                'size_x' => 60,
                'biome_id' => 1,
            ),
            array(
                'name' => 'Dark City',
                'slug' => 'dark_city',
                'description' => '',
                'alt_description' => '',
                'frequency' => 2,
                'start_y' => 256,
                'start_x' => 100,
                'size_y' => 60,
                'size_x' => 60,
                'biome_id' => 1,
            ),
            array(
                'name' => 'Stronghold',
                'slug' => 'stronghold',
                'frequency' => 2,
                'description' => '',
                'alt_description' => '',
                'start_y' => 195,
                'start_x' => 100,
                'size_y' => 60,
                'size_x' => 60,
                'biome_id' => 1,
            ),
            array(
                'name' => 'Tower',
                'slug' => 'tower',
                'frequency' => 3,
                'description' => '',
                'alt_description' => '',
                'start_y' => 260,
                'start_x' => 160,
                'size_y' => 60,
                'size_x' => 30,
                'biome_id' => 1,
            ),
            array(
                'name' => 'Citadel',
                'slug' => 'citadel',
                'frequency' => 3,
                'description' => '',
                'alt_description' => '',
                'start_y' => 260,
                'start_x' => 195,
                'size_y' => 60,
                'size_x' => 30,
                'biome_id' => 1,
            ),
        );
        foreach ($structures as $structure) {
            Structure::create($structure);
        }
    }
}
