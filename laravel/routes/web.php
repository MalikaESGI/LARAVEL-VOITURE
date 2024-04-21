<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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




Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('voiture', App\Http\Controllers\Admin\VoitureController::class);
    Route::resource('user', App\Http\Controllers\Admin\GestionUserController::class);
    Route::resource('category', App\Http\Controllers\Admin\CategoryVoitureController::class);
   
});

require __DIR__.'/auth.php';
