<?php

namespace App\Http\Controllers\API;

use App\Helpers\MapHelper;
use Illuminate\Http\Request;

class MapAPIController extends APIController
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function preview(Request $request)
    {
        $seed = $request->get('seed');
        $octaves = explode(', ', $request->get('octaves'));
        foreach($octaves as $key => $value) {
            $octaves[$key] = (int) $value;
        }
        $size = 200;
        $tileSize = 2;
        $map = new MapHelper(1, $seed, $octaves, $size, $tileSize);
        $preview = $map->getPreview();
        return base64_encode($preview);
    }
}
