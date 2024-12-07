<?php

use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return view('welcome');
})->name('welcome');

Route::get('/s/import', function () {
  return view('import');
})->name('import');

Route::get('/s', [ExcelController::class, 'index'])->name('index');

Route::post('/s/import', [ExcelController::class, 'getData'])->name('getData');
// Route::post('/s/import', [ExcelController::class, 'getDataLol'])->name('getDataLol');

Route::get('/s/confirm', [ExcelController::class, 'confirmData'])->name('confirmData');
