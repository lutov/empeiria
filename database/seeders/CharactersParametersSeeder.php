<?php

namespace Database\Seeders;

use App\Models\Characters\Parameter;
use Illuminate\Database\Seeder;

class CharactersParametersSeeder extends Seeder
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
                'name' => 'Health',
                'slug' => 'health',
                'description' => "",
                'alt_description' => "",
                'default_value' => 100,
            ),
            array(
                'name' => 'Energy',
                'slug' => 'energy',
                'description' => "",
                'alt_description' => "",
                'default_value' => 100,
            ),
            array(
                'name' => 'Magic',
                'slug' => 'magic',
                'description' => "",
                'alt_description' => "",
                'default_value' => 100,
            ),
            array(
                'name' => 'Money',
                'slug' => 'money',
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
