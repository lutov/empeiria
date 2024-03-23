<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 26.01.2020
 * Time: 13:29
 */

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    protected $table = 'items_types';
    protected $fillable = ['parent_id', 'name', 'description'];
    /**
     * @return HasMany
     */
    public function items()
    {
        return $this->hasMany('App\Models\Items\Item', 'type_id');
    }

    /**
     * @return HasMany
     */
    public function children()
    {
        return $this->hasMany('App\Models\Items\Type', 'parent_id');
    }

    /**
     * @return BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Models\Items\Type', 'parent_id');
    }

}
