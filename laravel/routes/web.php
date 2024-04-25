<?php

use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\VoitureController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home')->name('home.index');
// });

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/voitures', [VoitureController::class,'index'])->name('voiture.index');
Route::get('/voitures/{voiture}', [VoitureController::class,'show'])->name('voiture.show');


//Résérvation
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservation.index')->middleware('auth');
Route::get('/reservation/{voiture_id}', [ReservationController::class, 'create'])->name('reservation.create')->middleware('auth');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store')->middleware('auth');
Route::post('/favorites/toggle', [FavoriteController::class, 'toggleFavorite'])->name('favorites.toggle')->middleware('auth');

Route::get('/favorites', [FavoriteController::class, 'showFavorites'])->name('favorites.show')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class,'index'])->name('admin.dashboard');
    Route::get('reservation', [App\Http\Controllers\Admin\ReservationController::class,'index'])->name('reservation.index');
    Route::resource('voiture', App\Http\Controllers\Admin\VoitureController::class)->middleware('admin');
    Route::resource('user', App\Http\Controllers\Admin\GestionUserController::class)->middleware('admin');
    Route::resource('category', App\Http\Controllers\Admin\CategoryVoitureController::class)->middleware('admin');
   
});

require __DIR__.'/auth.php';
