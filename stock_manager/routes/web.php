<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    UserController,
    ProductController,
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
    StockOverviewController,
    SubcategoryController,
    SupplierController,
    UnitTypeController,
    WasteLogController
};

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => view('auth.login'));


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register');
});


/*
|--------------------------------------------------------------------------
| Users (Full CRUD)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->resource('users', UserController::class);


/*
|--------------------------------------------------------------------------
| Generic CRUD Controllers
|--------------------------------------------------------------------------
*/

$crudControllers = [
    // Reference Data
    'brands'          => BrandController::class,
    'categories'      => CategoryController::class,
    'subcategories'   => SubcategoryController::class,
    'families'        => FamilyController::class,
    'unit-types'      => UnitTypeController::class,
    'iva-categories'  => IvaCategoryController::class,
    'nutri-scores'    => NutriScoreController::class,
    'eco-scores'      => EcoScoreController::class,

    // Products
    'products'        => ProductController::class,

    // Suppliers & Representatives
    'suppliers'       => SupplierController::class,
    'representatives' => RepresentativeController::class,

    // Locations & Status
    'locations'       => LocationController::class,
    'status'          => StatusController::class,

    // Orders, Invoices, Sales, Waste
    'invoices'        => InvoiceController::class,
    'orders'          => OrderController::class,
    'sold-products'   => SoldProductController::class,
    'waste-logs'      => WasteLogController::class,

    // Stock
    'stocks'          => StockController::class,
    'stock-movements' => StockMovementController::class,
    'overview'        => StockOverviewController::class,
];

Route::middleware('auth')->group(function () use ($crudControllers) {
    foreach ($crudControllers as $uri => $controller) {
        Route::resource($uri, $controller);
    }
});


/*
|--------------------------------------------------------------------------
| Order Workflow (Custom Actions)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Submit / Receive / Cancel
    Route::post('orders/{order}/submit',  [OrderController::class, 'submit'])->name('orders.submit');
    Route::post('orders/{order}/receive', [OrderController::class, 'receive'])->name('orders.receive');
    Route::post('orders/{order}/cancel',  [OrderController::class, 'cancel'])->name('orders.cancel');

    // Receive Form
    Route::get('orders/{order}/receive', [OrderController::class, 'receiveForm'])
        ->name('orders.receive.form');

    // Arrival Check
    Route::get('orders/{order}/arrival-check',  [OrderController::class, 'arrivalCheckForm'])
        ->name('orders.arrival-check.form');
    Route::post('orders/{order}/arrival-check', [OrderController::class, 'arrivalCheck'])
        ->name('orders.arrival-check');

    // Order Check
    Route::get('orders/{order}/order-check',  [OrderController::class, 'orderCheckForm'])
        ->name('orders.order-check.form');
    Route::post('orders/{order}/order-check', [OrderController::class, 'orderCheck'])
        ->name('orders.order-check');

    // Close Order
    Route::post('orders/{order}/close', [OrderController::class, 'close'])
        ->name('orders.close');
});
