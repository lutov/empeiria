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
 * Class Quality
 * @package App\Models\Characters
 */
class Quality extends Model
{
    protected $table = 'characters_qualities';
    public $timestamps = false;
    protected $visible = array(
        'id',
        'name',
        'slug',
        'description'
    );
    protected $fillable = array(
        'id',
        'name',
        'slug',
        'description',
        'alt_description',
        'default_value'
    );

    /**
     * @return BelongsToMany
     */
    public function characters()
    {
        return $this->belongsToMany(Character::class, 'character_quality');
    }
}
