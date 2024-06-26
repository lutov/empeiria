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
                'name' => 'Simple Attack',
                'slug' => 'simple_attack',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Feint Attack',
                'slug' => 'feint_attack',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Accurate Attack',
                'slug' => 'accurate_attack',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Powerful Attack',
                'slug' => 'powerful_attack',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Dodge',
                'slug' => 'dodge',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Block',
                'slug' => 'block',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Roll',
                'slug' => 'roll',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Disengage',
                'slug' => 'disengage',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Riposte',
                'slug' => 'riposte',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Heal',
                'slug' => 'heal',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Bandage',
                'slug' => 'bandage',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Defend',
                'slug' => 'defend',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Push',
                'slug' => 'push',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
                'name' => 'Throw',
                'slug' => 'throw',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
            ),
            array(
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
