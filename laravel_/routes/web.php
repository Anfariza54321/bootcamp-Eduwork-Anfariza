<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/products',
    [ProductController::class, 'index']
)->name('products.index');

Route::get(
    '/product-detail/{id}',
    [ProductController::class, 'show']
);

Route::get('/categoryAdmin', [ProductController::class, 'categoryAdmin'])->name('category.admin');
Route::post('/categoryAdmin', [ProductController::class, 'createCategory'])->name('category.store');
Route::patch('/categoryAdmin/{id}', [ProductController::class, 'updateCategory'])->name('category.update');
Route::delete('/categoryAdmin/{id}', [ProductController::class, 'deleteCategory'])->name('category.destroy');



Route::get('/productsAdmin', [ProductController::class, 'adminIndex'])->name('products.admin');
Route::post('/productsAdmin/store', [ProductController::class, 'createProduct'])->name('products.store');
Route::get('/productsAdmin/create', [ProductController::class, 'create'])->name('products.create');
Route::patch('/productsAdmin/{id}', [ProductController::class, 'updateProducts'])->name('products.update');
Route::delete('/productsAdmin/{id}', [ProductController::class, 'deleteProduct'])->name('products.destroy');
Route::get('/productsAdmin/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');



Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('carts.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/carts', [CartController::class, 'index']);
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
