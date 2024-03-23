<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\Characters;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Feature
 * @package App\Models\Character
 */
class Feature extends Model
{

    protected $table = 'characters_features';

    protected $visible = array('id', 'character_id', 'feature_id');
    protected $fillable = array('id', 'character_id', 'feature_id');

}
