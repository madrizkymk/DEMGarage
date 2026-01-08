@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
  <main class="flex-grow mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <div class="mb-6">
      <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Admin Dashboard</h1>
      <p class="mt-2 text-gray-600">Manage bookings, services, and users.</p>
    </div>

    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
      <a href="{{ route('admin.incoming.index') }}"
        class="group bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-lg hover:border-blue-300 transition-all duration-200 transform hover:-translate-y-1">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <div
              class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center group-hover:bg-blue-200 transition-colors">
              <img src="{{ asset('asset/incoming.png') }}" alt="Incoming Icon" class="w-6 h-6" />
            </div>
          </div>
          <div class="ml-4">
            <h3 class="text-lg font-semibold text-gray-900 group-hover:text-blue-600 transition-colors">Incoming</h3>
            <p class="text-sm text-gray-500">Manage incoming bookings</p>
          </div>
        </div>
      </a>

      <a href="{{ route('admin.update-service.index') }}"
        class="group bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-lg hover:border-green-300 transition-all duration-200 transform hover:-translate-y-1">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <div
              class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center group-hover:bg-green-200 transition-colors">
              <img src="{{ asset('asset/update.png') }}" alt="Update Service Icon" class="w-6 h-6" />
            </div>
          </div>
          <div class="ml-4">
            <h3 class="text-lg font-semibold text-gray-900 group-hover:text-green-600 transition-colors">Update Service
            </h3>
            <p class="text-sm text-gray-500">Update completed services</p>
          </div>
        </div>
      </a>

      <a href="{{ route('admin.users.index') }}"
        class="group bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-lg hover:border-purple-300 transition-all duration-200 transform hover:-translate-y-1">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <div
              class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center group-hover:bg-purple-200 transition-colors">
              <img src="{{ asset('asset/logo-user.svg') }}" alt="Users Icon" class="w-6 h-6" />
            </div>
          </div>
          <div class="ml-4">
            <h3 class="text-lg font-semibold text-gray-900 group-hover:text-purple-600 transition-colors">Users</h3>
            <p class="text-sm text-gray-500">Manage user accounts</p>
          </div>
        </div>
      </a>
    </section>

    <!-- Quick Stats -->
    <section class="mt-8 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
      <h2 class="text-xl font-semibold text-gray-900 mb-4">Quick Overview</h2>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="text-center">
          <div class="text-2xl font-bold text-blue-600">{{ $totalBookings ?? 0 }}</div>
          <div class="text-sm text-gray-500">Total Bookings</div>
        </div>
        <div class="text-center">
          <div class="text-2xl font-bold text-green-600">{{ $completedServices ?? 0 }}</div>
          <div class="text-sm text-gray-500">Completed Services</div>
        </div>
        <div class="text-center">
          <div class="text-2xl font-bold text-purple-600">{{ $totalUsers ?? 0 }}</div>
          <div class="text-sm text-gray-500">Total Users</div>
        </div>
      </div>
    </section>
  </main>
@endsection
