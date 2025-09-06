@extends('admin.layouts.admin')

@section('title', 'إضافة عميل جديد')

@section('content')
<div class="container mt-4">
    <h4>إضافة عميل جديد</h4>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.customers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>الاسم</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label>البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label>كلمة المرور</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>رقم الهاتف</label>
            <input type="text" name="phone" class="form-control" required value="{{ old('phone') }}">
        </div>

        <div class="mb-3">
            <label>العنوان</label>
            <input type="text" name="address" class="form-control" required value="{{ old('address') }}">
        </div>

        <div class="mb-3">
            <label>الدولة</label>
            <input type="text" name="country" class="form-control" required value="{{ old('country') }}">
        </div>

        <div class="mb-3">
            <label>صورة العميل (اختياري)</label>
            <input type="file" name="profile_image" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">💾 حفظ</button>
        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">🔙 رجوع</a>
    </form>
</div>
@endsection
