<?php


namespace App\Models\Items;


use Illuminate\Database\Eloquent\Relations\Pivot;

class InventoryItem extends Pivot
{
    public $incrementing = true;
    protected $visible = [
        'quantity',
        'sort',
    ];
}
