<?php

namespace Database\Seeders;

use App\Models\Characters\Avatar;
use App\Models\Characters\Character;
use App\Models\Characters\Gender;
use App\Models\Characters\Inventory;
use App\Models\Characters\Qualities;
use App\Models\Characters\Quality;
use App\Models\Factions\Faction;
use App\Models\Items\Item;
use App\Models\Names\Name;
use App\Models\Squads\Squad;
use Illuminate\Database\Seeder;

class DemoCharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = 1;
        $character = new Character();
        $gender = Gender::random();
        $faction = Faction::find(1);
        $squad = Squad::find(1);
        $qualities = Quality::all();
        $character->user_id = $userId;
        $character->name = Name::random(['first_name' => 1, $gender->slug => 1]);
        $character->nickname = Name::random(['nickname' => 1, $gender->slug => 1]);
        $character->last_name = Name::random(['last_name' => 1, $gender->slug => 1]);
        $character->age = rand(18, 100);
        $character->bio = '';
        $character->gender_id = $gender->id;
        $character->avatar_id = Avatar::random($gender)->id;
        $character->faction_id = $faction->id;
        $character->faction_order = 1;
        $character->squad_id = $squad->id;
        $character->squad_order = 1;
        $character->save();
        $characterQualities = array(
            'character_id' => $character->id,
        );
        foreach ($qualities as $quality) {
            $characterQualities[$quality->slug] = rand(1, 10);
        }
        Qualities::create($characterQualities);
        $inventory = new Inventory();
        $inventory->character_id = $character->id;
        $inventory->save();
        $items = Item::all();
        foreach ($items as $key => $item) {
            $inventory->items()->attach($item->id, ['quantity' => 1, 'sort' => $key + 1]);
        }
    }
}
