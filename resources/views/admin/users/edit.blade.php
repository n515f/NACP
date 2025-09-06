@extends('admin.layouts.admin')

@section('content')
<div class="container mt-4">
    <h4 class="text-primary mb-3">تعديل بيانات المستخدم</h4>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>يوجد أخطاء:</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>الاسم الكامل</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $user->name) }}">
        </div>

        <div class="form-group mb-3">
            <label>البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email', $user->email) }}">
        </div>

        
        <div class="form-group mb-3">
    <label>الدوله</label>
    <input type="text" name="country" class="form-control" value="{{ old('country', $user->country) }}">
</div>

        <div class="form-group mb-3">
    <label>العنوان</label>
    <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}">
</div>
        <div class="form-group mb-3">
            <label>رقم الهاتف</label>
            <input type="text" name="phone" class="form-control" required value="{{ old('phone', $user->phone) }}">
        </div>

        <!--div class="form-group mb-3">
            <label>كلمة المرور (اختياري)</label>
            <input type="password" name="password" class="form-control">
            <small class="text-muted">اترك الحقل فارغًا إن لم ترغب بتغيير كلمة المرور.</small>
        </div-->

        <div class="form-group mb-3">
            <label>الدور</label>
            <select name="role" class="form-control" required>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>مدير</option>
                <option value="staff" {{ $user->role === 'staff' ? 'selected' : '' }}>موظف</option>
            </select>
        </div>
      
    <div class="form-group mb-3">
        <label>الصورة الحالية:</label><br>
        <img src="{{ asset('images/users/' . ($user->profile_image ?: 'default.png')) }}" width="100" class="rounded mb-2">
        <input type="file" name="profile_image" class="form-control mt-2">
    </div>
   


        <button type="submit" class="btn btn-success">تحديث</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>
@endsection
