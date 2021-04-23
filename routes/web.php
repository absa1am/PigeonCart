<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\OrderController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'allProducts'])->name('all.products');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('show.product');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/add-cart/{product_id}', [CartController::class, 'addToCart'])->name('add.cart');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/order', [OrderController::class, 'store'])->name('order');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/view-users', [UserController::class, 'index'])->name('view.users');
    Route::get('/admin/create-user', [UserController::class, 'create'])->name('create.user');
    Route::post('/admin/store-user', [UserController::class, 'store'])->name('store.user');

    Route::get('/admin/view-categories', [CategoryController::class, 'index'])->name('view.categories');
    Route::get('/admin/create-category', [CategoryController::class, 'create'])->name('create.category');
    Route::post('/admin/store-category', [CategoryController::class, 'store'])->name('store.category');
    Route::get('/admin/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::post('/admin/update-category/{id}', [CategoryController::class, 'update'])->name('update.category');
    Route::get('/admin/delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete.category');

    Route::get('/admin/view-products', [ProductController::class, 'index'])->name('view.products');
    Route::get('/admin/create-product', [ProductController::class, 'create'])->name('create.product');
    Route::post('/admin/store-product', [ProductController::class, 'store'])->name('store.product');
    Route::get('/admin/edit-product/{id}', [ProductController::class, 'edit'])->name('edit.product');
    Route::post('/admin/update-product/{id}', [ProductController::class, 'update'])->name('update.product');
    Route::get('/admin/delete-product/{id}', [ProductController::class, 'destroy'])->name('delete.product');

    Route::get('/admin/view-orders', [OrderController::class, 'index'])->name('view.orders');
    Route::get('/admin/edit-order/{id}', [OrderController::class, 'edit'])->name('edit.order');
    Route::post('/admin/update-order/{id}', [OrderController::class, 'update'])->name('update.order');
    Route::get('/admin/delete-order/{id}', [OrderController::class, 'destroy'])->name('delete.order');
});

require __DIR__.'/auth.php';
