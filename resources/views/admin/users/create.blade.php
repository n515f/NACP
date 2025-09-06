@extends('admin.layouts.admin')

@section('content')
<div class="container mt-4">
    <h4 class="text-primary mb-3">إضافة مستخدم جديد</h4>

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

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>الاسم الكامل</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="form-group mb-3">
            <label>البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>
        
        <div class="form-group mb-3">
    <label>الدوله</label>
    <input type="text" name="country" class="form-control" value="{{ old('country') }}">
</div>

        <div class="form-group mb-3">
    <label>العنوان</label>
    <input type="text" name="address" class="form-control" value="{{ old('address') }}">
</div>


        <div class="form-group mb-3">
            <label>رقم الهاتف</label>
            <input type="text" name="phone" class="form-control" required value="{{ old('phone') }}">
        </div>

        <div class="form-group mb-3">
            <label>كلمة المرور</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group mb-3">
    <label>تأكيد كلمة المرور</label>
    <input type="password" name="password_confirmation" class="form-control" required>
</div>


        <div class="form-group mb-3">
            <label>الدور</label>
            <select name="role" class="form-control" required>
                <option value="admin">مدير</option>
                <option value="staff">موظف</option>
            </select>
        </div>
  
    <div class="form-group mb-3">
        <label>الصورة الشخصية</label>
        <input type="file" name="profile_image" class="form-control">
    </div>


        <button type="submit" class="btn btn-success">حفظ</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>
@endsection
