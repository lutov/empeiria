<?php

namespace Database\Seeders;

use App\Models\Squads\Parameter;
use Illuminate\Database\Seeder;

class SquadsParametersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parameters = array(
            array(
                'name' => 'Energy',
                'slug' => 'energy',
                'description' => "",
                'alt_description' => "",
                'default_value' => 100,
            ),
            array(
                'name' => 'Integrity',
                'slug' => 'integrity',
                'description' => "",
                'alt_description' => "",
                'default_value' => 100,
            ),
            array(
                'name' => 'Supplies',
                'slug' => 'supplies',
                'description' => "",
                'alt_description' => "",
                'default_value' => 100,
            ),
            array(
                'name' => 'Medicines',
                'slug' => 'medicines',
                'description' => "",
                'alt_description' => "",
                'default_value' => 100,
            ),
            array(
                'name' => 'Wares',
                'slug' => 'wares',
                'description' => "",
                'alt_description' => "",
                'default_value' => 100,
            ),
            array(
                'name' => 'Tools',
                'slug' => 'tools',
                'description' => "",
                'alt_description' => "",
                'default_value' => 100,
            ),
        );
        foreach ($parameters as $parameter) {
            Parameter::create($parameter);
        }
    }
}
