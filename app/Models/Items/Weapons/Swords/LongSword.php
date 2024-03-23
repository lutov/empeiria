<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 26.01.2020
 * Time: 13:11
 */

namespace App\Models\Items\Weapons\Swords;

use App\Models\Items\Weapons\Sword;
use App\Models\Mass;
use App\Models\Size;

class LongSword extends Sword
{

    public function __construct()
    {
        parent::__construct();

        $this->name = 'Long Sword';
        $this->size = new Size(1, 2);
        $this->mass = new Mass(2);
    }

}
