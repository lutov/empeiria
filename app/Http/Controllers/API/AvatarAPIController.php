<?php


namespace App\Http\Controllers\API;


use App\Models\Characters\Avatar;
use Illuminate\Http\Request;

class AvatarAPIController extends APIController
{

    private $slug = 'avatars';
    private $model = Avatar::class;

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->model::get();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function random(Request $request)
    {
        $genderId = (int)$request->get('id', 1);
        $limit = (int)$request->get('limit', 9);
        return $this->model::where('gender_id', '=', $genderId)
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }
}
