<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\InvoiceController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'allProducts'])->name('all.products');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('show.product');
Route::get('/products/category/{id}', [CategoryController::class, 'category'])->name('category.products');
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/store-contact', [ContactController::class, 'store'])->name('store-contact');
Route::get('/view-contacts', [ContactController::class, 'index'])->name('view-contacts');
Route::get('/view-contact/{id}', [ContactController::class, 'show'])->name('view-contact');
Route::get('/delete-contact/{id}', [ContactController::class, 'destroy'])->name('delete-contact');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

    Route::get('/settings/profile', [ProfileController::class, 'index'])->name('settings.profile');
    Route::post('/update-settings/{id}', [ProfileController::class, 'update'])->name('update-settings');

    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/add-cart/{product_id}', [CartController::class, 'addToCart'])->name('add.cart');
    Route::get('/edit-cart/{product_id}', [CartController::class, 'edit'])->name('edit.cart');
    Route::post('/update-cart/{product_id}', [CartController::class, 'update'])->name('update.cart');
    Route::get('/delete-cart/{product_id}', [CartController::class, 'destroy'])->name('delete.cart');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

    Route::post('/order', [OrderController::class, 'store'])->name('order');
    Route::get('/order-history', [OrderController::class, 'history'])->name('history');
    Route::get('/view-order/{id}', [OrderController::class, 'show'])->name('view.order');
    Route::get('/cancel-order/{id}', [OrderController::class, 'cancel'])->name('cancel.order');
    Route::get('/reorder/{id}', [OrderController::class, 'reorder'])->name('reorder.order');

    Route::post('/update-address/{id}', [UserController::class, 'updateAddress'])->name('update.address');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/view-users', [UserController::class, 'index'])->name('view.users');
    Route::get('/admin/create-user', [UserController::class, 'create'])->name('create.user');
    Route::post('/admin/store-user', [UserController::class, 'store'])->name('store.user');
    Route::get('/admin/delete-user/{id}', [UserController::class, 'destroy'])->name('delete.user');

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

    Route::get('/admin/view-invoice/{id}', [InvoiceController::class, 'show'])->name('view.invoice');
});

require __DIR__.'/auth.php';
