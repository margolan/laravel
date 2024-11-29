<?php

use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;

Route::get('/s/import_schedule', function () {
  return view('import_schedule');
})->name('import_schedule');

Route::get('/s/import_key', function () {
  return view('import_key');
})->name('import_key');

Route::get('/s', function () {
  return view('index');
})->name('index');

Route::post('/s/import_schedule', [ExcelController::class, 'getSchedule'])->name('getSchedule');
Route::post('/s/import_key', [ExcelController::class, 'getKey'])->name('getKey');

// Route::post('/s/storeData', [ExcelController::class, 'storeData'])->name('storeData');
