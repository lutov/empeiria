<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Container
 * @package App\Models
 *
 * @method static find(int $id)
 * @method static where(string $string, $id)
 */
class Container extends Model
{

    /**
     * Container constructor.
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
        return $this->belongsToMany('App\Models\Item', 'containers_items', 'container_id', 'item_id');
    }

}
