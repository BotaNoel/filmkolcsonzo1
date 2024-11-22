<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\RentalController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('new-genre', [GenreController::class, 'create'])->name('genres.create');
Route::post('new-genre', [GenreController::class, 'store'])->name('genres.store');

Route::get('films', [FilmController::class, 'index'])->name('films.index');
Route::get('new-film', [FilmController::class, 'create'])->name('films.create');
Route::post('new-film', [FilmController::class, 'store'])->name('films.store');
Route::delete('films/{id}', [FilmController::class, 'destroy'])->name('films.destroy');

Route::get('rented', [RentalController::class, 'index'])->name('rentals.index');
Route::get('films/{id}/rent', [RentalController::class, 'create'])->name('rentals.create');
Route::post('rented', [RentalController::class, 'store'])->name('rentals.store');
Route::put('rented/{id}', [RentalController::class, 'update'])->name('rentals.update');

require __DIR__.'/auth.php';
