<?php

namespace Database\Seeders;

use App\Models\Items\Type;
use Illuminate\Database\Seeder;

class ItemTypeSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run() {
        $types = array(
            array(
                'name' => 'Weapon',
                'description' => 'A tool to inflict damage',
                'parent_id' => null,
            ),
            array(
                'name' => 'Sword',
                'description' => 'Common type of a melee weapon usually with long blade and relatively short handle',
                'parent_id' => 'Weapon',
            ),
            array(
                'name' => 'Axe',
                'description' => 'Common type of a melee weapon usually with middle-size or long handle and relatively heavy short blade',
                'parent_id' => 'Weapon',
            ),
            array(
                'name' => 'Spear',
                'description' => 'Common type of a melee weapon usually with very long handle and short pointy blade',
                'parent_id' => 'Weapon',
            ),
            array(
                'name' => 'Mace',
                'description' => 'Common type of a melee weapon usually heavy with middle-size handle and some sort of a striking head',
                'parent_id' => 'Weapon',
            ),
            array(
                'name' => 'Armor',
                'description' => 'An equipment to protect from damage',
                'parent_id' => null,
            ),
            array(
                'name' => 'Helmet',
                'description' => 'Basically any type of headgear',
                'parent_id' => 'Armor',
            ),
        );
        foreach($types as $key => $values) {
            $values['parent_id'] = Type::select('id')->where('name', $values['parent_id'])->limit('1')->value('id');
            Type::create($values);
        }
    }
}
