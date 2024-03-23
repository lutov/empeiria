<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $type_id
 * @property string $name
 * @property string $description
 *
 * @method static find(int $id)
 * @method static where(string $string, $id)
 * @method static delete(int $id)
 *
 * @method static Item create(array|false $name)
 */
class Item extends Model
{
    protected $visible = [
        'id',
        'type_id',
        'name',
        'description',
        'values'
    ];
    protected $fillable = [
        'type_id',
        'name',
        'description'
    ];

    /**
     * @return HasOne
     */
    public function type()
    {
        return $this->hasOne('App\Models\Items\Type', 'id', 'type_id');
    }

    /**
     * @return BelongsToMany
     */
    public function parameters()
    {
        return $this->belongsToMany(Parameter::class, 'item_parameter', 'item_id', 'parameter_id')
            ->withPivot('value')
            ->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'item_attribute', 'item_id', 'attribute_id')
            ->withTimestamps();
    }
}
