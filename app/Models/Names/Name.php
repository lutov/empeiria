<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\Names;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class Name
 * @package App\Models\References
 * @mixin Builder
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @method static create(array|false $name)
 */
class Name extends Model
{
    protected $fillable = array(
        'name',
        'alt_name',
        'first_name',
        'nickname',
        'last_name',
        'none',
        'male',
        'female',
        'world',
        'region',
        'city',
        'faction',
        'squad',
        'item'
    );
    /**
     * @param  array  $params
     * @return mixed
     */
    public static function random(array $params = array())
    {
        return self::select('name')
            ->where($params)
            ->inRandomOrder()
            ->value('name');
    }
}
