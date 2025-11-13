<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DEMGarage</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">
    <!-- Header -->
    <header class="bg-gray-200 shadow-md py-4 px-8 flex justify-between items-center">
        <h1 class="text-3xl font-bold italic text-gray-900">
            <span class="font-serif">DEMGarage</span>
        </h1>

        @if (Route::has('login'))
            <nav class="space-x-6">
                @auth
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-800 font-semibold hover:text-gray-600">Dashboard</a>
                    @else
                        <a href="{{ route('user.dashboard') }}" class="text-gray-800 font-semibold hover:text-gray-600">Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-600 font-semibold hover:text-red-800">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-800 font-semibold hover:text-gray-600">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-gray-800 font-semibold hover:text-gray-600">Register</a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <!-- Main Content -->
    <main class="flex flex-col items-center flex-grow py-12 px-8">
        <h2 class="text-4xl font-bold mb-12 text-center">Welcome to DEMGarage!</h2>

        <div class="flex flex-col md:flex-row items-center justify-center max-w-4xl space-y-6 md:space-y-0 md:space-x-8">
            <!-- Placeholder Gambar -->
            <div class="w-64 h-64 bg-gray-300 flex items-center justify-center border border-gray-400">
                <span class="text-gray-500">Image Placeholder</span>
            </div>

            <!-- Deskripsi -->
            <div class="text-justify max-w-lg leading-relaxed text-gray-700">
                <p class="mb-4">
                    <strong>DEMGarage</strong> adalah sistem informasi manajemen bengkel berbasis web yang dirancang untuk mempermudah pengelolaan layanan.
                    Dengan sistem ini, pelanggan dapat memesan layanan servis kendaraan secara online, memilih jenis perbaikan, menentukan jadwal,
                    dan melihat estimasi biaya dengan mudah. Semua proses dilakukan secara efisien dan terintegrasi untuk menciptakan pelayanan yang cepat, akurat, dan profesional.
                </p>
                <p>
                    Dibangun dengan semangat inovasi dan modernisasi industri otomotif, <strong>DEMGarage</strong> hadir untuk memberikan pengalaman terbaik bagi pelanggan
                    dan mendukung bengkel menuju transformasi digital.
                </p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-200 text-gray-700 py-4 px-8 flex justify-between items-center">
        <p class="text-sm">2025. By DEMGarage</p>
        <p class="font-bold italic text-gray-900">
            <span class="font-serif">DEM</span>Garage
        </p>
    </footer>
</body>
</html>
