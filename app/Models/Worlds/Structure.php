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
        'start_y',
        'start_x',
        'size_y',
        'size_x',
        'biome_id',
    );
}
