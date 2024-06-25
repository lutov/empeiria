<?php

namespace Database\Seeders;

use App\Models\Characters\Skill;
use Illuminate\Database\Seeder;

class CharactersSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = array(
            array(
                'name' => '',
                'slug' => '',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
        );
        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
