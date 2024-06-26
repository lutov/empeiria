<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\Characters;

use App\Models\Factions\Faction;
use App\Models\Squads\Squad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Character
 * @package App\Models
 *
 * @property int $id
 * @property int $user_id
 * @property int $world_id
 * @property string $first_name
 * @property string $nickname
 * @property string $last_name
 * @property string $species_id
 * @property Species $species
 * @property string $age
 * @property string $sex
 * @property string $bio
 * @property int $avatar_id
 * @property Avatar $avatar
 * @property int $faction_id
 * @property int $faction_order
 * @property Faction $faction
 * @property int $squad_id
 * @property int $squad_order
 * @property Squad $squad
 * @property Position position
 *
 * @method static find(int $id)
 * @method static where(string $string, $id)
 */
class Character extends Model
{

    use SoftDeletes;

    protected $with = [
        //'gender',
        //'avatar',
        'qualities',
        //'inventory',
        'position',
    ];
    protected $visible = [
        'id',
        'sex',
        'first_name',
        'nickname',
        'last_name',
        'species',
        'age',
        'bio',
        'qualities',
        'position',
    ];
    protected $fillable = [
        'id',
        'user_id',
        'world_id',
        'species_id',
        'sex',
        'first_name',
        'nickname',
        'last_name',
        'age',
        'bio',
    ];

    /**
     * Character constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return BelongsToMany
     */
    public function types()
    {
        return $this->belongsToMany(Type::class, 'character_type');
    }

    /**
     * @return BelongsTo
     */
    public function species()
    {
        return $this->belongsTo(Species::class);
    }

    /**
     * @return BelongsTo
     */
    public function avatar()
    {
        return $this->belongsTo('App\Models\Characters\Avatar');
    }

    /**
     * @return HasOne
     */
    public function body()
    {
        return $this->hasOne('App\Models\Characters\Body');
    }

    /**
     * @return HasMany
     */
    public function bodyparts()
    {
        return $this->hasMany('App\Models\Characters\Bodypart');
    }

    /**
     * @return HasOne
     */
    public function inventory()
    {
        return $this->hasOne('App\Models\Characters\Inventory');
    }

    /**
     * @return BelongsToMany
     */
    public function qualities()
    {
        return $this->belongsToMany(Quality::class, 'character_quality')->withPivot('value');
    }

    /**
     * @return BelongsToMany
     */
    public function perks()
    {
        return $this->belongsToMany(Perk::class, 'character_perk');
    }

    /**
     * @return BelongsToMany
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'character_skill');
    }

    /**
     * @return BelongsToMany
     */
    public function parameters()
    {
        return $this->belongsToMany(Parameter::class, 'character_parameter')->withPivot('value');
    }

    /**
     * @return HasMany
     */
    public function conditions()
    {
        return $this->hasMany('App\Models\Characters\Condition');
    }

    /**
     * @return HasMany
     */
    public function features()
    {
        return $this->hasMany('App\Models\Characters\Feature');
    }

    /**
     * @return HasMany
     */
    public function assets()
    {
        return $this->hasMany('App\Models\Asset');
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
    public function squad()
    {
        return $this->belongsTo('App\Models\Factions\Squad');
    }

    /**
     * @return HasOne
     */
    public function position()
    {
        return $this->hasOne(Position::class, 'character_id');
    }

    /**
     * @return HasMany
     */
    public function relations()
    {
        return $this->hasMany('App\Models\Relation');
    }

}
