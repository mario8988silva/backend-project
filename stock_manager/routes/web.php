<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () { return view('welcome'); });

// Brand Routes: --------------------------------------------------------------------------------------
Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
Route::get('/brands/{brand}', [BrandController::class, 'show'])->name('brands.show');

Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');


// Product Routes: ------------------------------------------------------------------------------------
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');



