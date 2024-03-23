<?php

namespace App\Http\Controllers;

use App\Interfaces\StorageInterface;
use App\Models\Container;
use Illuminate\Http\Request;

class ContainerController extends Controller implements StorageInterface
{

    private $slug = 'containers';
    private $model = Container::class;

    /**
     * ContainerController constructor.
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
        return Container::all();
    }

    /**
     * @param  Request  $request
     * @return Container
     */
    public function store(Request $request)
    {
        $container = new Container();
        $container->save();
        return $container;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function show(int $id)
    {
        return Container::find($id);
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function update(int $id)
    {
        $container = Container::find($id);
        if (isset($container->id)) {
            //
        }
        return $container;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        $container = Container::find($id);
        if (isset($container->id)) {
            $container->delete();
        }
        return $container;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function items(int $id)
    {
        return Container::find($id)->items;
    }

    /**
     * @param  Request  $request
     * @param  int  $id
     * @return mixed
     */
    public function attachItems(Request $request, int $id)
    {
        $items = $request->input('items', array());
        $container = Container::find($id);
        $container->items()->attach($items);
        return $container;
    }

    /**
     * @param  Request  $request
     * @param  int  $id
     * @return mixed
     */
    public function detachItems(Request $request, int $id)
    {
        $items = $request->input('items', array());
        $container = Container::find($id);
        $container->items()->detach($items);
        return $container;
    }

}
