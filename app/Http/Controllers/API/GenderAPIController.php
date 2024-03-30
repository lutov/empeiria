<?php


namespace App\Http\Controllers\API;


use App\Models\Characters\Gender;

class GenderAPIController extends APIController
{

    private $slug = 'genders';
    private $model = Gender::class;

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->model::get();
    }
}
