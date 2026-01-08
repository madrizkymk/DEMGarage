@extends('layouts.app')
@section('content')
  <main class="flex flex-col items-center flex-grow py-4 md:py-12 px-8">
    <h2 class="text-xl md:text-4xl sm:text-3xl font-bold mb-4 md:mb-12 text-center">Welcome to DEMGarage!</h2>

    <div class="flex flex-col md:flex-row items-center justify-center max-w-4xl space-y-6 md:space-y-0 md:space-x-8">
      <!-- Gambar DEMGarage -->
      <div
        class="min-w-64 h-64 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center border border-blue-300 rounded-lg shadow-lg">
        <div class="text-center">
          <div class="text-6xl mb-2">🔧</div>
          <div class="text-blue-600 font-semibold">DEMGarage</div>
          <div class="text-sm text-blue-500">Workshop Management</div>
        </div>
      </div>

      <!-- Deskripsi -->
      <div class="text-justify text-xs sm:text-base max-w-lg leading-relaxed text-gray-700">
        <p class="mb-4">
          <strong>DEMGarage</strong> adalah sistem informasi manajemen bengkel berbasis web yang dirancang untuk
          mempermudah pengelolaan layanan.
          Dengan sistem ini, pelanggan dapat memesan layanan servis kendaraan secara online, memilih jenis perbaikan,
          menentukan jadwal,
          dan melihat estimasi biaya dengan mudah. Semua proses dilakukan secara efisien dan terintegrasi untuk
          menciptakan pelayanan yang cepat, akurat, dan profesional.
        </p>
        <p>
          Dibangun dengan semangat inovasi dan modernisasi industri otomotif, <strong>DEMGarage</strong> hadir untuk
          memberikan pengalaman terbaik bagi pelanggan
          dan mendukung bengkel menuju transformasi digital.
        </p>
      </div>
    </div>
  </main>
@endsection
