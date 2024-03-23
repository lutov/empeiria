<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\Squads;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Class Squad
 * @package App\Models
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int faction_id
 * @property string description
 * @property int banner_id
 *
 * @method static find(int $id)
 * @method static where(string $string, string $operator, string $id)
 */
class Squad extends Model
{

    protected $with = [
        'faction',
        'banner',
        'characters',
    ];
    protected $visible = [
        'id',
        'name',
        'banner',
        'faction',
        'characters',
    ];
    protected $fillable = [
        'id',
        'name',
        'faction_id',
    ];

    /**
     * @return HasMany
     */
    public function characters()
    {
        return $this->hasMany('App\Models\Characters\Character')->orderBy('squad_order');
    }

    /**
     * @return BelongsTo
     */
    public function faction()
    {
        return $this->belongsTo('App\Models\Factions\Faction');
    }

    /**
     * @return BelongsTo
     */
    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }

    /**
     * @return MorphOne
     */
    public function position()
    {
        return $this->morphOne('App\Models\Position', 'entity');
    }

}
