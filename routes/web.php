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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/games', function () {
        return view('games.games');
    })->name('games');
    Route::get('/games/{id}', function (int $id) {
        $data = array(
            'id' => $id,
        );
        return view('games.game', $data);
    })->name('game');

    Route::get('/worlds', function () {
        return view('worlds.worlds');
    })->name('worlds');
    Route::get('/worlds/{id}', function (int $id) {
        $data = array(
            'id' => $id,
        );
        return view('worlds.world', $data);
    })->name('world');
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
