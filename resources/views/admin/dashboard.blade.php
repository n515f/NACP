@extends('admin.layouts.admin')

@section('title', 'لوحة التحكم')

@section('content')
<div class="container mt-4">
    <h2 class="text-dark mb-4">مرحبًا بك في لوحة التحكم</h2>
    <p class="text-muted">يمكنك إدارة النظام من هنا.</p>

    <div class="row mt-5">
        <div class="col-md-3 mb-4">
            <div class="card bg-info text-white shadow">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-2x mb-2"></i>
                    <h5>عدد العملاء</h5>
                    <h3>{{ $customerCount ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    <i class="fas fa-car fa-2x mb-2"></i>
                    <h5>عدد السائقين</h5>
                    <h3>{{ $driverCount ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card bg-warning text-white shadow">
                <div class="card-body text-center">
                    <i class="fas fa-shopping-cart fa-2x mb-2"></i>
                    <h5>عدد الطلبات</h5>
                    <h3>{{ $orderCount ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card bg-danger text-white shadow">
                <div class="card-body text-center">
                    <i class="fas fa-hourglass-half fa-2x mb-2"></i>
                    <h5>قيد التنفيذ</h5>
                    <h3>{{ $pendingOrders ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
