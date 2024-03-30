<?php

namespace App\Http\Controllers\API;

use App\Models\Faction;
use App\Models\Squad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FactionAPIController extends APIController
{

    private $slug = 'factions';
    private $model = Faction::class;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $user = Auth::user();
        return $this->model::where('user_id', $user->id)->get();
    }

    /**
     * @param  Request  $request
     * @return Faction
     */
    public function store(Request $request)
    {
        $faction = new Faction();

        $user = Auth::user();
        $name = $request->input('name');

        if (!empty($name)) {
            $faction->user_id = $user->id;
            $faction->name = $name;
            $faction->save();
        }

        return $faction;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function show(int $id)
    {
        return $this->model::find($id);
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function update(int $id)
    {
        $faction = Faction::find($id);
        if (isset($faction->id)) {
            //
        }
        return $faction;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        $faction = Faction::find($id);
        if (isset($faction->id)) {
            $faction->delete();
        }
        return $faction;
    }

    /**
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function characters(Request $request, int $id)
    {
        if ('true' == $request->input('no_squad')) {
            $squads = Squad::where('faction_id', '=', $id)->pluck('id')->toArray();
            $characters = DB::table('squads_characters')->whereIn('squad_id',
                $squads)->pluck('character_id')->toArray();
            return Faction::find($id)->characters()->whereNotIn('characters.id', $characters)->get();
        } else {
            return Faction::find($id)->characters;
        }
    }

    /**
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function attachCharacters(Request $request, int $id)
    {
        $characters = $request->input('characters', array());
        $squad = Faction::find($id);
        $squad->characters()->attach($characters);
        return $squad;
    }

    /**
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function detachCharacters(Request $request, int $id)
    {
        $characters = $request->input('characters', array());
        $squad = Faction::find($id);
        $squad->characters()->detach($characters);
        return $squad;
    }

}
