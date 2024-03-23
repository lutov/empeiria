<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\References;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Bodypart extends Model
{

    /**
     * @return BelongsToMany
     */
    public function characters()
    {
        return $this->belongsToMany('App\Models\Characters', 'characters_bodyparts', 'bodypart');
    }

}
