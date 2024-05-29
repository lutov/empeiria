<?php

namespace Database\Seeders;

use App\Models\Characters\Inventory;
use App\Models\Characters\Qualities;
use App\Models\Names\Name;
use App\Models\Worlds\Picture;
use App\Models\Worlds\World;
use Illuminate\Database\Seeder;

class WorldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = 1;
        $world = new World();
        $world->user_id = $userId;
        $world->game_id = 1;
        $world->name = Name::random(['world' => 1]);
        $world->description = '';
        $world->seed = 'seed';
        $world->octaves = array(3, 6, 12, 24);
        $world->size = 100;
        $world->tile_size = 6;
        $world->scale = 12;
        $world->save();
    }
}
