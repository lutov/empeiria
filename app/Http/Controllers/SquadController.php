<?php

namespace App\Http\Controllers;

use App\Models\Squads\Squad;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SquadController extends Controller
{

    private $slug = 'squads';
    private $model = Squad::class;
    private $rules = [
        'name' => ['required', 'string', 'max:255'],
    ];

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
        return Squad::where('faction_id', '=', $user->world->faction->id)->get();
    }

    /**
     * @param Request $request
     * @return Squad|JsonResponse|null
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $squad = new Squad();
        $user = Auth::user();
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->passes()) {
            $squad->fill($validator->validated());
            if ($request->has('faction')) {
                $faction = $request->get('faction');
                if (isset($faction['id'])) {
                    $squad->faction_id = $faction['id'];
                }
            }
            $squad->user_id = $user->id;
            $squad->save();
        } else {
            return response()->json($validator->messages(), 422);
        }
        return $squad->fresh();
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function show(int $id)
    {
        return Squad::find($id);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, int $id)
    {
        $squad = Squad::find($id);
        if (isset($squad->id)) {
            $validator = Validator::make($request->all(), $this->rules);
            if ($validator->passes()) {
                $squad->fill($validator->validated());
                if ($request->has('faction')) {
                    $faction = $request->get('faction');
                    if (isset($faction['id'])) {
                        $squad->faction_id = $faction['id'];
                    }
                }
                $squad->save();
            } else {
                return response()->json($validator->messages(), 422);
            }
        }
        return $squad->fresh();
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        $squad = Squad::find($id);
        if (isset($squad->id)) {
            $squad->delete();
        }
        return $squad;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function characters(int $id)
    {
        return Squad::find($id)->characters;
    }

    /**
     * @param  Request  $request
     * @param  int  $id
     * @return mixed
     */
    public function attachCharacters(Request $request, int $id)
    {
        $characters = $request->input('characters', array());
        $squad = Squad::find($id);
        $squad->characters()->attach($characters);
        return $squad;
    }

    /**
     * @param  Request  $request
     * @param  int  $id
     * @return mixed
     */
    public function detachCharacters(Request $request, int $id)
    {
        $characters = $request->input('characters', array());
        $squad = Squad::find($id);
        $squad->characters()->detach($characters);
        return $squad;
    }

}
