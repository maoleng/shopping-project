<?php

    use App\Http\Controllers\DashboardCustomer;
    use App\Http\Controllers\ManufacturerController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\SubtypeController;
    use App\Http\Controllers\TypeController;
    use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardCustomer::class, 'index']);


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
        Route::get('/create/{type}', [SubtypeController::class, 'create'])->name('create');
        Route::get('/{type}', [SubtypeController::class, 'index'])->name('index');
        Route::post('/store/{type}', [SubtypeController::class, 'store'])->name('store');
        Route::get('/edit/{subtype}', [SubtypeController::class, 'edit'])->name('edit');
        Route::delete('/{subtype}', [SubtypeController::class, 'destroy'])->name('destroy');
        Route::put('/update/{subtype}', [SubtypeController::class, 'update'])->name('update');
    });
});
