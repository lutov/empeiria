<?php

namespace App\Http\Controllers\API;

use App\Models\Worlds\World;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorldAPIController extends APIController
{

    private $slug = 'worlds';
    private $model = World::class;

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
        return World::where('user_id', $user->id)->get();
    }

    /**
     * @param  Request  $request
     * @return World
     */
    public function store(Request $request)
    {
        $world = new World();

        $user = Auth::user();
        $name = $request->input('name');

        if (!empty($name)) {
            $world->user_id = $user->id;
            $world->name = $name;
            $world->save();

            $world->map()->create();
        }

        return $world;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function show(int $id)
    {
        return World::find($id);
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function update(int $id)
    {
        $world = World::find($id);
        if (isset($world->id)) {
            //
        }
        return $world;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        $world = World::find($id);
        if (isset($world->id)) {
            $world->delete();
        }
        return $world;
    }

}
