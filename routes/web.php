<?php

use App\Http\Controllers\StockInPrintController;
use App\Http\Controllers\StockOutPrintController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/stock-ins/{stockIn}/print', StockInPrintController::class)
        ->name('stock-ins.print');
    Route::get('/stock-outs/{stockOut}/print', StockOutPrintController::class)
        ->name('stock-outs.print');
});
