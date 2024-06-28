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
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
     * @return BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(SkillType::class);
    }

    /**
     * @return BelongsToMany
     */
    public function characters()
    {
        return $this->belongsToMany(Character::class, 'character_skill');
    }
}
