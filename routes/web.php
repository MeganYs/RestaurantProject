<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', [OrderController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/order', function () {
    return view('order');
})->middleware(['auth'])->name('order.page');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/order', [OrderController::class, 'index'])->name('order.page');
    Route::post('/order/add', [OrderController::class, 'addDish'])->name('order.add');
    Route::post('/order/remove', [OrderController::class, 'removeDish'])->name('order.remove');
    Route::post('/order/confirm', [OrderController::class, 'confirmOrder'])->name('order.confirm');
});

require __DIR__.'/auth.php';
