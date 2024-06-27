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
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Skill
 * @package App\Models\Characters
 *
 * @method static create(array $skill)
 */
class Skill extends Model
{
    protected $table = 'characters_skills';
    public $timestamps = false;
    protected $visible = array(
        'id',
        'type',
        'name',
        'slug',
        'description',
        'icon'
    );
    protected $fillable = array(
        'id',
        'skill_type_id',
        'name',
        'slug',
        'description',
        'alt_description',
        'icon',
    );

    /**
     * @return HasOne
     */
    public function type()
    {
        return $this->hasOne(SkillType::class);
    }

    /**
     * @return BelongsToMany
     */
    public function characters()
    {
        return $this->belongsToMany(Character::class, 'character_skill');
    }
}
