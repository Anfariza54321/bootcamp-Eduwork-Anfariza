<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MerekAdminController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductsController::class, 'show'])->name('products.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');



Route::post('/process-order', [CheckoutController::class, 'store'])->name('order.store');

Route::get('/order-summary', [CheckoutController::class, 'summary'])->name('order.summary');
Route::post('/order/store', [OrdersController::class, 'store'])->name('order.store')->middleware('auth');


Route::get('/produkAdmin', [ProductAdminController::class, 'index'])->name('produkAdmin');
Route::get('/produkAdmin/create', [ProductAdminController::class, 'create'])->name('produk.create');
Route::post('/produkAdmin/store', [ProductAdminController::class, 'store'])->name('produk.store');
Route::get('/produkAdmin/{id}/edit', [ProductAdminController::class, 'edit'])->name('produk.edit');
Route::put('/produkAdmin/{id}', [ProductAdminController::class, 'update'])->name('produk.update');
Route::delete('/produkAdmin/{id}', [ProductAdminController::class, 'destroy'])->name('produk.destroy');



Route::get('/merekAdmin', [MerekAdminController::class, 'index'])->name('merekAdmin');
Route::get('/merekAdmin/create', [MerekAdminController::class, 'create'])->name('merek.create');
Route::post('/merekAdmin/store', [MerekAdminController::class, 'store'])->name('merek.store');
Route::put('/merekAdmin/{id}/edit', [MerekAdminController::class, 'edit'])->name('merek.edit');
Route::put('/merekAdmin/{id}', [MerekAdminController::class, 'update'])->name('merek.update');
Route::delete('/merekAdmin/{id}', [MerekAdminController::class, 'destroy'])->name('merek.destroy');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/orders/history', [DashboardController::class, 'history'])->name('admin.orders.history');
});

require __DIR__.'/auth.php';
