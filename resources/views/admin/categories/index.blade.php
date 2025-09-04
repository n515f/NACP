@extends('layouts.admin')

@section('title', 'إدارة التصنيفات')

@section('content')
<div class="container">
    <h2 class="mb-4">إدارة التصنيفات</h2>

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> إضافة تصنيف
    </a>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">الرقم</th>
                <th scope="col">الاسم</th>
                <th scope="col">الأيقونة</th>
                <th scope="col">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>
                        <img src="{{ asset($cat->icon) }}" alt="أيقونة" width="50">
                    </td>
                    <td>
                        <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> تعديل
                        </a>
                        <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                <i class="fas fa-trash-alt"></i> حذف
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">لا توجد تصنيفات حالياً.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
