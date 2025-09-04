<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = User::where('role', 'driver')->get();
        return view('admin.drivers.index', compact('drivers'));
    }
}
