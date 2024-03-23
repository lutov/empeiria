<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\Characters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Quest
 * @package App\Models\Character
 */
class Quest extends Model
{

    protected $table = 'characters_quests';

    protected $visible = array('id', 'character_id', 'quest_id');
    protected $fillable = array('id', 'character_id', 'quest_id');

    /**
     * @return HasMany
     */
    public function characters()
    {
        return $this->hasMany('App\Models\Character');
    }

}
