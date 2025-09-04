<?php
namespace App\Http\Controllers\Api\Customer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|confirmed',
            'phone'    => 'required',
            'country'  => 'required',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'country'  => $request->country,
            'role'     => 'customer',
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['user' => $user, 'message' => 'تم التسجيل بنجاح'], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->where('role', 'customer')->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'بيانات الدخول غير صحيحة'], 401);
        }

        $token = $user->createToken('CustomerToken')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user]);
    }
}
