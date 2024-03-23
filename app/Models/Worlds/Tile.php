<?php


namespace App\Models\Worlds;


use Illuminate\Database\Eloquent\Model;

/**
 * @property int $region_id
 * @property string $name
 * @property string $description
 * @property string $color
 * @property int $global_y
 * @property int $global_x
 * @property int $local_y
 * @property int $local_x
 */
class Tile extends Model
{

    protected $visible = [
        'name',
        'description',
        'color',
        'global_y',
        'global_x',
        'local_y',
        'local_x',
    ];

}
