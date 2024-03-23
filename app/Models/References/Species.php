<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\References;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Query\Builder;

/**
 * Class Species
 * @package App\Models
 * @mixin Builder
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 */
class Species extends Model
{

    /**
     * @return HasOne
     */
    public function kingdom()
    {
        return $this->hasOne('App\Models\Types\Kingdom');
    }

}
