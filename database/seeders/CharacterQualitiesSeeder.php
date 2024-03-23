<?php

namespace Database\Seeders;

use App\Models\Characters\Quality;
use Illuminate\Database\Seeder;

class CharacterQualitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $qualities = array(
            array(
                'name' => 'Appeal',
                'slug' => 'appeal',
                'description' => '',
            ),
            array(
                'name' => 'Vitality',
                'slug' => 'vitality',
                'description' => '',
            ),
            array(
                'name' => 'Intellect',
                'slug' => 'intellect',
                'description' => '',
            ),
            array(
                'name' => 'Sociality',
                'slug' => 'sociality',
                'description' => '',
            ),
            array(
                'name' => 'Mobility',
                'slug' => 'mobility',
                'description' => '',
            ),
            array(
                'name' => 'Willpower',
                'slug' => 'willpower',
                'description' => '',
            ),
        );
        foreach ($qualities as $quality) {
            Quality::create($quality);
        }
    }
}
