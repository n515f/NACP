<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\OrderController;

// ============================
// ✅ صفحة تسجيل الدخول (إن وجدت)
// ============================
// Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
// Route::post('admin/login', [AdminLoginController::class, 'login']);

// ============================
// ✅ لوحة التحكم - تتطلب تسجيل الدخول كمشرف
// ============================
Route::prefix('admin')->middleware(['web'])->group(function () {

    // الصفحة الرئيسية للوحة التحكم
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // إدارة المستخدمين (العملاء)
    Route::get('customers', [CustomerController::class, 'index'])->name('admin.customers.index');

    // إدارة السائقين
    Route::get('drivers', [DriverController::class, 'index'])->name('admin.drivers.index');

    // إدارة الطلبات
    Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');

    // يمكنك إضافة المزيد لاحقًا مثل الإعدادات أو الإحصائيات
});
