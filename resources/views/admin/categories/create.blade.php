@extends('layouts.admin')

@section('title', 'إضافة تصنيف')

@section('content')
<div class="container">
    <h2>إضافة تصنيف</h2>
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>اسم التصنيف</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label>أيقونة التصنيف (صورة)</label>
            <input type="file" name="icon" class="form-control-file" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">حفظ</button>
    </form>
</div>
@endsection
