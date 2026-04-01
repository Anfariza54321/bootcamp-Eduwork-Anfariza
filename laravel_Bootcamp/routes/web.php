<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', function () {
    return view('welcome');
});

Route::get('/cart', function () {
    return view('welcome');
});

Route::get('/checkout', function () {
    return view('welcome');
});