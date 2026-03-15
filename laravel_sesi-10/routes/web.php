<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get(
    '/products',
    [ProductController::class, 'index']
)->name('products.index');

Route::get(
    '/product-detail/{id}',
    [ProductController::class, 'show']
);


// Route::get('/carts', function () {
//     return view('carts');
// });

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

// Route untuk menambah ke keranjang
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('carts.add');

// Route untuk melihat isi keranjang
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/carts', [CartController::class, 'index']);

// Pastikan namanya 'cart.remove' sesuai dengan yang dipanggil di Blade
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
