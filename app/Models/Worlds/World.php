<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\Worlds;

use App\Models\Factions\Faction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int user_id
 * @property string name
 * @property string description
 * @property int picture_id
 *
 * @method static find(int $id)
 * @method static where(string $string, $id)
 */
class World extends Model
{
    protected static string $type = 'world';
    protected $fillable = ['user_id', 'name', 'description', 'picture_id'];
    protected $with = ['map'];
    protected $visible = ['id', 'name', 'map'];

    /**
     * @return HasOne
     */
    public function map()
    {
        return $this->hasOne('App\Models\Worlds\Map');
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
