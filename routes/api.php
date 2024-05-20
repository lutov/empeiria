<?php

use App\Http\Controllers\API\AvatarAPIController;
use App\Http\Controllers\API\CharacterAPIController;
use App\Http\Controllers\API\ContainerAPIController;
use App\Http\Controllers\API\ConversationAPIController;
use App\Http\Controllers\API\FactionAPIController;
use App\Http\Controllers\API\GameAPIController;
use App\Http\Controllers\API\GenderAPIController;
use App\Http\Controllers\API\InventoryAPIController;
use App\Http\Controllers\API\ItemAPIController;
use App\Http\Controllers\API\MapAPIController;
use App\Http\Controllers\API\MessageAPIController;
use App\Http\Controllers\API\NameAPIController;
use App\Http\Controllers\API\SquadAPIController;
use App\Http\Controllers\API\WorldAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->name('api.user');

    Route::post('/worlds/{id}/path', array(WorldAPIController::class, 'path'))->name('world.path');
    Route::post('/worlds/{id}/structures', array(WorldAPIController::class, 'structures'))->name('world.structures');

    Route::post('/maps/preview', array(MapAPIController::class, 'preview'))->name('map.preview');

    Route::group(array('prefix' => 'factions'), function () {
        Route::controller(FactionAPIController::class)->group(function () {
            Route::get('/{id}/squads', 'squads')->name('faction.squads');
            Route::post('/{id}/squads/attach', 'attachSquads')->name('faction.attach.squads');
            Route::post('/{id}/squads/detach', 'detachSquads')->name('faction.detach.squads');

            Route::get('/{id}/characters', 'characters')->name('faction.characters');
            Route::post('/{id}/characters/attach', 'attachCharacters')->name('faction.attach.characters');
            Route::post('/{id}/characters/detach', 'detachCharacters')->name('faction.detach.characters');
        });
    });

    Route::group(array('prefix' => 'squads'), function () {
        Route::controller(SquadAPIController::class)->group(function () {
            Route::get('/{id}/characters', 'characters')->name('squad.characters');
            Route::post('/{id}/characters/attach', 'attachCharacters')->name('squad.attach.characters');
            Route::post('/{id}/characters/detach', 'detachCharacters')->name('squad.detach.characters');
        });
    });

    Route::group(array('prefix' => 'characters'), function () {
        Route::controller(CharacterAPIController::class)->group(function () {
            Route::post('/{id}/move', 'move')->name('move.character');
        });
    });

    Route::any('avatars/random', 'AvatarController@random')->name('avatar.random');

    Route::get('names/random', array(NameAPIController::class, 'random'))->name('name.random');

    Route::group(array('prefix' => 'containers'), function () {
        Route::controller(ContainerAPIController::class)->group(function () {
            Route::get('/{id}/items', 'items')->name('container.items');
            Route::post('/{id}/items/attach', 'attachItems')->name('container.attach.items');
            Route::post('/{id}/items/detach', 'detachItems')->name('container.detach.items');
        });
    });

    Route::group(array('prefix' => 'inventories'), function () {
        Route::controller(InventoryAPIController::class)->group(function () {
            Route::get('/{id}/items', 'items')->name('inventory.items');
            Route::post('/{id}/items/attach', 'attachItems')->name('inventory.attach.items');
            Route::post('/{id}/items/detach', 'detachItems')->name('inventory.detach.items');
            Route::put('/{id}/items/{itemId}', 'setItemValues')->name('inventory.set.item.values');
        });
    });

    Route::resources(
        array(
            'games' => GameAPIController::class,
            'worlds' => WorldAPIController::class,
            'factions' => FactionAPIController::class,
            //'squads_types' => SquadTypeController::class,
            'squads' => SquadAPIController::class,
            'characters' => CharacterAPIController::class,

            'items' => ItemAPIController::class,
            'containers' => ContainerAPIController::class,
            'inventories' => InventoryAPIController::class,

            'avatars' => AvatarAPIController::class,
            'genders' => GenderAPIController::class,

            'conversations' => ConversationAPIController::class,
            'messages' => MessageAPIController::class,
        )
    );
});
