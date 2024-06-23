<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\Squads;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $x
 * @property int $y
 */
class Position extends Model
{
    protected $table = 'squad_position';

    /**
     * @return BelongsTo
     */
    public function character()
    {
        return $this->belongsTo(Squad::class, 'squad_id');
    }
}
