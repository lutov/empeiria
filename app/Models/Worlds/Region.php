<?php


namespace App\Models\Worlds;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property int $world_id
 * @property int $map_id
 * @property string $name
 * @property string $description
 * @property string $color
 * @property int $biome_id
 * @property int $faction_id
 * @property int $start_y
 * @property int $start_x
 * @property int $size_y
 * @property int $size_x
 * @property array $tiles
 *
 * @method static find(int $id)
 * @method static where(string $string, $id)
 */
class Region extends Model
{

    protected $with = ['tiles'];
    protected $visible = [
        'world_id',
        'map_id',
        'name',
        'description',
        'color',
        'biome_id',
        'faction_id',
        'start_y',
        'start_x',
        'size_y',
        'size_x',
        'tiles',
    ];

    /**
     * @return BelongsTo
     */
    public function world()
    {
        return $this->belongsTo('App\Models\World\World');
    }

    /**
     * @return BelongsTo
     */
    public function map()
    {
        return $this->belongsTo('App\Models\World\Map');
    }

    /**
     * @return HasOne
     */
    public function biome()
    {
        return $this->hasOne('App\Models\World\Biome');
    }

    /**
     * @return HasMany
     */
    public function tiles()
    {
        return $this->hasMany('App\Models\World\Tile');
    }


}
