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
 * Class Condition
 * @package App\Models\Character
 */
class Condition extends Model
{

    protected $table = 'characters_conditions';

    protected $visible = array('id', 'character_id', 'condition_id');
    protected $fillable = array('id', 'character_id', 'condition_id');

}
