<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models\Worlds;

use App\Models\Games\Game;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property int $user_id
 * @property int $game_id
 * @property string $name
 * @property string $description
 * @property string $seed
 * @property array $octaves
 * @property int $size
 * @property int $tile_size
 * @property int $scale
 *
 * @method static find(int $id)
 * @method static where(string $string, $id)
 */
class World extends Model
{
    protected static string $type = 'world';
    protected $fillable = [
        'user_id',
        'game_id',
        'name',
        'description',
        'seed',
        'octaves',
        'size',
        'tile_size',
        'scale',
    ];
    //protected $with = ['map'];
    protected $visible = [
        'id',
        'name',
        'seed'
    ];
    protected $casts = [
        'octaves' => 'array',
    ];

    /**
     * @return BelongsTo
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * @return BelongsToMany
     */
    public function structures()
    {
        return $this->belongsToMany(Structure::class, 'world_structure')->withPivot(
            array('name', 'description', 'alt_description', 'position_y', 'position_x')
        );
    }
}
