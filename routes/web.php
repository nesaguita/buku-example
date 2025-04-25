<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

Route::controller(BukuController::class)->group(function () {
    Route::get('/', 'index')->name('dashboard');
    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/destroy', 'destroy')->name('destroy');
    Route::get('/export', 'export')->name('export');
});
