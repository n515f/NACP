@extends('admin.layouts.admin')
@section('title', 'قائمة العملاء')
@section('content')
<div class="container mt-4">
    <h2 class="text-center text-primary mb-4">🧾 قائمة العملاء</h2>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.customers.create') }}" class="btn btn-success shadow-sm">
            ➕ إضافة عميل
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-sm align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>الصورة</th>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>الهاتف</th>
                    <th>العنوان</th>
                    <th>الدولة</th>
                    <th>تاريخ التسجيل</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $customer)
                <tr>
                    <td>
                        <img src="{{ asset('images/users/' . ($customer->profile_image ?? 'default.png')) }}"
                             width="45" height="45"
                             class="rounded-circle shadow"
                             style="object-fit: cover;">
                    </td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->country }}</td>
                    <td>{{ $customer->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('admin.customers.show', $customer->id) }}"
                           class="btn btn-sm btn-outline-success">
                            👁 عرض
                        </a>
                        <a href="{{ route('admin.customers.edit', $customer->id) }}"
                           class="btn btn-sm btn-outline-primary">
                            ✏️ تعديل
                        </a>
                        <form action="{{ route('admin.customers.destroy', $customer->id) }}"
                              method="POST" class="d-inline-block"
                              onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">🗑 حذف</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">لا يوجد عملاء حتى الآن.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
