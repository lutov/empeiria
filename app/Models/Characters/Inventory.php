<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\Characters;

use App\Models\Items\InventoryItem;
use App\Models\Items\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Inventory
 * @package App\Models\Character
 *
 * @property int $character_id
 *
 * @method static find(int $id)
 * @method static where(string $string, $id)
 */
class Inventory extends Model
{

    protected $visible = [
        'id',
        'size',
    ];

    /**
     * Inventory constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return BelongsToMany
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'inventory_item', 'inventory_id', 'item_id')
            ->as('values')
            ->using(InventoryItem::class)
            ->withPivot(array('quantity', 'sort'))//->withTimestamps()
            ;
    }

    /**
     * @return BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo('App\Models\Character');
    }

}
