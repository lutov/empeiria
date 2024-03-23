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

/**
 * @method static create($parameter)
 */
class Parameter extends Model
{
    protected $fillable = ['name'];
    protected $table = 'items_parameters';
    /**
     * @return BelongsTo
     */
    public function item()
    {
        return $this->belongsTo('App\Models\Items\Item');
    }
}
