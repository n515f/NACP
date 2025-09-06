<!-- resources/views/admin/layouts/header.blade.php -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- ✅ أضف الشعار هنا -->
  <a class="navbar-brand d-flex align-items-center ml-3" href="{{ route('admin.dashboard') }}">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" height="40" class="me-2">
      <span class="fw-bold text-dark">لوحة الإدارة</span>
  </a>

  <!-- قائمة الأزرار اليمنى -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
</nav>
