<?php

use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ExcelController::class, 'index'])->name('index');
Route::get('/s', [ExcelController::class, 'import'])->name('import');
Route::post('/s', [ExcelController::class, 'getData'])->name('getData');
// Route::post('/s/storeData', [ExcelController::class, 'storeData'])->name('storeData');
