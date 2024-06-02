<?php

namespace App\Http\Controllers;

use App\Models\Games\Game;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class GameController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $games = Game::where('user_id', $user->id)->get();
        if (count($games)) {
            $game = $games->first();
        } else {
            $game = new Game();
            $game->user_id = $user->id;
            $game->name = 'Empeiria ' . date('Y-m-d H:i:s');
            $game->description = '';
            $game->save();
        }
        return redirect()->route('worlds', ['gameId' => $game->id]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return Factory|View
     */
    public function show(Request $request, int $id)
    {
        $game = Game::find($id);
        $data = array(
            'id' => $id,
            'game' => $game,
        );
        return view('games.game', $data);
    }
}
