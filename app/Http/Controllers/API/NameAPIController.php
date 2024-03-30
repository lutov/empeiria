<?php

namespace App\Http\Controllers\API;

use App\Models\Names\Name;
use Illuminate\Http\Request;

class NameAPIController extends APIController
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function random(Request $request)
    {
        $name = new Name();
        $types = $request->get('types', array());
        if(count($types)) {
            $params = array();
            foreach($types as $type) {
                $params[$type] = 1; // TODO unsafe add validation
            }
            $name = Name::random($params);
        }
        return $name;
    }
}
