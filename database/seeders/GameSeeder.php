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
        $game = new Game();
        $game->user_id = $userId;
        $game->name = 'New Game '.date('Y-m-d H:i:s');
        $game->description = '';
        $game->save();
    }
}
