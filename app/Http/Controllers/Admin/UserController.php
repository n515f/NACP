<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // عرض قائمة جميع المستخدمين
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    // عرض نموذج إضافة مستخدم جديد
    public function create()
    {
        return view('admin.users.create');
    }

    // حفظ المستخدم الجديد في قاعدة البيانات
  public function store(Request $request)
{
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email',
        'phone'    => 'required|string|max:20',
        'role'     => 'required|string',
        'password' => 'required|string|min:6|confirmed',
        'country'  => 'nullable|string|max:255',
        'address'  => 'nullable|string|max:255',
        'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $imageName = null;

    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/users'), $imageName);
    }

    User::create([
        'name'          => $request->name,
        'email'         => $request->email,
        'phone'         => $request->phone,
        'role'          => $request->role,
        'password'      => bcrypt($request->password),
        'country'       => $request->country,
        'address'       => $request->address,
        'profile_image' => $imageName,
    ]);

    return redirect()->route('admin.users.index')->with('success', 'تم إضافة المستخدم بنجاح');
}
    // عرض تفاصيل مستخدم
public function show(User $user)
{
    return view('admin.users.show', compact('user'));
}
// عرض نموذج التعديل
public function edit(User $user)
{
    return view('admin.users.edit', compact('user'));
}


public function update(Request $request, User $user)
{
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email,' . $user->id,
        'phone'    => 'required|string|max:20',
        'role'     => 'required|string',
        'password' => 'nullable|string|min:6|confirmed',
        'country'  => 'nullable|string|max:255',
        'address'  => 'nullable|string|max:255',
        'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/users'), $imageName);

        if ($user->profile_image && file_exists(public_path('images/users/' . $user->profile_image))) {
            unlink(public_path('images/users/' . $user->profile_image));
        }

        $user->profile_image = $imageName;
    }

    $user->name    = $request->name;
    $user->email   = $request->email;
    $user->phone   = $request->phone;
    $user->role    = $request->role;
    $user->country = $request->country;
    $user->address = $request->address;

    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return redirect()->route('admin.users.index')->with('success', 'تم تحديث بيانات المستخدم');
}



    // حذف المستخدم
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'تم حذف المستخدم بنجاح');
    }
}
