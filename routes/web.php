<?php

use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/')->middleware(['auth', 'verified'])->group(function() {
    Route::get('dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::get('menu', function() {
        return view('special.menu');
    })->name('menu');

    Route::resource('users', UserController::class)->names('users');
    Route::resource('products', ProductController::class)->names('products');
    Route::resource('methods', PaymentMethodController::class)->names('methods');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
