<?php

    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\DashboardCustomer;
    use App\Http\Controllers\ManufacturerController;
    use App\Http\Controllers\OrderController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\ReceiptController;
    use App\Http\Controllers\SubtypeController;
    use App\Http\Controllers\TypeController;
    use App\Http\Middleware\CheckAdminLoginMiddleware;
    use App\Http\Middleware\CheckSuperAdminLoginMiddleware;
    use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardCustomer::class, 'index'])->name('index');
Route::get('/type/{type}', [DashboardCustomer::class, 'indexWhereType'])->name('type');
Route::get('/subtype/{subtype?}', [DashboardCustomer::class, 'indexWhereSubtype'])->name('subtype');
Route::get('product/{product}', [DashboardCustomer::class, 'detailProduct'])->name('detail_product');

Route::group(['prefix' => 'cart', 'as' => 'carts.'], function() {
    Route::get('', [OrderController::class, 'index'])->name('index');
    Route::post('/add/{product}', [OrderController::class, 'addToCart'])->name('add_to_cart');
    Route::post('/modify_quantity/{type}/{id}', [OrderController::class, 'modifyQuantity'])->name('modify_quantity');
    Route::delete('/delete/{id}', [OrderController::class, 'destroy'])->name('destroy');
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/order', [OrderController::class, 'order'])->name('order');
});


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

        Route::group(['prefix' => 'receipt', 'as' => 'receipts.'], function() {
            Route::get('/{status?}', [ReceiptController::class, 'index'])->name('index');
            Route::get('/detail/{receipt}', [ReceiptController::class, 'show'])->name('show');
            Route::put('/update/{receipt}/{status}', [ReceiptController::class, 'update'])->name('update');

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
