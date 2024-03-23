<?php

namespace App\Models\Squads;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;

/**
 * Class Banner
 * @package App\Models\Squads
 * @mixin Builder
 *
 * @property int $id
 * @property int $faction_id
 * @property string $name
 * @property string $description
 * @property string $banner_id
 *
 * @method static create(array $array)
 */
class Banner extends Model
{
    protected $fillable = [
        'faction_id',
        'name',
        'description',
        'banner_id',
    ];
    protected $table = 'squads_banners';
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
        return '/img/squads/banners/' . $this->name . '.png';
    }

    /**
     * @return Banner|Model|object|null
     */
    public static function random()
    {
        return self::inRandomOrder()->first();
    }
}
