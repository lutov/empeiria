<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 22.08.2020
 * Time: 12:59
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Conversation extends Model
{

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return HasManyThrough
     */
    public function characters()
    {
        return $this->hasManyThrough('App\Models\Character', 'App\Models\Message');
    }

    /**
     * @return HasMany
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

}