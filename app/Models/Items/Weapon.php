<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 26.01.2020
 * Time: 13:09
 */

namespace App\Models\Items;

use App\Models\Item;
use App\Models\ItemParams;
use App\Models\Mass;
use App\Models\Size;

class Weapon extends Item
{

    protected Size $size;
    protected Mass $mass;
    protected string $type;
    protected string $name;
    protected string $handling;
    protected ItemParams $params;

}
