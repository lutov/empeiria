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
 * Class Origin
 * @package App\Models\Types
 */
class Origin extends Model
{

    protected $visible = array('id', 'name', 'slug', 'description');
    protected $fillable = array('id', 'name', 'slug', 'description');

}
