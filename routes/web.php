<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExcelController;
use App\Http\Middleware\AuthWithMessage;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
  return view('welcome');
})->name('welcome');


Route::middleware(AuthWithMessage::class)->group(function () {

  // Route::post('/s_import', [ExcelController::class, 's_import'])->name('s_import');  // action

  // Route::post('/k_import', [ExcelController::class, 'k_import'])->name('k_import');  // action

  Route::get('/s/delete', [ExcelController::class, 's_delete'])->name('s_delete'); // action

  Route::get('/k/delete', [ExcelController::class, 'k_delete'])->name('k_delete'); // action

  // ========================= Authorization =========================

  Route::get('/admin', [AuthController::class, 'admin'])->name('auth_admin');

  Route::post('/admin/s_import', [ExcelController::class, 's_import'])->name('s_import'); // action

  Route::post('/admin/k_import', [ExcelController::class, 'k_import'])->name('k_import');  // action

  Route::get('/logout', [AuthController::class, 'logout'])->name('auth_logout'); // action

  // ========================= Test =========================

  Route::get('/test', [ExcelController::class, 'getDataTest'])->name('test_index');

  Route::post('/test', [ExcelController::class, 'getDataTest'])->name('test');
});


Route::get('/s', [ExcelController::class, 's_index'])->name('s_index');

Route::get('/k', [ExcelController::class, 'k_index'])->name('k_index');


// ========================= Authorization =========================


Route::post('login', [AuthController::class, 'login'])->name('auth_login');  // action

Route::post('/register', [AuthController::class, 'register'])->name('auth_register');  // action

Route::get('/auth', [AuthController::class, 'auth'])->name('auth_index');
