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
use Illuminate\Database\Query\Builder;

/**
 * Class Gender
 * @package App\Models
 * @mixin Builder
 *
 * @property int $id
 * @property int $gender_id
 * @property string $name
 * @property string $path
 *
 * @method static create(array $array)
 */
class Avatar extends Model
{
    protected $fillable = ['gender_id', 'name'];
    protected $table = 'characters_avatars';
    protected $visible = [
        'id',
        'name',
        'gender_id',
        'path',
    ];
    protected $appends = ['path'];

    /**
     * @return BelongsTo
     */
    public function gender()
    {
        return $this->belongsTo('App\Models\Characters\Gender');
    }

    /**
     * @return string
     */
    public function getPathAttribute()
    {
        return '/img/characters/avatars/' . $this->gender->slug . '/' . $this->name . '.jpg';
    }

    /**
     * @param Gender $gender
     * @return Avatar|Model|object|null
     */
    public static function random(Gender $gender)
    {
        return self::where('gender_id', '=', $gender->id)->inRandomOrder()->first();
    }
}
