<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');

Route::get('/cart', function () {
    return view('frontend.cart');
});

Route::get('/checkout', function () {
    return view('frontend.checkout');
});