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
                'start_y' => 5,
                'start_x' => 5,
                'size_y' => 90,
                'size_x' => 90,
                'z_index' => 1,
                'biomes' => array(8, 9, 10, 11, 12, 13),
            ),
            array(
                'name' => 'Capital Fortress',
                'slug' => 'capital_fortress',
                'frequency' => 1,
                'description' => '',
                'alt_description' => '',
                'start_y' => 5,
                'start_x' => 100,
                'size_y' => 90,
                'size_x' => 90,
                'z_index' => 1,
                'biomes' => array(8, 9, 10, 11, 12, 13),
            ),
            array(
                'name' => 'Dark Capital',
                'slug' => 'dark_capital',
                'description' => '',
                'alt_description' => '',
                'frequency' => 1,
                'start_y' => 5,
                'start_x' => 195,
                'size_y' => 90,
                'size_x' => 90,
                'z_index' => 1,
                'biomes' => array(8, 9, 10, 11, 12, 13),
            ),
            array(
                'name' => 'Palace City',
                'slug' => 'palace_city',
                'description' => '',
                'alt_description' => '',
                'frequency' => 2,
                'start_y' => 5,
                'start_x' => 290,
                'size_y' => 60,
                'size_x' => 62,
                'z_index' => 1,
                'biomes' => array(8, 9, 10, 11, 12, 13),
            ),
            array(
                'name' => 'Stronghold',
                'slug' => 'stronghold',
                'frequency' => 2,
                'description' => '',
                'alt_description' => '',
                'start_y' => 5,
                'start_x' => 359,
                'size_y' => 60,
                'size_x' => 60,
                'z_index' => 1,
                'biomes' => array(8, 9, 10, 11, 12, 13),
            ),
            array(
                'name' => 'Dark City',
                'slug' => 'dark_city',
                'description' => '',
                'alt_description' => '',
                'frequency' => 2,
                'start_y' => 5,
                'start_x' => 425,
                'size_y' => 60,
                'size_x' => 60,
                'z_index' => 1,
                'biomes' => array(8, 9, 10, 11, 12, 13),
            ),
            array(
                'name' => 'Village',
                'slug' => 'village',
                'frequency' => 10,
                'description' => '',
                'alt_description' => '',
                'start_y' => 65,
                'start_x' => 290,
                'size_y' => 30,
                'size_x' => 62,
                'z_index' => 1,
                'biomes' => array(8, 9, 10, 11, 12, 13, 14),
            ),
            array(
                'name' => 'Cottage Village',
                'slug' => 'cottage_village',
                'frequency' => 5,
                'description' => '',
                'alt_description' => '',
                'start_y' => 65,
                'start_x' => 359,
                'size_y' => 30,
                'size_x' => 60,
                'z_index' => 1,
                'biomes' => array(8, 9, 10, 11, 12, 13),
            ),
            array(
                'name' => 'Desert Village',
                'slug' => 'desert_village',
                'frequency' => 3,
                'description' => '',
                'alt_description' => '',
                'start_y' => 65,
                'start_x' => 426,
                'size_y' => 31,
                'size_x' => 56,
                'z_index' => 1,
                'biomes' => array(5, 6, 7),
            ),
            array(
                'name' => 'Mountain Tile',
                'slug' => 'mountain_tile',
                'frequency' => 0,
                'description' => '',
                'alt_description' => '',
                'start_y' => 5,
                'start_x' => 490,
                'size_y' => 64,
                'size_x' => 64,
                'z_index' => 0,
                'biomes' => array(),
            ),
            array(
                'name' => 'Mountain',
                'slug' => 'mountain',
                'frequency' => 0,
                'description' => '',
                'alt_description' => '',
                'start_y' => 5,
                'start_x' => 560,
                'size_y' => 64,
                'size_x' => 64,
                'z_index' => 0,
                'biomes' => array(14, 15),
            ),
            array(
                'name' => 'Dormant Volcano',
                'slug' => 'dormant_volcano',
                'frequency' => 2,
                'description' => '',
                'alt_description' => '',
                'start_y' => 5,
                'start_x' => 630,
                'size_y' => 60,
                'size_x' => 64,
                'z_index' => 0,
                'biomes' => array(14, 15),
            ),
            array(
                'name' => 'Erupting Volcano',
                'slug' => 'erupting_volcano',
                'frequency' => 1,
                'description' => '',
                'alt_description' => '',
                'start_y' => 5,
                'start_x' => 699,
                'size_y' => 60,
                'size_x' => 64,
                'z_index' => 0,
                'biomes' => array(14, 15),
            ),
            array(
                'name' => 'Cabin',
                'slug' => 'cabin',
                'frequency' => 6,
                'description' => '',
                'alt_description' => '',
                'start_y' => 74,
                'start_x' => 494,
                'size_y' => 17,
                'size_x' => 21,
                'z_index' => 1,
                'biomes' => array(10, 11, 12, 13),
            ),
            array(
                'name' => 'Tent',
                'slug' => 'tent',
                'frequency' => 3,
                'description' => '',
                'alt_description' => '',
                'start_y' => 74,
                'start_x' => 517,
                'size_y' => 17,
                'size_x' => 23,
                'z_index' => 1,
                'biomes' => array(5, 6, 7, 8),
            ),
            array(
                'name' => 'Farm',
                'slug' => 'farm',
                'frequency' => 20,
                'description' => '',
                'alt_description' => '',
                'start_y' => 69,
                'start_x' => 559,
                'size_y' => 29,
                'size_x' => 30,
                'z_index' => 1,
                'biomes' => array(8, 9, 10, 11, 12, 13),
            ),
            array(
                'name' => 'Mansion',
                'slug' => 'mansion',
                'frequency' => 10,
                'description' => '',
                'alt_description' => '',
                'start_y' => 69,
                'start_x' => 593,
                'size_y' => 29,
                'size_x' => 31,
                'z_index' => 1,
                'biomes' => array(8, 9, 10, 11, 12, 13),
            ),
            array(
                'name' => 'Fort',
                'slug' => 'fort',
                'frequency' => 4,
                'description' => '',
                'alt_description' => '',
                'start_y' => 69,
                'start_x' => 629,
                'size_y' => 29,
                'size_x' => 28,
                'z_index' => 1,
                'biomes' => array(8, 9, 10, 11, 12, 13),
            ),
            array(
                'name' => 'Crypt',
                'slug' => 'crypt',
                'frequency' => 5,
                'description' => '',
                'alt_description' => '',
                'start_y' => 69,
                'start_x' => 664,
                'size_y' => 31,
                'size_x' => 29,
                'z_index' => 1,
                'biomes' => array(8, 9, 10, 11, 12, 13),
            ),
            array(
                'name' => 'Ziggurat',
                'slug' => 'ziggurat',
                'frequency' => 1,
                'description' => '',
                'alt_description' => '',
                'start_y' => 69,
                'start_x' => 698,
                'size_y' => 28,
                'size_x' => 30,
                'z_index' => 1,
                'biomes' => array(8, 9, 10, 11, 12, 13),
            ),
            array(
                'name' => 'Desert House',
                'slug' => 'desert_house',
                'frequency' => 5,
                'description' => '',
                'alt_description' => '',
                'start_y' => 69,
                'start_x' => 734,
                'size_y' => 27,
                'size_x' => 28,
                'z_index' => 1,
                'biomes' => array(6, 7, 8),
            ),
            array(
                'name' => 'Tower',
                'slug' => 'tower',
                'frequency' => 3,
                'description' => '',
                'alt_description' => '',
                'start_y' => 5,
                'start_x' => 767,
                'size_y' => 58,
                'size_x' => 29,
                'z_index' => 1,
                'biomes' => array(8, 9, 10, 11, 12, 13),
            ),
            array(
                'name' => 'Watchtower',
                'slug' => 'watchtower',
                'frequency' => 2,
                'description' => '',
                'alt_description' => '',
                'start_y' => 5,
                'start_x' => 799,
                'size_y' => 59,
                'size_x' => 29,
                'z_index' => 1,
                'biomes' => array(8, 9, 10, 11, 12, 13),
            ),
            array(
                'name' => 'Hole',
                'slug' => 'Hole',
                'frequency' => 5,
                'description' => '',
                'alt_description' => '',
                'start_y' => 69,
                'start_x' => 767,
                'size_y' => 26,
                'size_x' => 29,
                'z_index' => 0,
                'biomes' => array(8, 9, 10, 11, 12, 13),
            ),
            array(
                'name' => 'Pond',
                'slug' => 'pond',
                'frequency' => 10,
                'description' => '',
                'alt_description' => '',
                'start_y' => 69,
                'start_x' => 796,
                'size_y' => 26,
                'size_x' => 32,
                'z_index' => 0,
                'biomes' => array(8, 9, 10, 11, 12, 13),
            ),
            array(
                'name' => 'Bush',
                'slug' => 'bush',
                'frequency' => 20,
                'description' => '',
                'alt_description' => '',
                'start_y' => 13,
                'start_x' => 838,
                'size_y' => 16,
                'size_x' => 14,
                'z_index' => 0,
                'biomes' => array(10),
            ),
            array(
                'name' => 'Bushes',
                'slug' => 'bushes',
                'frequency' => 20,
                'description' => '',
                'alt_description' => '',
                'start_y' => 8,
                'start_x' => 862,
                'size_y' => 27,
                'size_x' => 29,
                'z_index' => 0,
                'biomes' => array(10),
            ),
            array(
                'name' => 'Tree',
                'slug' => 'tree',
                'frequency' => 40,
                'description' => '',
                'alt_description' => '',
                'start_y' => 5,
                'start_x' => 892,
                'size_y' => 32,
                'size_x' => 32,
                'z_index' => 2,
                'biomes' => array(11),
            ),
            array(
                'name' => 'Rock',
                'slug' => 'rock',
                'frequency' => 40,
                'description' => '',
                'alt_description' => '',
                'start_y' => 10,
                'start_x' => 930,
                'size_y' => 21,
                'size_x' => 22,
                'z_index' => 0,
                'biomes' => array(12),
            ),
            array(
                'name' => 'Rocks',
                'slug' => 'rocks',
                'frequency' => 20,
                'description' => '',
                'alt_description' => '',
                'start_y' => 5,
                'start_x' => 959,
                'size_y' => 31,
                'size_x' => 32,
                'z_index' => 0,
                'biomes' => array(12),
            ),
            array(
                'name' => 'Reinforced Sand Mine',
                'slug' => 'reinforced_sand_mine',
                'frequency' => 2,
                'description' => '',
                'alt_description' => '',
                'start_y' => 65,
                'start_x' => 828,
                'size_y' => 30,
                'size_x' => 32,
                'z_index' => 1,
                'biomes' => array(6, 7),
            ),
            array(
                'name' => 'Sand Mine',
                'slug' => 'sand_mine',
                'frequency' => 2,
                'description' => '',
                'alt_description' => '',
                'start_y' => 65,
                'start_x' => 860,
                'size_y' => 31,
                'size_x' => 32,
                'z_index' => 1,
                'biomes' => array(6, 7),
            ),
            array(
                'name' => 'Reinforced Stone Mine',
                'slug' => 'reinforced_stone_mine',
                'frequency' => 5,
                'description' => '',
                'alt_description' => '',
                'start_y' => 65,
                'start_x' => 893,
                'size_y' => 33,
                'size_x' => 31,
                'z_index' => 1,
                'biomes' => array(8, 9, 10, 11, 12, 13),
            ),
            array(
                'name' => 'Stone Mine',
                'slug' => 'stone_mine',
                'frequency' => 4,
                'description' => '',
                'alt_description' => '',
                'start_y' => 65,
                'start_x' => 924,
                'size_y' => 31,
                'size_x' => 31,
                'z_index' => 1,
                'biomes' => array(8, 9, 10, 11, 12, 13),
            ),
        );
        foreach ($structures as $structure) {
            Structure::create($structure);
        }
    }
}
