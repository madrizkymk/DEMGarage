@extends('layouts.app')
@section('title', 'Profile')
@section('content')
  <main class="flex-grow max-w-180 w-full mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <div class="bg-white rounded-xl shadow p-6">
      <div class="flex items-center gap-4 mb-5">
        <a href="{{ route('dashboard') }}">
          <img src="{{ asset('asset/back-button.png') }}" alt="Back Button"
            class="w-5 sm:w-8 hover:scale-105 transform transition duration-300" />
        </a>
        <h2 class="text-xl sm:text-3xl font-semibold">Profile</h2>
      </div>

      <!-- Welcome Greeting -->
      <div class="text-center mb-6">
        <h3 class="text-lg sm:text-xl font-medium text-gray-700 mb-2">Welcome back, {{ $user->name }}!</h3>
      </div>
      <!-- Profile Picture -->
      <div class="flex justify-center mb-6">
        <div class="relative group">
          <img src="{{ asset('asset/logo-user.svg') }}" alt="Profile Picture"
            class="w-24 h-24 sm:w-32 sm:h-32 rounded-full border-4 border-gray-200 shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-500 ease-in-out">
          <div
            class="absolute bottom-0 right-0 bg-blue-500 text-white rounded-full p-2 hover:bg-blue-600 transition-colors duration-300 group-hover:animate-pulse">
            <i class="fas fa-camera text-sm"></i>
          </div>
        </div>
      </div>

      <!-- User Information Cards -->
      <div class="space-y-4">
        <!-- Email -->
        <div
          class="bg-gradient-to-r from-blue-50 to-indigo-50 p-3 sm:p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <i class="fas fa-envelope text-blue-500 text-lg sm:text-xl"></i>
            </div>
            <div class="ml-3 sm:ml-4 flex-1">
              <p class="text-xs sm:text-sm font-medium text-gray-500">Email</p>
              <p class="text-base sm:text-lg font-semibold text-gray-900 break-all">{{ $user->email }}</p>
            </div>
          </div>
        </div>

        <!-- Name -->
        <div
          class="bg-gradient-to-r from-green-50 to-emerald-50 p-3 sm:p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <i class="fas fa-user text-green-500 text-lg sm:text-xl"></i>
            </div>
            <div class="ml-3 sm:ml-4 flex-1">
              <p class="text-xs sm:text-sm font-medium text-gray-500">Name</p>
              <p class="text-base sm:text-lg font-semibold text-gray-900 break-words">{{ $user->name }}</p>
            </div>
          </div>
        </div>

        <!-- Phone Number -->
        <div
          class="bg-gradient-to-r from-purple-50 to-violet-50 p-3 sm:p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <i class="fas fa-phone text-purple-500 text-lg sm:text-xl"></i>
            </div>
            <div class="ml-3 sm:ml-4 flex-1">
              <p class="text-xs sm:text-sm font-medium text-gray-500">Phone Number</p>
              <p class="text-base sm:text-lg font-semibold text-gray-900">{{ $user->phone_number }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
