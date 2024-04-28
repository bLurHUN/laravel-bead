<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContestController;
use Illuminate\Support\Facades\Route;

// Főoldal
Route::get('/', function () {
    return view('index');
})->name('index');

// Karakter
Route::get('/characters', [CharacterController::class, 'index'])->name('characters.index');
Route::get('/characters/create', [CharacterController::class, 'create'])->name('characters.create');
Route::get('/characters/{character}', [CharacterController::class, 'show'])->name('characters.show');
Route::get('/characters/{character}/edit', [CharacterController::class, 'edit'])->name('characters.edit');
Route::post('/characters', [CharacterController::class, 'store'])->name('characters.store');
Route::patch('/characters/{character}', [CharacterController::class, 'update'])->name('characters.update');
Route::delete('/characters/{character}', [CharacterController::class, 'destroy'])->name('characters.destroy');

// Helyszín
Route::get('/places', [PlaceController::class, 'index'])->name('places.index');
Route::get('/places/create', [PlaceController::class, 'create'])->name('places.create');
Route::get('/places/{place}', [PlaceController::class, 'show'])->name('places.show');
Route::get('/places/{place}/edit', [PlaceController::class, 'edit'])->name('places.edit');
Route::post('/places', [PlaceController::class, 'store'])->name('places.store');
Route::patch('/places/{place}', [PlaceController::class, 'update'])->name('places.update');
Route::delete('/places/{place}', [PlaceController::class, 'destroy'])->name('places.destroy');

// Mérkőzés
Route::get('/contests/{contest}', [ContestController::class, 'show'])->name('contests.show');
Route::post('/contests', [ContestController::class, 'store'])->name('contests.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
