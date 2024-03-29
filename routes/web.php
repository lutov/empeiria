<?php

use App\Http\Controllers\ProfileController;
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

Route::group(array('prefix' => 'games'), function () {
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/', function () {
            return view('games.games');
        })->name('games');
        Route::get('/{id}', function (int $id) {
            $data = array(
                'id' => $id,
            );
            return view('games.game', $data);
        })->name('game');

        Route::get('/{id}/worlds', function (int $gameId) {
            $data = array(
                'gameId' => $gameId,
            );
            return view('games.worlds', $data);
        })->name('worlds');
        Route::get('/{id}/worlds/{gameId}', function (int $id, int $gameId) {
            $data = array(
                'id' => $id,
                'gameId' => $gameId,
            );
            return view('games.world', $data);
        })->name('world');
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
