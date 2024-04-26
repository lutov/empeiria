<?php


namespace App\Models\Worlds;


use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property int height
 * @property string color
 *
 * @method static create(array $biome)
 * @method static find(int $id)
 */
class Biome extends Model
{
    protected $table = 'biomes';
    public $timestamps = false;
    protected $fillable = array(
        'id',
        'name',
        'slug',
        'description',
        'alt_description',
        'height',
        'passable',
        'energy_cost',
        'liquid',
        'solid',
        'gas',
        'plasma',
        'red',
        'green',
        'blue',
    );
}
