<?php


namespace App\Models\Worlds;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int id
 * @property string name
 * @property string slug
 * @property string description
 * @property array biomes
 * @property int size_y
 * @property int size_x
 *
 * @method static create(array $biome)
 * @method static find(int $id)
 */
class Structure extends Model
{
    protected $table = 'structures';
    public $timestamps = false;
    protected $fillable = array(
        'id',
        'name',
        'slug',
        'description',
        'alt_description',
        'frequency',
        'start_y',
        'start_x',
        'size_y',
        'size_x',
        'biomes',
    );
    protected $casts = [
        'biomes' => 'array',
    ];

    /**
     * @return BelongsToMany
     */
    public function worlds()
    {
        return $this->belongsToMany(World::class, 'world_structure');
    }
}
