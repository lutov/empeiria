<?php


namespace App\Models\Worlds;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string name
 * @property int height_min
 * @property int height_max
 * @property int temperature_min
 * @property int temperature_max
 * @property int humidity_min
 * @property int humidity_max
 * @property string color
 */
class Biome extends Model
{

    /**
     * @return HasMany
     */
    public function regions()
    {
        return $this->hasMany('App\Models\World\Region');
    }

}
