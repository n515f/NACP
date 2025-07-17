<?php

use Illuminate\Http\Request;                          
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\VendorController;
use App\Http\Controllers\Api\ProductController;

// 🟢 المسارات العامة:
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/vendors',    [VendorController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);


// 🟡 مسارات المصادقة:
Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login',    [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('profile', [AuthController::class, 'profile']);
        Route::post('logout', [AuthController::class, 'logout']);
    });
});
