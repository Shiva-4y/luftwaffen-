<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IceCreamController;
use App\Models\IceCream;
use App\Http\Controllers\OrderController;

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
    Route::resource('icorder', IceCreamController::class);
    Route::get('/icorder', [IceCreamController::class, 'order'])->name('icorder.order');
    Route::post('/order', [OrderController::class, 'store'])->name('icorder.store');
    Route::get('/order/confirmation', [OrderController::class, 'confirmation'])->name('icorder.confirmation');
    Route::get('/order/view', [OrderController::class, 'viewOrders'])->name('icorder.view');
    Route::post('/orders/{orderId}/pay', [OrderController::class, 'markAsPaid'])->name('icorder.pay');
    Route::post('/order/pay/{id}', [OrderController::class, 'processPayment'])->name('order.processPayment');


    // Route::post('/order/pay/{orderId}', [OrderController::class, 'processPayment'])->name('icorder.view');
    Route::post('/order/pay/{orderId}', [OrderController::class, 'processPaymentAjax'])->name('order.pay.ajax');


require __DIR__.'/auth.php';
