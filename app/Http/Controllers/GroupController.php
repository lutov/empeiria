<?php

namespace App\Http\Controllers;

use App\Models\References\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    private $slug = 'groups';
    private $model = Group::class;

    /**
     * GroupController constructor.
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
        return Group::all();
    }

    /**
     * @param  Request  $request
     * @return Group
     */
    public function store(Request $request)
    {
        $group = new Group();

        $name = $request->input('name');

        if (!empty($name)) {
            $group->name = $name;
            $group->save();
        }

        return $group;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function show(int $id)
    {
        return Group::find($id);
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function update(int $id)
    {
        $group = Group::find($id);
        if (isset($group->id)) {
            //
        }
        return $group;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        $group = Group::find($id);
        if (isset($group->id)) {
            $group->delete();
        }
        return $group;
    }

}
