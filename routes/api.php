<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Customer\AuthController as CustomerAuth;
use App\Http\Controllers\Api\Customer\OrderController as CustomerOrder;
use App\Http\Controllers\Api\Driver\AuthController as DriverAuth;
use App\Http\Controllers\Api\Driver\DeliveryController as DriverDelivery;

use App\Http\Controllers\Api\Shared\AuthController as SharedAuth;
use App\Http\Controllers\Api\Shared\CategoryController;
use App\Http\Controllers\Api\Shared\ProductController;
use App\Http\Controllers\Api\Shared\VendorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| تستخدم هذه الواجهة لمسارات API الخاصة بالتطبيق
*/

// ✅ تسجيل الدخول والتسجيل للمستخدمين (بدون حماية)
Route::prefix('customer')->group(function () {
    Route::post('register', [CustomerAuth::class, 'register']);
    Route::post('login', [CustomerAuth::class, 'login']);
});

Route::prefix('driver')->group(function () {
    Route::post('register', [DriverAuth::class, 'register']); // إذا موجودة
    Route::post('login', [DriverAuth::class, 'login']);
});

Route::prefix('shared')->group(function () {
    Route::post('login', [SharedAuth::class, 'login']); // إذا عندك تسجيل دخول مشترك
});

// ✅ مسارات محمية بالتوكن - تحتاج Bearer Token من Sanctum
Route::middleware('auth:sanctum')->group(function () {

    // ✅ عميل (Customer)
    Route::prefix('customer')->group(function () {
        Route::get('orders', [CustomerOrder::class, 'index']);
        Route::post('orders', [CustomerOrder::class, 'store']);
        // أضف ما يلزم
    });

    // ✅ سائق (Driver)
    Route::prefix('driver')->group(function () {
        Route::get('deliveries', [DriverDelivery::class, 'index']);
        Route::post('deliveries/complete', [DriverDelivery::class, 'complete']);
        // أضف ما يلزم
    });

    // ✅ مشترك (Shared) – مثل التصنيفات والمنتجات
    Route::prefix('shared')->group(function () {
        Route::get('categories', [CategoryController::class, 'index']);
        Route::get('products', [ProductController::class, 'index']);
        Route::get('vendors', [VendorController::class, 'index']);
    });

    // ✅ تسجيل خروج عام
    Route::post('logout', function (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'تم تسجيل الخروج بنجاح']);
    });
});
