<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorldController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/demo',  array(DemoController::class, 'index'))->middleware(['auth', 'verified'])->name('demo');

Route::group(array('prefix' => 'games'), function () {
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/', array(GameController::class, 'index'))->name('games');
        Route::get('/{id}', array(GameController::class, 'show'))->name('game');

        Route::get('/{gameId}/worlds', array(WorldController::class, 'index'))->name('worlds');
        Route::get('/{gameId}/worlds/{id}', array(WorldController::class, 'show'))->name('world');

        Route::get('/{gameId}/worlds/{worldId}/characters', array(CharacterController::class, 'index'))->name('characters');
        Route::get('/{gameId}/worlds/{worldId}/characters/{id}', array(CharacterController::class, 'show'))->name('character');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// MigrationsUI Assets
Route::get('vendor/laravel-migrations-ui/{path}', '\DaveJamesMiller\MigrationsUI\Controllers\AssetController')
    ->where('path', '.*')
    ->name('migrations-ui.asset');

require __DIR__.'/auth.php';
