<?php

namespace Database\Seeders;

use App\Models\Items\Parameter;
use Illuminate\Database\Seeder;

class ItemParametersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parameters = [
            ['name' => 'Damage', 'slug' => 'damage', 'attributes' => ['weapon'], 'description' => ''],
            ['name' => 'Anti-Armor', 'slug' => 'anti-armor', 'attributes' => ['weapon'], 'description' => ''],
            ['name' => 'Durability', 'slug' => 'durability', 'attributes' => ['weapon', 'shield'], 'description' => ''],
            ['name' => 'Speed', 'slug' => 'speed', 'attributes' => ['armor', 'weapon', 'shield'], 'description' => ''],
            ['name' => 'Reach', 'slug' => 'reach', 'attributes' => ['weapon'], 'description' => ''],
            ['name' => 'Defense', 'slug' => 'defense', 'attributes' => ['weapon', 'shield'], 'description' => ''],
            [
                'name' => 'Universality',
                'slug' => 'universality',
                'attributes' => ['armor', 'weapon', 'shield'],
                'description' => ''
            ],
            ['name' => 'Сomplexity', 'slug' => 'complexity', 'attributes' => ['armor', 'weapon'], 'description' => ''],
            ['name' => 'Armor', 'slug' => '', 'attributes' => ['armor', 'helmet', 'shield'], 'description' => ''],
            [
                'name' => 'Weight',
                'slug' => '',
                'attributes' => ['armor', 'helmet', 'weapon', 'shield'],
                'description' => ''
            ],
        ];
        foreach ($parameters as $parameter) {
            Parameter::create($parameter);
        }
    }
}
