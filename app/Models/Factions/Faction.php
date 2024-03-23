<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 21.06.2020
 * Time: 14:10
 */

namespace App\Models\Factions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Faction
 * @package App\Models\Factions
 *
 * @property int $id
 * @property int world_id
 * @property string $name
 * @property string description
 * @property int emblem_id
 *
 * @method static find(int $id)
 * @method static where(string $string, string $operator, string $id)
 */
class Faction extends Model
{
    protected $with = [
    ];
    protected $visible = [
        'id',
        'name',
    ];
    protected $fillable = [
        'world_id',
        'name',
        'description',
        'emblem_id',
    ];

    /**
     * Faction constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return BelongsToMany
     */
    public function characters()
    {
        return $this->belongsToMany('App\Models\Character', 'factions_characters', 'faction_id', 'character_id');
    }
}
