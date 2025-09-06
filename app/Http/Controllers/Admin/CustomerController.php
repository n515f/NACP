<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    // عرض كل العملاء
    public function index()
    {
        $customers = User::where('role', 'customer')->latest()->get();
        return view('admin.customers.index', compact('customers'));
    }

    // نموذج إضافة
    public function create()
    {
        return view('admin.customers.create');
    }

    // حفظ عميل جديد
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone'    => 'required',
            'address'  => 'required',
            'country'  => 'required',
            'profile_image' => 'nullable|image|max:2048', // 2MB
        ]);

        $imageName = 'default.png';

        if ($request->hasFile('profile_image')) {
            $imageName = time() . '_' . Str::random(8) . '.' . $request->file('profile_image')->getClientOriginalExtension();
            $request->file('profile_image')->move(public_path('images/users'), $imageName);
        }

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'phone'    => $request->phone,
            'address'  => $request->address,
            'country'  => $request->country,
            'role'     => 'customer',
            'profile_image' => $imageName,
        ]);

        return redirect()->route('admin.customers.index')->with('success', 'تمت إضافة العميل بنجاح');
    }

    // نموذج التعديل
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.customers.edit', compact('user'));
    }

    // تحديث العميل
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'phone'    => 'required',
            'address'  => 'required',
            'country'  => 'required',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'address', 'country']);

        // إذا تم رفع صورة جديدة
        if ($request->hasFile('profile_image')) {
            $oldImagePath = public_path('images/users/' . $user->profile_image);
            if ($user->profile_image && $user->profile_image != 'default.png' && File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            $imageName = time() . '_' . Str::random(8) . '.' . $request->file('profile_image')->getClientOriginalExtension();
            $request->file('profile_image')->move(public_path('images/users'), $imageName);
            $data['profile_image'] = $imageName;
        }

        $user->update($data);

        return redirect()->route('admin.customers.index')->with('success', 'تم تحديث بيانات العميل');
    }

    // حذف عميل
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $imagePath = public_path('images/users/' . $user->profile_image);
        if ($user->profile_image && $user->profile_image != 'default.png' && File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $user->delete();

        return redirect()->route('admin.customers.index')->with('success', 'تم حذف العميل');
    }

    // عرض تفاصيل عميل
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.customers.show', compact('user'));
    }
}
