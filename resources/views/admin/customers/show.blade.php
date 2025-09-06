@extends('admin.layouts.admin')

@section('title', 'عرض العميل')

@section('content')
<div class="container mt-4">
    <h4 class="text-center mb-4 text-primary">👤 بيانات العميل</h4>

    <div class="card p-4 shadow-sm text-center">
        <div class="mb-4">
            <img src="{{ asset('images/users/' . ($user->profile_image ?: 'default.png')) }}"
                 class="rounded-circle shadow"
                 width="120"
                 height="120"
                 style="object-fit: cover;">
        </div>

        <div class="text-start">
            <p><strong>👤 الاسم:</strong> {{ $user->name }}</p>
            <p><strong>📧 البريد الإلكتروني:</strong> {{ $user->email }}</p>
            <p><strong>📞 رقم الهاتف:</strong> {{ $user->phone }}</p>
            <p><strong>📍 العنوان:</strong> {{ $user->address }}</p>
            <p><strong>🌍 الدولة:</strong> {{ $user->country }}</p>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('admin.customers.edit', $user->id) }}" class="btn btn-warning px-4">
                ✏️ تعديل
            </a>
            <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary px-4">
                🔙 رجوع
            </a>
        </div>
    </div>
</div>
@endsection
