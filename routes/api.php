<?php

use App\Http\Controllers\AvatarController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\ContainerController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\FactionController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SquadController;
use App\Http\Controllers\WorldController;
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

    Route::group(array('prefix' => 'factions'), function () {
        Route::controller(FactionController::class)->group(function () {
            Route::get('/{id}/squads', 'squads')->name('faction.squads');
            Route::post('/{id}/squads/attach', 'attachSquads')->name('faction.attach.squads');
            Route::post('/{id}/squads/detach', 'detachSquads')->name('faction.detach.squads');

            Route::get('/{id}/characters', 'characters')->name('faction.characters');
            Route::post('/{id}/characters/attach', 'attachCharacters')->name('faction.attach.characters');
            Route::post('/{id}/characters/detach', 'detachCharacters')->name('faction.detach.characters');
        });
    });

    Route::group(array('prefix' => 'squads'), function () {
        Route::controller(SquadController::class)->group(function () {
            Route::get('/{id}/characters', 'characters')->name('squad.characters');
            Route::post('/{id}/characters/attach', 'attachCharacters')->name('squad.attach.characters');
            Route::post('/{id}/characters/detach', 'detachCharacters')->name('squad.detach.characters');
        });
    });

    Route::group(array('prefix' => 'characters'), function () {
        Route::controller(CharacterController::class)->group(function () {
            Route::post('/{id}/move', 'move')->name('move.character');
        });
    });

    Route::any('avatars/random', 'AvatarController@random')->name('avatar.random');

    Route::group(array('prefix' => 'containers'), function () {
        Route::controller(ContainerController::class)->group(function () {
            Route::get('/{id}/items', 'items')->name('container.items');
            Route::post('/{id}/items/attach', 'attachItems')->name('container.attach.items');
            Route::post('/{id}/items/detach', 'detachItems')->name('container.detach.items');
        });
    });

    Route::group(array('prefix' => 'inventories'), function () {
        Route::controller(InventoryController::class)->group(function () {
            Route::get('/{id}/items', 'items')->name('inventory.items');
            Route::post('/{id}/items/attach', 'attachItems')->name('inventory.attach.items');
            Route::post('/{id}/items/detach', 'detachItems')->name('inventory.detach.items');
            Route::put('/{id}/items/{itemId}', 'setItemValues')->name('inventory.set.item.values');
        });
    });

    Route::resources(
        array(
            'worlds' => WorldController::class,
            'factions' => FactionController::class,
            //'squads_types' => SquadTypeController::class,
            'squads' => SquadController::class,
            'characters' => CharacterController::class,

            'items' => ItemController::class,
            'containers' => ContainerController::class,
            'inventories' => InventoryController::class,

            'avatars' => AvatarController::class,
            'genders' => GenderController::class,

            'conversations' => ConversationController::class,
            'messages' => MessageController::class,
        )
    );
});
