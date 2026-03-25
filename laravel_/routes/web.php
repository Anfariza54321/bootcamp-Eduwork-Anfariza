<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

Route::get('/categoryAdmin', function () {
    return view('dashboard.categoryAdmin');
})->name('categoryAdmin');

Route::get('/productsAdmin', function () {
    return view('dashboard.productsAdmin');
})->name('productsAdmin');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

// Route untuk menambah ke keranjang
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('carts.add');

// Route untuk melihat isi keranjang
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/carts', [CartController::class, 'index']);

// Pastikan namanya 'cart.remove' sesuai dengan yang dipanggil di Blade
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
