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

class Bodypart extends Model
{

    protected $table = 'characters_bodyparts';

    /**
     * @return BelongsTo
     */
    public function character()
    {
        return $this->belongsTo('App\Models\Character', 'bodypart');
    }

}
