<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});


// Product Routes:
Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/products/create', function () {
    return view('welcome');
});
