<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 26.01.2020
 * Time: 13:10
 */

namespace App\Models\Items\Weapons;

use App\Models\Items\Weapon;

class Sword extends Weapon
{

    public function __construct()
    {
        parent::__construct();

        $this->type = 'Sword';
    }

}
