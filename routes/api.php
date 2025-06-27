<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Store\StoreController;
use App\Http\Middleware\ApiAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('stores', StoreController::class)->middleware(ApiAuth::class);
Route::post('login', [LoginController::class, 'authenticate']);
