<?php

use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('index');
});

Route::get('/s', [ExcelController::class, 'show'])->name('show');
Route::post('/s', [ExcelController::class, 'getData'])->name('import');
