<?php

namespace Database\Seeders;

use App\Models\Characters\Gender;
use Illuminate\Database\Seeder;

class CharacterGenderSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $genders = array(
            array(
                'name' => 'None',
                'slug' => 'none',
                'description' => '',
            ),
            array(
                'name' => 'Male',
                'slug' => 'male',
                'description' => '',
            ),
            array(
                'name' => 'Female',
                'slug' => 'female',
                'description' => '',
            ),
        );
        foreach ($genders as $key => $values) {
            Gender::create($values);
        }
    }
}
