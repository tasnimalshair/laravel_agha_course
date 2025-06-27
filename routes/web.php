<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BrandContoller;
use App\Http\Controllers\Product\ProductContoller;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TsetController;
use App\Http\Middleware\AuthUser;
use App\Http\Middleware\CheckLang;
use Illuminate\Support\Facades\Route;

Route::get('home', function () {
    return view('welcome');
});

// Route::get('stores/index', [StoreController::class, 'index']);
// Route::get('products/index', [ProductContoller::class, 'index']);
// Route::get('brands/index', [BrandContoller::class, 'index']);

Route::resource('stores', StoreController::class)->middleware(CheckLang::class);
Route::resource('products', ProductContoller::class)->middleware(AuthUser::class);
Route::resource('brands', BrandContoller::class);


Route::get('test', [TsetController::class, 'index']);

###########

Route::get('login', [LoginController::class, 'loginForm']);
Route::post('login', [LoginController::class, 'authenticate'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
