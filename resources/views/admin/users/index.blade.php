@extends('admin.layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-primary">إدارة المستخدمين</h4>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> مستخدم جديد
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>الهاتف</th>
                    <th>الدور</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-info">عرض</a>
    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">تعديل</a>
    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger">حذف</button>
    </form>
</td>

                    </tr>
                @endforeach
                @if($users->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center text-muted">لا يوجد مستخدمين حالياً</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
