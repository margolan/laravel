<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use PharIo\Manifest\AuthorCollection;

Route::get('/', function () {
  return view('welcome');
})->name('welcome');

Route::get('login', function () {
  return view('login');
})->name('login');

Route::get('s/import', function () {
  return view('s_import');
})->name('s_import');

Route::get('k/import', function () {
  return view('k_import');
})->name('k_import');

Route::get('/s', [ExcelController::class, 's_index'])->name('s_index');

Route::get('/k', [ExcelController::class, 'k_index'])->name('k_index');

Route::post('s/import', [ExcelController::class, 's_import'])->name('s_import');

Route::post('k/import', [ExcelController::class, 'k_import'])->name('k_import');

Route::post('login', [AuthController::class, 'auth'])->name('login');




Route::get('/test', [ExcelController::class, 'getDataTest'])->name('test');
Route::post('/test', [ExcelController::class, 'getDataTest'])->name('test');
