<?php

    use App\Http\Controllers\ManufacturerController;
    use Illuminate\Support\Facades\Route;

Route::get('/test', function (){
    return view('layout.master');
});

Route::group(['prefix' => 'manufacturer', 'as' => 'manufacturers.'], function() {
    Route::get('/', [ManufacturerController::class, 'index'])->name('index');
    Route::get('/create', [ManufacturerController::class, 'create'])->name('create');
    Route::post('/store', [ManufacturerController::class, 'store'])->name('store');
    Route::get('/edit/{manufacturer}', [ManufacturerController::class, 'edit'])->name('edit');
    Route::delete('/{manufacturer}', [ManufacturerController::class, 'destroy'])->name('destroy');
    Route::put('/update/{manufacturer}', [ManufacturerController::class, 'update'])->name('update');
});
