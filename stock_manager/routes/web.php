<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\{
    BrandController,
    CategoryController,
    EcoScoreController,
    FamilyController,
    InvoiceController,
    IvaCategoryController,
    LocationController,
    NutriScoreController,
    OrderController,
    RepresentativeController,
    SoldProductController,
    StatusController,
    StockController,
    StockMovementController,
    SubcategoryController,
    SupplierController,
    UnitTypeController,
    WasteLogController
};

// Landing page
Route::get('/', fn() => view('auth.login'));

// -----------------------------------------------------------------------------------------------------------
// Authentication Routes: ------------------------------------------------------------------------------------
// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Guest-only routes -----------------------------------------------------------------------------------------
Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register');
});

// Full CRUD for Users ---------------------------------------------------------------------------------------
Route::middleware('auth')->resource('users', UserController::class);

// Full CRUD for all other controllers -----------------------------------------------------------------------
$crudControllers = [
    //
    'brands' => BrandController::class,
    'categories' => CategoryController::class,
    'subcategories' => SubcategoryController::class,
    'families' => FamilyController::class,
    'unit-types' => UnitTypeController::class,
    'iva-categories' => IvaCategoryController::class,
    'nutri-scores' => NutriScoreController::class,
    'eco-scores' => EcoScoreController::class,
    //
    'products' => ProductController::class,
    //
    'suppliers' => SupplierController::class,
    'representatives' => RepresentativeController::class,
    //
    'locations' => LocationController::class,
    'status' => StatusController::class,
    //
    'invoices' => InvoiceController::class,
    'orders' => OrderController::class,
    'sold-products' => SoldProductController::class,
    'waste-logs' => WasteLogController::class,
    //
    'stocks' => StockController::class,
    'stock-movements' => StockMovementController::class,
];

foreach ($crudControllers as $uri => $controller) {
    Route::middleware('auth')->resource($uri, $controller);
}
