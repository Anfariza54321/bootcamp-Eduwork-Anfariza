<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/products', function () {
    return view('products', ['title' => 'Product']);
});

Route::get('/carts', function () {
    return view('carts', ['title' => 'Carts']);
});

Route::get('/checkout', function () {
    return view('checkout');
});
