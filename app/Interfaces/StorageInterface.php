<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 07.07.2020
 * Time: 17:35
 */

namespace App\Interfaces;

use Illuminate\Http\Request;

interface StorageInterface
{
    public function items(int $id);

    public function attachItems(Request $request, int $id);

    public function detachItems(Request $request, int $id);
}
