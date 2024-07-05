<?php

use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/')->middleware(['auth', 'verified'])->group(function() {
    Route::get('dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::get('menu', function() {
        $products = Product::with('category')->orderBy('category_id')->get();
        return view('special.menu', [
            'products' => $products
        ]);
    })->name('menu');

    Route::resource('users', UserController::class)->names('users');
    Route::resource('products', ProductController::class)->names('products');
    Route::resource('transactions', TransactionController::class)->names('transactions');
    Route::resource('methods', PaymentMethodController::class)->names('methods');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
