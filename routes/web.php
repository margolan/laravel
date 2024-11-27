<?php

use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ExcelController::class, 'show'])->name('show');

Route::get('/s', function () {
  return view('schedule');
})->name('show');

Route::post('/s', [ExcelController::class, 'getData'])->name('getData');
// Route::post('/s/storeData', [ExcelController::class, 'storeData'])->name('storeData');
