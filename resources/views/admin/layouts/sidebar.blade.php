<!-- resources/views/admin/layouts/sidebar.blade.php -->
<aside class="main-sidebar sidebar-light elevation-4">
  <a href="#" class="brand-link text-center">
    <span class="brand-text font-weight-light">ناولني | الإدارة</span>
  </a>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            <p>الرئيسية</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.customers.index') }}" class="nav-link {{ request()->is('admin/customers*') ? 'active' : '' }}">
            <i class="fas fa-users"></i>
            <p>العملاء</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.drivers.index') }}" class="nav-link {{ request()->is('admin/drivers*') ? 'active' : '' }}">
            <i class="fas fa-car"></i>
            <p>المندوبين</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.orders.index') }}" class="nav-link {{ request()->is('admin/orders*') ? 'active' : '' }}">
            <i class="fas fa-clipboard-list"></i>
            <p>الطلبات</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
