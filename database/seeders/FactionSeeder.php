<?php

namespace Database\Seeders;

use App\Models\Factions\Emblem;
use App\Models\Factions\Faction;
use App\Models\Names\Name;
use App\Models\Worlds\World;
use Illuminate\Database\Seeder;

class FactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = 1;
        $world = World::where('user_id', $userId)->first();
        $faction = new Faction();
        $faction->world_id = $world->id;
        $faction->name = Name::random(['faction' => 1]);
        $faction->description = '';
        $faction->emblem_id = 1;//Emblem::random()->id;
        $faction->save();
    }
}
