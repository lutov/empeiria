<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 26.01.2020
 * Time: 13:29
 */

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static create($attribute)
 */
class Attribute extends Model
{
    protected $fillable = ['name', 'description'];
    protected $table = 'items_attributes';

    /**
     * @return BelongsToMany
     */
    public function item()
    {
        return $this->belongsToMany('App\Models\Items\Item');
    }
}
