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
 * Class Origin
 * @package App\Models\Character
 */
class Origin extends Model
{

    protected $table = 'characters_origins';

    protected $visible = array('id', 'character_id', 'origin_id');
    protected $fillable = array('id', 'character_id', 'origin_id');

}
