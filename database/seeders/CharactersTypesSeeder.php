<?php

namespace Database\Seeders;

use App\Models\Characters\Type;
use Illuminate\Database\Seeder;

class CharactersTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $charactersTypes = array(
            array(
                'name' => 'Main Character',
                'slug' => 'mc',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Player character',
                'slug' => 'pc',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Non-player character',
                'slug' => 'npc',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Friendly',
                'slug' => 'friendly',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Neutral',
                'slug' => 'neutral',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Hostile',
                'slug' => 'hostile',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Companion',
                'slug' => 'companion',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Boss',
                'slug' => 'boss',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Trader',
                'slug' => 'trader',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Quest Giver',
                'slug' => 'quest_giver',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Faction Leader',
                'slug' => 'faction_leader',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
        );
        foreach ($charactersTypes as $charactersType) {
            Type::create($charactersType);
        }
    }
}
