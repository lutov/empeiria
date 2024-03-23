<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    private $slug = 'items';
    private $model = Item::class;

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
        return Item::all();
    }

    /**
     * @param  Request  $request
     * @return Item
     */
    public function store(Request $request)
    {
        $item = new Item();

        $name = $request->input('name');

        if (!empty($name)) {
            $item->type_id = 2; // TODO replace dev val
            $item->name = $name;
            $item->description = ''; // TODO replace dev val
            $item->save();
        }

        return $item;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function show(int $id)
    {
        return Item::find($id);
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function update(int $id)
    {
        $item = Item::find($id);
        if (isset($item->id)) {
            //
        }
        return $item;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        $item = Item::find($id);
        if (isset($item->id)) {
            $item->delete();
        }
        return $item;
    }

}
