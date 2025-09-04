<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'لوحة التحكم')</title>

  <!-- Google Font: Tajawal -->
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

  <!-- ملف التنسيق الخاص -->
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

  <style>
    body {
      font-family: 'Tajawal', sans-serif;
      text-align: right;
    }
    .sidebar .nav-link i {
      margin-left: 10px;
    }
    .sidebar .nav-link.active i {
      color: white;
    }
    .sidebar .nav-link i,
    .sidebar .nav-link span {
      display: inline-block;
      vertical-align: middle;
    }
    .sidebar {
      background-color: #f2f2f2 !important;
      color: #333;
    }
    .nav-link.active {
      background-color: #5C0CCF !important;
      color: white !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->
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
              <span>الرئيسية</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
              <i class="fas fa-tags"></i>
              <span>التصنيفات</span>
            </a>
          </li>
          <!-- يمكنك إضافة عناصر إضافية هنا -->
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Main Content -->
  <div class="content-wrapper p-4">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer class="main-footer text-center">
    <strong>جميع الحقوق محفوظة &copy; {{ date('Y') }}</strong>
  </footer>

</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
