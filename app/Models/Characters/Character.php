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
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Character
 * @package App\Models
 *
 * @property int $id
 * @property int $user_id
 * @property int $world_id
 * @property string $name
 * @property string $nickname
 * @property string $last_name
 * @property string $age
 * @property string $bio
 * @property string $sex
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
        //'position',
    ];
    protected $visible = [
        'id',
        'name',
        'nickname',
        'last_name',
        'sex',
        'age',
        'bio',
        'qualities',
        'avatar',
        'faction_id',
        'faction_order',
        'squad_id',
        'squad_order',
        'inventory',
    ];
    protected $fillable = [
        'id',
        'name',
        'nickname',
        'last_name',
        'gender_id',
        'age',
        'bio',
        'avatar_id',
        'faction_id',
        'faction_order',
        'squad_id',
        'squad_order',
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
     * @return BelongsTo
     */
    public function gender()
    {
        return $this->belongsTo('App\Models\Characters\Gender');
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
     * @return HasMany
     */
    public function relations()
    {
        return $this->hasMany('App\Models\Relation');
    }

    /**
     * @return MorphOne
     */
    public function position()
    {
        return $this->morphOne('App\Models\Position', 'entity');
    }

}
