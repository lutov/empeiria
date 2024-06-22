<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\Characters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Type
 * @package App\Models\Characters
 *
 * @method static create(array $types)
 */
class Type extends Model
{
    protected $table = 'characters_types';
    public $timestamps = false;
    protected $visible = array(
        'id',
        'name',
        'slug',
        'description',
        'icon'
    );
    protected $fillable = array(
        'id',
        'name',
        'slug',
        'description',
        'alt_description',
        'icon',
    );

    /**
     * @return BelongsToMany
     */
    public function characters()
    {
        return $this->belongsToMany(Character::class, 'character_type');
    }
}
