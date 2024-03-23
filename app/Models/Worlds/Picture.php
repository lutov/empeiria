<?php

namespace App\Models\Worlds;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class Picture
 * @package App\Models\Worlds
 * @mixin Builder
 *
 * @property int $id
 * @property string $name
 *
 * @method static Picture inRandomOrder()
 * @method static first()
 * @method static create(array $array)
 */
class Picture extends Model
{
    protected $fillable = ['name'];
    protected $table = 'worlds_pictures';
    protected $visible = [
        'id',
        'name',
        'path',
    ];
    protected $appends = ['path'];

    /**
     * @return string
     */
    public function getPathAttribute()
    {
        return '/img/worlds/pictures/' . $this->name . '.jpg';
    }

    /**
     * @return Picture|Model|object|null
     */
    public static function random()
    {
        return self::inRandomOrder()->first();
    }
}
