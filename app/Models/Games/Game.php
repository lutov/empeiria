<?php

namespace App\Models\Games;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int user_id
 * @property string name
 * @property string description
 * @property int picture_id
 *
 * @method static find(int $id)
 * @method static where(string $string, $id)
 */
class Game extends Model
{
    protected static string $type = 'game';
    protected $fillable = ['user_id', 'name', 'description', 'picture_id'];
    protected $visible = ['id', 'name'];

    /**
     * @return HasMany
     */
    public function saves()
    {
        return $this->hasMany('App\Models\Save', 'game_id');
    }

}
