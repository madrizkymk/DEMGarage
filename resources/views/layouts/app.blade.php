<!DOCTYPE html>
<html class="h-full bg-[#F5F2F2]" lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="description" content="DEMGarage - Professional vehicle service management system">
  <meta name="keywords" content="vehicle service, motorcycle repair, workshop management, booking system">
  <meta name="author" content="DEMGarage">
  <meta name="theme-color" content="#000000">
  <title>{{ config('app.name', 'DEMGarage') }} - @yield('title', 'Vehicle Service Management')</title>

  <!-- Preload critical assets -->
  <link rel="preload" href="{{ asset('asset/logo-demgarage.png') }}" as="image">
  <link rel="icon" type="image/x-icon" href="{{ asset('asset/favicon.ico') }}">

  <!-- Tailwind CSS -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @stack('styles')
</head>

<body class="min-h-screen flex flex-col antialiased">
  @include('partials.header')

  @yield('content')

  @include('partials.footer')

  @stack('scripts')

  <!-- Mobile menu toggle script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const mobileMenuButton = document.getElementById('mobile-menu-button');
      const mobileMenu = document.getElementById('mobile-menu');

      if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
          mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
          if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
            mobileMenu.classList.add('hidden');
          }
        });
      }
    });
  </script>
</body>

</html>
