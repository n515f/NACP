<!-- Sidebar -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin/dashboard') }}" class="brand-link text-center">
        <img src="{{ asset('images/logo.png') }}" alt="Nawelni Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .9; width: 50px; height: 50px;">
        <span class="brand-text font-weight-bold nav-text" style="margin-right: 10px;">ناولني | الإدارة</span>
    </a>

    <!-- Sidebar Menu -->
    <div class="sidebar">
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <span class="nav-text">الرئيسية</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.customers.index') }}" class="nav-link {{ request()->is('admin/customers*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <span class="nav-text">العملاء</span>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <span class="nav-text">المستخدمين</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.drivers.index') }}" class="nav-link {{ request()->is('admin/drivers*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-car"></i>
                        <span class="nav-text">المندوبين</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.orders.index') }}" class="nav-link {{ request()->is('admin/orders*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <span class="nav-text">الطلبات</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
