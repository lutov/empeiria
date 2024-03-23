<?php

namespace Database\Seeders;

use App\Models\Factions\Faction;
use App\Models\Names\Name;
use App\Models\Squads\Banner;
use App\Models\Squads\Squad;
use App\Models\Worlds\World;
use Illuminate\Database\Seeder;

class SquadSeeder extends Seeder
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
        $faction = Faction::where('world_id', '=', $world->id)->first();
        $squad = new Squad();
        $squad->faction_id = $faction->id;
        $squad->name = Name::random(['squad' => 1]);
        $squad->description = '';
        $squad->banner_id = Banner::random()->id;
        $squad->save();
    }
}
