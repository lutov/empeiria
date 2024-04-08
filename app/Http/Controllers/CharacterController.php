<?php

namespace App\Http\Controllers;

use App\Models\Characters\Character;
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

        $qualities = array(
            array('name' => 'Vitality', 'description' => 'Vitality is a quality that describes a character\'s ability to endure life\'s difficulties and overcome obstacles in the most literal sense, physically. Vital characters are usually good in battle and work. They adhere to traditional values and like simple, reliable things.', 'description_ru' => 'Витальность - это качество, которое описывает способность персонажа переносить жизненные трудности и преодолевать препятствия в самом буквальном понимании, физически. Витальные персонажи как правило хороши в бою и труде. Они придерживаются традиционных ценностей и любят простые, надежные вещи.', 'value' => '5'),
            array('name' => 'Mobility', 'description' => '', 'value' => '5'),
            array('name' => 'Appeal', 'description' => '', 'value' => '5'),
            array('name' => 'Sociality', 'description' => '', 'value' => '5'),
            array('name' => 'Intellect', 'description' => '', 'value' => '5'),
            array('name' => 'Willpower', 'description' => '', 'value' => '5'),
        );

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
