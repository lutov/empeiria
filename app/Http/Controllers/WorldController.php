<?php

namespace App\Http\Controllers;

use App\Models\Worlds\World;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WorldController extends Controller
{
    /**
     * @param Request $request
     * @param int $gameId
     * @return Factory|View
     */
    public function index(Request $request, int $gameId)
    {
        $worlds = World::where('game_id', $gameId)->get();
        $data = array(
            'gameId' => $gameId,
            'worlds' => $worlds,
        );
        return view('games.worlds', $data);
    }

    /**
     * @param Request $request
     * @param int $gameId
     * @param int $id
     * @return Factory|View
     */
    public function show(Request $request, int $gameId, int $id)
    {
        $world = World::find($id);
        $data = array(
            'gameId' => $gameId,
            'id' => $id,
            'world' => $world,
        );
        return view('games.world', $data);
    }
}
