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
 * Class Perk
 * @package App\Models\Characters
 */
class Perk extends Model
{
    protected $table = 'characters_perks';
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
    );

    /**
     * @return BelongsToMany
     */
    public function characters()
    {
        return $this->belongsToMany(Character::class, 'character_perk');
    }
}
