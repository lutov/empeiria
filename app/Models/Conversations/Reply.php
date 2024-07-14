<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 22.08.2020
 * Time: 13:08
 */

namespace App\Models\Conversations;

use App\Models\Characters\Character;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{

    /**
     * @return BelongsTo
     */
    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    /**
     * @return BelongsTo
     */
    public function character()
    {
        return $this->belongsTo(Character::class);
    }

}
