<?php

namespace Database\Seeders;

use App\Models\Items\Attribute;
use Illuminate\Database\Seeder;

class ItemAttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            ['name' => 'Armor', 'slug' => 'armor', 'description' => ''],
            ['name' => 'Helmet', 'slug' => 'helmet', 'description' => ''],
            ['name' => 'Weapon', 'slug' => 'weapon', 'description' => ''],
            ['name' => 'Shield', 'slug' => 'shield', 'description' => ''],
            ['name' => 'One-handed', 'slug' => 'One-handed', 'description' => ''],
            ['name' => 'Two-handed', 'slug' => 'two-handed', 'description' => ''],
            ['name' => 'Sidearm', 'slug' => 'sidearm', 'description' => ''],
            ['name' => 'Sharp', 'slug' => 'sharp', 'description' => ''],
            ['name' => 'Blunt', 'slug' => 'blunt', 'description' => ''],
            ['name' => 'Piercing', 'slug' => 'piercing', 'description' => ''],
            ['name' => 'Ranged', 'slug' => 'ranged', 'description' => ''],
            ['name' => 'Flexible', 'slug' => 'flexible', 'description' => ''],
            ['name' => 'Brittle', 'slug' => 'brittle', 'description' => ''],
            ['name' => 'Giant', 'slug' => 'giant', 'description' => ''],
            ['name' => 'Tiny', 'slug' => 'tiny', 'description' => ''],
            ['name' => 'Heavy', 'slug' => 'heavy', 'description' => ''],
            ['name' => 'Light', 'slug' => 'light', 'description' => ''],
            ['name' => 'Long', 'slug' => 'long', 'description' => ''],
            ['name' => 'Short', 'slug' => 'short', 'description' => ''],
        ];
        foreach ($attributes as $attribute) {
            Attribute::create($attribute);
        }
    }
}
