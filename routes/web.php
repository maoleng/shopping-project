<?php

    use App\Http\Controllers\ManufacturerController;
    use App\Http\Controllers\ProductController;
    use Illuminate\Support\Facades\Route;

Route::get('/', )


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

});
