<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 22.08.2020
 * Time: 13:08
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{

    /**
     * @return BelongsTo
     */
    public function conversation()
    {
        return $this->belongsTo('App\Models\Conversation');
    }

    /**
     * @return BelongsTo
     */
    public function character()
    {
        return $this->belongsTo('App\Models\Character');
    }

}
