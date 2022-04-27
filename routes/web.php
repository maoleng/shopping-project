<?php

    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\CustomerController;
    use App\Http\Controllers\DashboardCustomer;
    use App\Http\Controllers\ManufacturerController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\SubtypeController;
    use App\Http\Controllers\TypeController;
    use App\Http\Middleware\CheckAdminLoginMiddleware;
    use App\Http\Middleware\CheckSuperAdminLoginMiddleware;
    use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardCustomer::class, 'index']);

Route::get('admin/login', [AuthController::class, 'login'])->name('admins.login');
Route::post('admin/login', [AuthController::class, 'processLogin'])->name('admins.process_login');

Route::group([
    'middleware' => CheckAdminLoginMiddleware::class
], function() {

    Route::group(['prefix' => 'admin'], function () {

        Route::group(['prefix' => 'manufacturer', 'as' => 'manufacturers.'], function() {
            Route::get('/', [ManufacturerController::class, 'index'])->name('index');
            Route::get('/create', [ManufacturerController::class, 'create'])->name('create');
            Route::post('/store', [ManufacturerController::class, 'store'])->name('store');
            Route::get('/edit/{manufacturer}', [ManufacturerController::class, 'edit'])->name('edit');
            Route::delete('/{manufacturer}', [ManufacturerController::class, 'destroy'])->name('destroy');
            Route::put('/update/{manufacturer}', [ManufacturerController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'product', 'as' => 'products.'], function() {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/store', [ProductController::class, 'store'])->name('store');
            Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
            Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
            Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'type', 'as' => 'types.'], function() {
            Route::get('/', [TypeController::class, 'index'])->name('index');
            Route::get('/create', [TypeController::class, 'create'])->name('create');
            Route::post('/store', [TypeController::class, 'store'])->name('store');
            Route::get('/edit/{type}', [TypeController::class, 'edit'])->name('edit');
            Route::delete('/{type}', [TypeController::class, 'destroy'])->name('destroy');
            Route::put('/update/{type}', [TypeController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'subtype', 'as' => 'subtypes.'], function() {
            Route::get('/{type}', [SubtypeController::class, 'index'])->name('index');
            Route::get('/create/{type}', [SubtypeController::class, 'create'])->name('create');
            Route::post('/store/{type}', [SubtypeController::class, 'store'])->name('store');
            Route::get('/edit/{subtype}', [SubtypeController::class, 'edit'])->name('edit');
            Route::delete('/{subtype}', [SubtypeController::class, 'destroy'])->name('destroy');
            Route::put('/update/{subtype}', [SubtypeController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'customer', 'as' => 'customers.'], function() {
            Route::get('/', [CustomerController::class, 'index'])->name('index');
//        Route::get('/create', [CustomerController::class, 'create'])->name('create');
//        Route::post('/store/', [CustomerController::class, 'store'])->name('store');
//        Route::get('/edit/{customer}', [CustomerController::class, 'edit'])->name('edit');
            Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('destroy');
//        Route::put('/update/{customer}', [CustomerController::class, 'update'])->name('update');
        });

        Route::group([
            'middleware' => CheckSuperAdminLoginMiddleware::class
        ], function() {
            Route::group(['prefix' => 'admin', 'as' => 'admins.'], function() {
                Route::get('/', [AdminController::class, 'index'])->name('index');
                Route::get('/create', [AdminController::class, 'create'])->name('create');
                Route::post('/store', [AdminController::class, 'store'])->name('store');
                Route::get('/edit/{admin}', [AdminController::class, 'edit'])->name('edit');
                Route::delete('/{admin}', [AdminController::class, 'destroy'])->name('destroy');
                Route::put('/update/{admin}', [AdminController::class, 'update'])->name('update');
                Route::put('/lock/{admin}', [AdminController::class, 'lock'])->name('lock');
                Route::put('/unlock/{admin}', [AdminController::class, 'unlock'])->name('unlock');
            });
        });


    });

});
