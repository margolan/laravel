<?php

use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;


Route::get('/s/import', function () {
  return view('import');
})->name('import');

Route::get('/s', [ExcelController::class, 'index'])->name('index');
Route::post('/s/import', [ExcelController::class, 'getData'])->name('getData');

Route::get('/s/confirm', [ExcelController::class, 'confirmData'])->name('confirmData');
