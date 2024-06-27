<?php

namespace Database\Seeders;

use App\Models\Characters\SkillType;
use Illuminate\Database\Seeder;

class CharactersSkillsTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills_types = array(
            array(
                'name' => 'Attack',
                'slug' => 'attack',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Defence',
                'slug' => 'defence',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Support',
                'slug' => 'support',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Opportunity',
                'slug' => 'opportunity',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
        );
        foreach ($skills_types as $skill_type) {
            SkillType::create($skill_type);
        }
    }
}
