<?php

namespace App\Http\Controllers\API;

use App\Models\Games\Game;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class GameAPIController extends APIController
{

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        return Game::where('user_id', $user->id)->get();
    }

    /**
     * @param Request $request
     * @return Game
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $game = new Game();
        $game->user_id = $user->id;
        $game->name = 'New Game ' . date('Y-m-d H:i:s');
        $game->description = '';
        $game->save();
        return $game;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id)
    {
        return Game::find($id);
    }

}
