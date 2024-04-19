<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\Characters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Origin
 * @package App\Models\Character
 *
 * @method static whereNull(string $column)
 */
class Species extends Model
{

    protected $table = 'characters_species';
    public $timestamps = false;
    protected $visible = array(
        'id',
        'name',
        'slug',
        'description',
        'icon'
    );
    protected $fillable = array(
        'id',
        'name',
        'slug',
        'description',
        'alt_description',
        'icon',
        'parent_id'
    );

    /**
     * @return BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Species::class, 'parent_id');
    }

    /**
     * @return HasMany
     */
    public function children()
    {
        return $this->hasMany(Species::class, 'parent_id');
    }

    /**
     * @return HasMany
     */
    public function characters()
    {
        return $this->hasMany(Character::class, 'species_id');
    }
}
