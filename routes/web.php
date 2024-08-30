<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\ShopController;
use App\Http\Controllers\Customer\BlogController;
use App\Http\Controllers\Customer\GalleryController;
use App\Http\Controllers\Customer\QuestionController;
use App\Http\Controllers\Customer\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\CategoryController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Shop
Route::resource('shop', ShopController::class);

// Cart 
Route::resource('cart', CartController::class)->middleware('auth');
Route::resource('/orders', OrderController::class)->names('orders')->middleware('auth');

// Blog
Route::resource('blog-page', BlogController::class);
Route::resource('abm-blog', BlogController::class)->middleware('auth');

// Gallery
Route::resource('gallery-page', GalleryController::class);

// FAQ
Route::resource('faq', QuestionController::class);

// Login and Register
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register.show');
Route::post('/register', [UserController::class, 'register'])->name('register.store');

Route::get('/log', [UserController::class, 'showLoginForm'])->name('login.show');
Route::post('/log', [UserController::class, 'login'])->name('login.store');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Admin
Route::resource('/admin', ProductController::class)->names('admin')->middleware('auth');
Route::resource('categories', CategoryController::class);
Route::resource('/products', ProductController::class)->names('products')->middleware('auth');
Route::get('/user/purchases', [OrderController::class, 'userPurchases'])->name('user.purchases');  

// Profile
Route::get('/profile', [UserController::class, 'showProfile'])->middleware('auth')->name('profile.show');
Route::patch('/profile/update', [UserController::class, 'updateProfile'])->middleware('auth')->name('profile.update');
Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');;
