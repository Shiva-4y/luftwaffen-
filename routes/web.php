<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IceCreamController;
use App\Models\IceCream;

Route::view('/', 'welcome');

Route::get('/dashboard', function () {
    $totalIceCream = IceCream::count();
    return view('dashboard', compact('totalIceCream'));
})->middleware(['auth', 'verified'])->name('dashboard');  // Combined route

  

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::resource('icecreams', IceCreamController::class);
    // Route::get('/icecreams', [IceCreamController::class, 'index'])->name('icecreams.index');


require __DIR__.'/auth.php';
