<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KanbanController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TripLogController;
use Illuminate\Auth\Middleware\Authenticate;

Route::match(['get', 'post'], '/', [IndexController::class, 'index'])->name('index');

Route::get('/logout', [AuthController::class, 'logout'])->name('auth_logout');

Route::get('/max', [TripLogController::class, 'index'])->name('triplog_index');
Route::post('/max', [TripLogController::class, 'edit'])->name('triplog_edit');
Route::get('/max/add', [TripLogController::class, 'add_show'])->name('triplog_add_show');
Route::post('/max/add', [TripLogController::class, 'add_process'])->name('triplog_add_process');


Route::middleware('auth')->group(function () {
  Route::get('/s/delete', [ExcelController::class, 's_delete'])->name('s_delete');
  Route::get('/k/delete', [ExcelController::class, 'k_delete'])->name('k_delete');
  Route::post('/admin/s_import', [ExcelController::class, 's_import'])->name('s_import');
  Route::post('/admin/k_import', [ExcelController::class, 'k_import'])->name('k_import');
});

/* Pincode */

Route::match(['get', 'post'], '/pincode', [AuthController::class, 'pincode'])->name('auth_pincode');
Route::match(['get', 'post'], '/pincode/reset', [AuthController::class, 'pincode_reset'])->name('auth_pincode_reset');

/* Admin */

Route::middleware('auth')->group(function () {
  Route::get('/admin', [AdminController::class, 'index'])->name('admin_index');
  Route::post('/admin/pincode/reset', [AdminController::class, 'admin_pincode_reset'])->name('admin_pincode_reset');
  Route::post('/admin/token/create', [AdminController::class, 'token_create'])->name('token_create');
  Route::get('/admin/token/delete', [AdminController::class, 'token_delete'])->name('token_delete');
  Route::post('/admin/user/edit', [AdminController::class, 'user_edit'])->name('user_edit');
});

/* Schedule */

Route::get('/s', [ExcelController::class, 's_index'])->name('s_index');
Route::get('/k', [ExcelController::class, 'k_index'])->name('k_index');

/* Auth */

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register_index'])->name('register_index');
Route::post('/register', [AuthController::class, 'register_proccess'])->name('register_proccess');


// Test mode

Route::match(['get', 'post'], '/password/request', [PasswordController::class, 'password_request'])->name('password.request');
Route::match(['get', 'post'], '/password/reset/', [PasswordController::class, 'password_reset'])->name('password.reset');


// Route::get('password/reset', [PasswordController::class, 'showResetForm'])->name('password.request');
// Route::post('password/email', [PasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::post('password/reset', [PasswordController::class, 'reset'])->name('password.update');

// Test mode

/* Kanban */

Route::get('/kanban', [KanbanController::class, 'kanban_index'])->name('kanban_index');

Route::middleware('auth')->group(function () {
  Route::get('/kanban/move', [KanbanController::class, 'kanban_move'])->name('kanban_move');
  Route::get('/kanban/remove', [KanbanController::class, 'kanban_remove'])->name('kanban_remove');
  Route::post('/kanban/add', [KanbanController::class, 'kanban_add'])->name('kanban_add');
  Route::post('/kanban/edit', [KanbanController::class, 'kanban_edit'])->name('kanban_edit');
});

/* Test */

Route::match(['get', 'post'], '/test', [TestController::class, 'test'])->name('test');
