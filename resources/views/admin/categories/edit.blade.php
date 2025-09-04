@extends('layouts.admin')

@section('title', 'تعديل التصنيف')

@section('content')
<div class="container">
    <h2>تعديل التصنيف</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>اسم التصنيف</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <div class="form-group mt-3">
            <label>الصورة الحالية:</label><br>
            @if($category->icon)
                <img src="{{ asset($category->icon) }}" alt="Icon" width="60" height="60">
            @else
                <p>لا توجد صورة حالية</p>
            @endif
        </div>

        <div class="form-group mt-3">
            <label>تغيير الأيقونة</label>
            <input type="file" name="icon" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary mt-4">تحديث</button>
    </form>
</div>
@endsection
