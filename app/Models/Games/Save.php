<?php

namespace App\Models\Games;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int user_id
 * @property string name
 * @property string description
 * @property int picture_id
 *
 * @method static find(int $id)
 * @method static where(string $string, $id)
 */
class Save extends Model
{
    protected static string $type = 'game';
    protected $fillable = ['user_id', 'name', 'description', 'picture_id'];
    protected $visible = ['id', 'name'];

    /**
     * @return BelongsTo
     */
    public function game()
    {
        return $this->belongsTo('App\Models\Game');
    }

}
