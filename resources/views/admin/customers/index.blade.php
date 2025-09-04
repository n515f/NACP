@extends('admin.layouts.master')

@section('title', 'إدارة العملاء')

@section('content')
  <div class="container">
    <h2>العملاء</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>الاسم</th>
          <th>الهاتف</th>
          <th>الدولة</th>
          <th>الإجراءات</th>
        </tr>
      </thead>
      <tbody>
        @foreach($customers as $customer)
        <tr>
          <td>{{ $customer->name }}</td>
          <td>{{ $customer->phone }}</td>
          <td>{{ $customer->country }}</td>
          <td>
            <a href="#" class="btn btn-sm btn-warning">تعديل</a>
            <a href="#" class="btn btn-sm btn-danger">حذف</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
