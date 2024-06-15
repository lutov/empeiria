<?php

namespace Database\Seeders;

use App\Models\Names\Name;
use App\Models\Squads\Squad;
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
        $squad = new Squad();
        $squad->faction_id = 1;
        $squad->name = Name::random(['squad' => 1]);
        $squad->description = '';
        $squad->banner_id = 1;
        $squad->save();

        for($i = 1; $i < 4; $i++) {
            $squad->characters()->attach($i, array('squad_order' => $i));
        }
    }
}
