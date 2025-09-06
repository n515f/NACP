<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
class DashboardController extends Controller
{


public function index()
{
    return view('admin.dashboard', [
        'customerCount' => \App\Models\User::where('role', 'customer')->count(),
        'driverCount' => \App\Models\User::where('role', 'driver')->count(),
        'orderCount' => \App\Models\Order::count(),
        'pendingOrders' => \App\Models\Order::where('status', 'pending')->count(),
    ]);
}

}
