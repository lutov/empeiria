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
                'icon' => '<i class="bi-person-standing fs-3"></i><i class="bi-arrow-right"></i><i class="bi-person-standing fs-3"></i>',
            ),
            array(
                'skill_type_id' => 1,
                'name' => 'Feint Attack',
                'slug' => 'feint_attack',
                'description' => "",
                'alt_description' => "",
                'icon' => '<i class="bi-person-standing fs-3"></i><i class="bi-arrow-return-right"></i><i class="bi-person-standing fs-3"></i>',
            ),
            array(
                'skill_type_id' => 1,
                'name' => 'Accurate Attack',
                'slug' => 'accurate_attack',
                'description' => "",
                'alt_description' => "",
                'icon' => '<i class="bi-person-standing fs-3"></i><i class="bi-crosshair"></i><i class="bi-person-standing fs-3"></i>',
            ),
            array(
                'skill_type_id' => 1,
                'name' => 'Powerful Attack',
                'slug' => 'powerful_attack',
                'description' => "",
                'alt_description' => "",
                'icon' => '<i class="bi-person-raised-hand fs-3"></i><i class="bi-arrow-down-right"></i><i class="bi-person-standing fs-3"></i>',
            ),
            array(
                'skill_type_id' => 1,
                'name' => 'Dodge',
                'slug' => 'dodge',
                'description' => "",
                'alt_description' => "",
                'icon' => '<i class="bi-person-walking fs-3"></i><i class="bi-arrow-counterclockwise"></i><i class="bi-arrow-left"></i>',
            ),
            array(
                'skill_type_id' => 2,
                'name' => 'Block',
                'slug' => 'block',
                'description' => "",
                'alt_description' => "",
                'icon' => '<i class="bi-person-standing fs-3"></i><i class="bi-shield-fill"></i><i class="bi-arrow-left"></i>',
            ),
            array(
                'skill_type_id' => 2,
                'name' => 'Roll',
                'slug' => 'roll',
                'description' => "",
                'alt_description' => "",
                'icon' => '<i class="bi-arrow-counterclockwise"></i><i class="bi-person-walking fs-3"></i><i class="bi-arrow-counterclockwise"></i>',
            ),
            array(
                'skill_type_id' => 2,
                'name' => 'Disengage',
                'slug' => 'disengage',
                'description' => "",
                'alt_description' => "",
                'icon' => '<i class="bi-arrow-left"></i><i class="bi-person-walking fs-3"></i><i class="bi-arrow-left"></i>',
            ),
            array(
                'skill_type_id' => 2,
                'name' => 'Riposte',
                'slug' => 'riposte',
                'description' => "",
                'alt_description' => "",
                'icon' => '<i class="bi-person-standing fs-3"></i><i class="bi-arrow-left-right"></i><i class="bi-person-standing fs-3"></i>',
            ),
            array(
                'skill_type_id' => 3,
                'name' => 'Heal',
                'slug' => 'heal',
                'description' => "",
                'alt_description' => "",
                'icon' => '<i class="bi-person-standing fs-3"></i><i class="bi-magic"></i><i class="bi-person-standing fs-3"></i>',
            ),
            array(
                'skill_type_id' => 3,
                'name' => 'Bandage',
                'slug' => 'bandage',
                'description' => "",
                'alt_description' => "",
                'icon' => '<i class="bi-person-standing fs-3"></i><i class="bi-plus-lg"></i><i class="bi-person-standing fs-3"></i>',
            ),
            array(
                'skill_type_id' => 3,
                'name' => 'Defend',
                'slug' => 'defend',
                'description' => "",
                'alt_description' => "",
                'icon' => '<i class="bi-person-standing-dress"></i><i class="bi-person-standing fs-3"></i><i class="bi-shield-fill"></i>',
            ),
            array(
                'skill_type_id' => 4,
                'name' => 'Push',
                'slug' => 'push',
                'description' => "",
                'alt_description' => "",
                'icon' => '<i class="bi-arrow-right"></i><i class="bi-person-walking fs-3"></i><i class="bi-arrow-right"></i>',
            ),
            array(
                'skill_type_id' => 4,
                'name' => 'Throw',
                'slug' => 'throw',
                'description' => "",
                'alt_description' => "",
                'icon' => '<i class="bi-person-standing fs-3"></i><i class="bi-heart-arrow"></i><i class="bi-person-standing fs-3"></i>',
            ),
            array(
                'skill_type_id' => 4,
                'name' => 'Environment Action',
                'slug' => 'environment_action',
                'description' => "",
                'alt_description' => "",
                'icon' => '<i class="bi-person-standing fs-3"></i><i class="bi-fire"></i><i class="bi-person-standing fs-3"></i>',
            ),
        );
        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
