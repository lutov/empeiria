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
use Illuminate\Database\Eloquent\Relations\HasOne;

class Body extends Model
{

    /**
     * @return BelongsToMany
     */
    public function characters()
    {
        return $this->belongsToMany('App\Models\Characters', 'characters_bodies', 'body');
    }

    /**
     * @return HasOne
     */
    public function sex()
    {
        return $this->hasOne('App\Models\Types\Gender');
    }

    /**
     * @return HasOne
     */
    public function species()
    {
        return $this->hasOne('App\Models\Types\Species');
    }

}
