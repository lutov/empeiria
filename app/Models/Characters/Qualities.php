<?php

namespace App\Models\Characters;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Quality
 * @package App\Models\Characters
 * @method static create(array $characterQualities)
 */
class Qualities extends Model
{
    protected $table = 'character_qualities';
    public $timestamps = false;
    protected $visible = array(
        'appeal',
        'vitality',
        'intellect',
        'sociality',
        'mobility',
        'willpower',
    );
    protected $fillable = array(
        'character_id',
        'appeal',
        'vitality',
        'intellect',
        'sociality',
        'mobility',
        'willpower',
    );
}
