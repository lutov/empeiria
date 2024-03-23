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
 * @property string name
 *
 * @method static find(int $id)
 */
class Group extends Model
{

    /**
     * @var string
     */
    protected $table = 'groups';

}
