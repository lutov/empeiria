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
 * Class SkillType
 * @package App\Models\Characters
 *
 * @method static create(array $types)
 */
class SkillType extends Model
{
    protected $table = 'characters_skills_types';
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
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'characters_skills', 'skill_type_id');
    }
}
