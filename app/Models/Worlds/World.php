<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\Worlds;

use App\Models\Factions\Faction;
use App\Models\Games\Game;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property int $user_id
 * @property int $game_id
 * @property string $name
 * @property string $description
 * @property string $seed
 * @property int $octaves
 *
 * @method static find(int $id)
 * @method static where(string $string, $id)
 */
class World extends Model
{
    protected static string $type = 'world';
    protected $fillable = ['user_id', 'name', 'description', 'picture_id'];
    //protected $with = ['map'];
    protected $visible = ['id', 'name', 'map'];

    /**
     * @return BelongsTo
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * @return HasOne
     */
    public function map()
    {
        return $this->hasOne(Map::class);
    }

    /**
     * @return HasOne
     */
    public function faction()
    {
        return $this->hasOne(Faction::class);
    }

    /**
     * @return HasOne
     */
    public function history()
    {
        return $this->hasOne('App\Models\History');
    }

}
