<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
  @include('admin.layouts.header')
  <div class="d-flex">
    @include('admin.layouts.sidebar')
    <main class="flex-fill p-3">
      @yield('content')
    </main>
  </div>
</body>
</html>
