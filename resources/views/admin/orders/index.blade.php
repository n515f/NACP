@extends('admin.layouts.master')

@section('title', 'إدارة الطلبات')

@section('content')
  <div class="container">
    <h2>الطلبات</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>رقم الطلب</th>
          <th>العميل</th>
          <th>الحالة</th>
          <th>تاريخ الإنشاء</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $order)
        <tr>
          <td>#{{ $order->id }}</td>
          <td>{{ $order->user->name }}</td>
          <td>{{ $order->status }}</td>
          <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
