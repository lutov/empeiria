<?php

namespace Database\Seeders;

use App\Models\Games\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = 1;
        $world = new Game();
        $world->user_id = $userId;
        $world->name = 'New Game '.date('Y-m-d H:i:s');
        $world->description = '';
        $world->save();
    }
}
