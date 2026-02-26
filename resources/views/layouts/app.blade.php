<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Dahlan Property')</title>
    
    <!-- Tailwind CSS - HAPUS SPASI DI URL -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome - HAPUS SPASI DI URL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Font - HAPUS SPASI DI URL -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    
    @yield('styles')
</head>
<body>
    @include('layouts.navbar')
    
    <main class="py-8 px-4">
        <div class="max-w-7xl mx-auto">
            @yield('content')
        </div>
    </main>
    
    <!-- Scripts -->
    <script src="{{ asset('assets/js/navbar.js') }}"></script>
    
    <!-- ✅ FIX: Tambahkan @stack('charts') untuk render Chart.js/Highcharts -->
    @stack('charts')
    
    @yield('scripts')
</body>
</html>