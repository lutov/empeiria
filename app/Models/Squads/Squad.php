<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\Squads;

use App\Models\Characters\Character;
use App\Models\Factions\Faction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    protected $with = [];
    protected $visible = [
        'id',
        'name',
        'banner_id',
        'faction_id',
        'characters',
    ];
    protected $fillable = [
        'id',
        'name',
        'faction_id',
    ];

    /**
     * @return BelongsToMany
     */
    public function characters()
    {
        return $this->belongsToMany(Character::class, 'squad_character')
            ->withPivot('squad_order')
            ->orderBy('squad_order')
        ;
    }

    /**
     * @return BelongsTo
     */
    public function faction()
    {
        return $this->belongsTo(Faction::class);
    }

    /**
     * @return HasOne
     */
    public function banner()
    {
        return $this->hasOne(Banner::class);
    }
}
