<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\Characters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $x
 * @property int $y
 */
class Position extends Model
{
    protected $table = 'character_position';

    /**
     * @return BelongsTo
     */
    public function character()
    {
        return $this->belongsTo(Character::class, 'character_id');
    }
}
