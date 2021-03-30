<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role'])->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/view-users', [UserController::class, 'index'])->name('view.users');
    Route::get('/admin/create-user', [UserController::class, 'create'])->name('create.user');
    Route::post('/admin/store-user', [UserController::class, 'store'])->name('store.user');

    Route::get('/admin/view-categories', [CategoryController::class, 'index'])->name('view.categories');
    Route::get('/admin/create-category', [CategoryController::class, 'create'])->name('create.category');
    Route::post('/admin/store-category', [CategoryController::class, 'store'])->name('store.category');
});

require __DIR__.'/auth.php';
