<?php

use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return view('welcome');
})->name('welcome');

Route::get('/s/import', function () {
  return view('import');
})->name('import');

Route::get('/s', [ExcelController::class, 's_index'])->name('s');

Route::get('/k', [ExcelController::class, 'k_index'])->name('k');

Route::post('/import', [ExcelController::class, 'getData'])->name('getData');

Route::get('/s/confirm', [ExcelController::class, 'confirmData'])->name('confirmData');

// Route::post('/s/import', [ExcelController::class, 'getDataTest'])->name('getDataTest');