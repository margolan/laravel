<?php

use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function () {
  return view('welcome');
})->name('welcome');

Route::get('/import', function () {
  return view('import');
})->name('import');

Route::get('/s', [ExcelController::class, 's_index'])->name('s');

Route::get('/k', [ExcelController::class, 'k_index'])->name('k');

Route::post('/import', [ExcelController::class, 'getData'])->name('getData');

// Route::get('/confirm', [ExcelController::class, 'confirmData'])->name('confirmData');

Route::get('/test', [ExcelController::class, 'getDataTest'])->name('test');
Route::post('/test', [ExcelController::class, 'getDataTest'])->name('test');
