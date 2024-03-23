<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\References;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Condition
 * @package App\Models\Types
 */
class Condition extends Model
{

    protected $visible = array('id', 'name', 'slug', 'description');
    protected $fillable = array('id', 'name', 'slug', 'description');

}
