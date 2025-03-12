<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IceCreamController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::resource('icecreams', IceCreamController::class);
    Route::get('/icecreams', [IceCreamController::class, 'index'])->name('icecreams.index');


require __DIR__.'/auth.php';
