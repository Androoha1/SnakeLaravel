<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LobbyController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LanguageSwitcher;
use App\Http\Controllers\ReviewController;

Route::middleware([LanguageSwitcher::class])->group(function () {
    Route::get('/', [LobbyController::class, 'index'])->name('home');
    Route::get('/lobby', [LobbyController::class, 'index'])->name('lobby');
    

    Route::delete('/players/{id}', [PlayerController::class, 'destroy'])->name('players.destroy');
    Route::resource('players', PlayerController::class);
    Route::post('/update-score', [PlayerController::class, 'updateScore']);
    Route::post('/update-best-score', [PlayerController::class, 'updateBestScore']);

    Route::middleware(['auth'])->group(function () {
        Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
        Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
        Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
        Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
        Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
        Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/players', [PlayerController::class, 'index'])->name('players.index');
        Route::get('/players/{id}/edit', [PlayerController::class, 'edit'])->name('players.edit');
        Route::put('/players/{id}', [PlayerController::class, 'update'])->name('players.update');
    });

    Route::get('/play', [LobbyController::class, 'showPlay'])->name('play');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
});

