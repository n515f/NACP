<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController; // ✅ أضف هذا السطر


// شاشة البداية
Route::get('/', function () {
    return view('auth.splash');
});

/* صفحة تسجيل الدخول (ستبنيها بعد قليل)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
*/
Route::prefix('admin')->group(function () {

    // لوحة التحكم
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // ===============================
    // ✅ العملاء (CRUD الكامل)
    // ===============================
    Route::get('customers', [CustomerController::class, 'index'])->name('admin.customers.index');
    Route::get('customers/create', [CustomerController::class, 'create'])->name('admin.customers.create');
    Route::post('customers', [CustomerController::class, 'store'])->name('admin.customers.store');
    Route::get('customers/{id}', [CustomerController::class, 'show'])->name('admin.customers.show');
    Route::get('customers/{id}/edit', [CustomerController::class, 'edit'])->name('admin.customers.edit');
    Route::put('customers/{id}', [CustomerController::class, 'update'])->name('admin.customers.update');
    Route::delete('customers/{id}', [CustomerController::class, 'destroy'])->name('admin.customers.destroy');

    // ✅ السائقين
    Route::get('drivers', [DriverController::class, 'index'])->name('admin.drivers.index');

    // ✅ الطلبات
    Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');

    // ===============================
    // ✅ المستخدمين (Users CRUD)
    // ===============================
    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::get('users/{user}', [UserController::class, 'show'])->name('admin.users.show');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');


});
