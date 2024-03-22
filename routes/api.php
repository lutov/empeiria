<?php

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
        Route::get('/{id}/squads', 'FactionController@squads')->name('faction.squads');
        Route::post('/{id}/squads/attach', 'FactionController@attachSquads')->name('faction.attach.squads');
        Route::post('/{id}/squads/detach', 'FactionController@detachSquads')->name('faction.detach.squads');

        Route::get('/{id}/characters', 'FactionController@characters')->name('faction.characters');
        Route::post('/{id}/characters/attach', 'FactionController@attachCharacters')->name('faction.attach.characters');
        Route::post('/{id}/characters/detach', 'FactionController@detachCharacters')->name('faction.detach.characters');
    });

    Route::group(array('prefix' => 'squads'), function () {
        Route::get('/{id}/characters', 'SquadController@characters')->name('squad.characters');
        Route::post('/{id}/characters/attach', 'SquadController@attachCharacters')->name('squad.attach.characters');
        Route::post('/{id}/characters/detach', 'SquadController@detachCharacters')->name('squad.detach.characters');
    });

    Route::group(array('prefix' => 'characters'), function () {
        Route::post('/{id}/move', 'CharacterController@move')->name('move.character');
    });

    Route::any('avatars/random', 'AvatarController@random')->name('avatar.random');

    Route::group(array('prefix' => 'containers'), function () {
        Route::get('/{id}/items', 'ContainerController@items')->name('container.items');
        Route::post('/{id}/items/attach', 'ContainerController@attachItems')->name('container.attach.items');
        Route::post('/{id}/items/detach', 'ContainerController@detachItems')->name('container.detach.items');
    });

    Route::group(array('prefix' => 'inventories'), function () {
        Route::get('/{id}/items', 'InventoryController@items')->name('inventory.items');
        Route::post('/{id}/items/attach', 'InventoryController@attachItems')->name('inventory.attach.items');
        Route::post('/{id}/items/detach', 'InventoryController@detachItems')->name('inventory.detach.items');
        Route::put('/{id}/items/{itemId}', 'InventoryController@setItemValues')->name('inventory.set.item.values');
    });

    Route::resources(
        array(
            'worlds' => 'WorldController',
            'factions' => 'FactionController',
            'squads_types' => 'SquadTypeController',
            'squads' => 'SquadController',
            'characters' => 'CharacterController',

            'items' => 'ItemController',
            'containers' => 'ContainerController',
            'inventories' => 'InventoryController',

            'avatars' => 'AvatarController',
            'genders' => 'GenderController',

            'conversations' => 'ConversationController',
            'messages' => 'MessageController',
        )
    );
});

