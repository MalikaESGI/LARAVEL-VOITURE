<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoitureController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home')->name('home.index');
// });

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/voitures', [VoitureController::class,'index'])->name('voiture.index');
Route::get('/voitures/{voiture}', [VoitureController::class,'show'])->name('voiture.show');


Route::post('/favorites/toggle', [FavoriteController::class, 'toggleFavorite'])->name('favorites.toggle');

Route::get('/favorites', [FavoriteController::class, 'showFavorites'])->name('favorites.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::resource('voiture', App\Http\Controllers\Admin\VoitureController::class)->middleware('admin');
    Route::resource('user', App\Http\Controllers\Admin\GestionUserController::class)->middleware('admin');
    Route::resource('category', App\Http\Controllers\Admin\CategoryVoitureController::class)->middleware('admin');
   
});

require __DIR__.'/auth.php';
