<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\Squads;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Quality
 * @package App\Models\Characters
 *
 * @method static create(array $parameter)
 */
class Parameter extends Model
{
    protected $table = 'squads_parameters';
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
    public function squads()
    {
        return $this->belongsToMany(Squad::class, 'squad_parameter');
    }
}
