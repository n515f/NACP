@extends('admin.layouts.admin')

@section('title', 'عرض المستخدم')

@section('content')
<div class="container mt-4">
    <h4 class="text-center mb-4 text-primary">👤 تفاصيل المستخدم</h4>

    <div class="card p-4 shadow-sm text-center">
        <div class="mb-4">
            <img src="{{ asset('images/users/' . ($user->profile_image ?? 'default.png')) }}"
                 class="rounded-circle shadow"
                 width="120"
                 height="120"
                 style="object-fit: cover;"
                 alt="صورة المستخدم">
        </div>

        <ul class="list-group text-start">
            <li class="list-group-item"><strong>👤 الاسم الكامل:</strong> {{ $user->name }}</li>
            <li class="list-group-item"><strong>📧 البريد الإلكتروني:</strong> {{ $user->email }}</li>
            <li class="list-group-item"><strong>📞 رقم الهاتف:</strong> {{ $user->phone }}</li>
            <li class="list-group-item"><strong>🏷️ الدور:</strong> {{ $user->role }}</li>
            <li class="list-group-item"><strong>🌍 الدولة:</strong> {{ $user->country ?? '-' }}</li>
            <li class="list-group-item"><strong>📍 العنوان:</strong> {{ $user->address ?? '-' }}</li>
            <li class="list-group-item"><strong>📅 تاريخ الإنشاء:</strong> {{ optional($user->created_at)->format('Y-m-d H:i') }}</li>
            <li class="list-group-item"><strong>♻️ آخر تحديث:</strong> {{ optional($user->updated_at)->format('Y-m-d H:i') }}</li>
        </ul>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning px-4">✏️ تعديل</a>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary px-4">🔙 رجوع</a>
        </div>
    </div>
</div>
@endsection
