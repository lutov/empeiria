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
                'skill_type_id' => 1,
                'name' => 'Simple Attack',
                'slug' => 'simple_attack',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'skill_type_id' => 1,
                'name' => 'Feint Attack',
                'slug' => 'feint_attack',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'skill_type_id' => 1,
                'name' => 'Accurate Attack',
                'slug' => 'accurate_attack',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'skill_type_id' => 1,
                'name' => 'Powerful Attack',
                'slug' => 'powerful_attack',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'skill_type_id' => 1,
                'name' => 'Dodge',
                'slug' => 'dodge',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'skill_type_id' => 2,
                'name' => 'Block',
                'slug' => 'block',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'skill_type_id' => 2,
                'name' => 'Roll',
                'slug' => 'roll',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'skill_type_id' => 2,
                'name' => 'Disengage',
                'slug' => 'disengage',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'skill_type_id' => 2,
                'name' => 'Riposte',
                'slug' => 'riposte',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'skill_type_id' => 3,
                'name' => 'Heal',
                'slug' => 'heal',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'skill_type_id' => 3,
                'name' => 'Bandage',
                'slug' => 'bandage',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'skill_type_id' => 3,
                'name' => 'Defend',
                'slug' => 'defend',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'skill_type_id' => 4,
                'name' => 'Push',
                'slug' => 'push',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'skill_type_id' => 4,
                'name' => 'Throw',
                'slug' => 'throw',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'skill_type_id' => 4,
                'name' => 'Environment Action',
                'slug' => 'environment_action',
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
