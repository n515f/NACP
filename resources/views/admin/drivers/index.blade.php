@extends('admin.layouts.admin')

@section('title', 'إدارة المندوبين')

@section('content')
  <div class="container">
    <h2>المندوبين</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>الاسم</th>
          <th>الهاتف</th>
          <th>الدولة</th>
          <th>الحالة</th>
        </tr>
      </thead>
      <tbody>
        @foreach($drivers as $driver)
        <tr>
          <td>{{ $driver->name }}</td>
          <td>{{ $driver->phone }}</td>
          <td>{{ $driver->country }}</td>
          <td>{{ $driver->status }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
