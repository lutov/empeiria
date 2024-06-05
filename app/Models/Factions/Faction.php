<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 21.06.2020
 * Time: 14:10
 */

namespace App\Models\Factions;

use App\Models\Characters\Character;
use App\Models\Squads\Squad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Faction
 * @package App\Models\Factions
 *
 * @property int $id
 * @property int $world_id
 * @property string $name
 * @property string $description
 * @property int $emblem_id
 * @property bool $player_faction
 *
 * @method static find(int $id)
 * @method static where(string $string, string $operator, string $id)
 */
class Faction extends Model
{
    protected $with = [];
    protected $visible = [
        'id',
        'name',
    ];
    protected $fillable = [
        'world_id',
        'name',
        'description',
        'emblem_id',
        'player_faction',
    ];

    /**
     * @return HasMany
     */
    public function squads()
    {
        return $this->hasMany(Squad::class);
    }

    /**
     * @return BelongsToMany
     */
    public function characters()
    {
        return $this->belongsToMany(Character::class, 'factions_characters', 'faction_id', 'character_id');
    }
}
