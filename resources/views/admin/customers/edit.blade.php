@extends('admin.layouts.admin')

@section('title', 'تعديل بيانات العميل')

@section('content')
<div class="container mt-4">
    <h4 class="text-center mb-4 text-primary">✏️ تعديل بيانات العميل</h4>

    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.customers.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-bold">الاسم</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">رقم الهاتف</label>
            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">العنوان</label>
            <input type="text" name="address" class="form-control" value="{{ $user->address }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">الدولة</label>
            <input type="text" name="country" class="form-control" value="{{ $user->country }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">الصورة الحالية</label><br>
            <img src="{{ asset('images/users/' . ($user->profile_image ?: 'default.png')) }}" width="100" class="rounded shadow">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">تغيير الصورة</label>
            <input type="file" name="profile_image" class="form-control" accept="image/*">
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">
                🔙 رجوع
            </a>
            <button type="submit" class="btn btn-primary">
                💾 تحديث
            </button>
        </div>
    </form>
</div>
@endsection
