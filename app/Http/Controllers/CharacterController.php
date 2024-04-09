<?php

namespace App\Http\Controllers;

use App\Models\Characters\Character;
use App\Models\Characters\Quality;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CharacterController extends Controller
{
    /**
     * @param Request $request
     * @param int $gameId
     * @param int $worldId
     * @return Factory|View
     */
    public function index(Request $request, int $gameId, int $worldId)
    {
        $characters = Character::where('world_id', $worldId)->get();
        $qualities = Quality::all();
        $data = array(
            'gameId' => $gameId,
            'worldId' => $worldId,
            'characters' => $characters,
            'qualities' => $qualities,
        );
        return view('games.characters', $data);
    }

    /**
     * @param Request $request
     * @param int $gameId
     * @param int $worldId
     * @param int $id
     * @return Factory|View
     */
    public function show(Request $request, int $gameId, int $worldId, int $id)
    {
        $character = Character::find($id);
        $data = array(
            'gameId' => $gameId,
            'worldId' => $worldId,
            'id' => $id,
            'character' => $character,
        );
        return view('games.character', $data);
    }
}
