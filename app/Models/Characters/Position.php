<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\Characters;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int x
 * @property int y
 */
class Position extends Model
{

    public function entity()
    {
        return $this->morphTo();
    }

    public function map()
    {
        return $this->belongsTo('App\Models\Map');
    }

    /**
     * @param  Position  $destination
     * @return int
     */
    public function distance(Position $destination)
    {
        return (int)round(
            sqrt(
                (($destination->x - $this->x) ** 2) + (($destination->y - $this->y) ** 2)
            )
        );
    }

}
