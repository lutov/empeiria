<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 22.08.2020
 * Time: 12:59
 */

namespace App\Models\Conversations;

use App\Models\Characters\Character;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Conversation extends Model
{
    /**
     * @return HasManyThrough
     */
    public function characters()
    {
        return $this->hasManyThrough(Character::class, Reply::class);
    }

    /**
     * @return HasMany
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

}
