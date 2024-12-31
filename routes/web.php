<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('s/import', function () {
  return view('s_import');
})->name('s_import');

Route::get('k/import', function () {
  return view('k_import');
})->name('k_import');

Route::get('s', [ExcelController::class, 's_index'])->name('s_index');

Route::get('k', [ExcelController::class, 'k_index'])->name('k_index');

Route::post('s/import', [ExcelController::class, 's_import'])->name('s_import');

Route::post('k/import', [ExcelController::class, 'k_import'])->name('k_import');

Route::get('s/delete', [ExcelController::class, 's_delete'])->name('s_delete');

// ========================= Authorization =========================

Route::get('/', function () {
  return view('login');
})->name('login');

Route::post('/', [AuthController::class, 'auth'])->name('login');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [AuthController::class, 'register'])->name('register');

// ========================= Test =========================

Route::get('/test', [ExcelController::class, 'getDataTest'])->middleware('auth')->name('test');
Route::post('/test', [ExcelController::class, 'getDataTest'])->middleware('auth')->name('test');
