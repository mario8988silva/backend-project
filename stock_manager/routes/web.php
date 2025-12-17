<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TeamController;

Route::get('/', function () {
    return view('team.login');
});

// Team/Users Routes: ---------------------------------------------------------------------------------
Route::post('/logout', [TeamController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(TeamController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('show.register');
    Route::post('/register', 'register')->name('register');
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/login', 'login')->name('login');
});


Route::middleware('auth')->controller(TeamController::class)->group(function () {
    Route::get('/team', 'index')->name('team.index');
    Route::get('/team/create', 'create')->name('team.create');
    Route::get('/team/{user}/edit', 'edit')->name('team.edit');
    Route::post('/team', 'store')->name('team.store');
    Route::put('/team/{user}', 'update')->name('team.update');
    Route::get('/team/{user}', 'show')->name('team.show');    
    Route::delete('/team/{product}', 'destroy')->name('team.destroy');
});

// Brand Routes: --------------------------------------------------------------------------------------
Route::middleware('auth')->controller(BrandController::class)->group(function () {
    Route::get('/brands', 'index')->name('brands.index');
    Route::get('/brands/create', 'create')->name('brands.create');
    Route::get('/brands/{brand}', 'show')->name('brands.show');

    Route::post('/brands', 'store')->name('brands.store');
    Route::delete('/brands/{brand}', 'destroy')->name('brands.destroy');
});

// Product Routes: ------------------------------------------------------------------------------------
Route::middleware('auth')->controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/create', 'create')->name('products.create');
    Route::get('/products/{product}/edit', 'edit')->name('products.edit');
    Route::post('/products', 'store')->name('products.store');
    Route::put('/products/{product}', 'update')->name('products.update');
    Route::get('/products/{product}', 'show')->name('products.show');    
    Route::delete('/products/{product}', 'destroy')->name('products.destroy');
});
