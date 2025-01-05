<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\IndexController;
use Illuminate\Auth\Middleware\Authenticate;

Route::middleware('auth')->group(function () {

  // Route::post('/s_import', [ExcelController::class, 's_import'])->name('s_import');  // action

  // Route::post('/k_import', [ExcelController::class, 'k_import'])->name('k_import');  // action

  Route::get('/s/delete', [ExcelController::class, 's_delete'])->name('s_delete'); // action

  Route::get('/k/delete', [ExcelController::class, 'k_delete'])->name('k_delete'); // action

  // ========================= Authorization =========================

  Route::get('/admin', [AuthController::class, 'admin'])->name('auth_admin');

  Route::post('/admin/s_import', [ExcelController::class, 's_import'])->name('s_import'); // action

  Route::post('/admin/k_import', [ExcelController::class, 'k_import'])->name('k_import');  // action

  Route::get('/logout', [AuthController::class, 'logout'])->name('auth_logout'); // action

});


// ========================= Main =========================


Route::match(['get', 'post'], '/', [IndexController::class, 'index'])->name('index');

Route::get('/s', [ExcelController::class, 's_index'])->name('s_index');

Route::get('/k', [ExcelController::class, 'k_index'])->name('k_index');

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');

Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('register');

// ========================= Test =========================

Route::match(['get', 'post'], '/test', [ExcelController::class, 'getDataTest'])->name('test');
