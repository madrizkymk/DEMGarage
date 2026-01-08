@extends('layouts.app')
@section('title', 'Settings')
@section('content')
  <main class="flex-grow w-full mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <div class="bg-white rounded-xl shadow p-6">
      <div class="flex items-center gap-4 mb-5">
        <a href="{{ route('dashboard') }}">
          <img src="{{ asset('asset/back-button.png') }}" alt="Back Button"
            class="w-5 sm:w-8 hover:scale-105 transform transition duration-300" />
        </a>
        <h2 class="text-xl sm:text-3xl font-semibold">Settings</h2>
      </div>

      @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded">
          {{ session('success') }}
        </div>
      @endif

      <form action="{{ route('user.settings.update') }}" method="POST" class="space-y-4">
        @csrf
        @method('PATCH')

        {{-- <div>
          <label for="username" class="block text-sm sm:text-lg font-medium text-gray-700">Change Name</label>
          <input type="text" name="name" value="{{ auth()->user()->name }}"
            class="p-2 mt-1 block w-full rounded-md shadow-sm text-sm" placeholder="Enter your name">
        </div> --}}

        <div
          class="bg-gray-50 p-4 sm:p-6 rounded-xl border border-gray-200 hover:shadow-md hover:border-blue-300 transition-all duration-300">
          <label for="username" class="block text-sm sm:text-base lg:text-lg font-semibold text-gray-800 mb-2">Change
            Name</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
              <svg class="h-5 w-5 sm:h-6 sm:w-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
              </svg>
            </div>
            <input type="text" name="name" value="{{ auth()->user()->name }}"
              class="pl-10 sm:pl-12 pr-4 py-3 sm:py-4 block w-full rounded-lg border-2 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-sm sm:text-base bg-white hover:border-gray-400 transition-all duration-200"
              placeholder="enter your new name">
          </div>
        </div>

        <div
          class="bg-gray-50 p-4 sm:p-6 rounded-xl border border-gray-200 hover:shadow-md hover:border-green-300 transition-all duration-300">
          <label for="phone number" class="block text-sm sm:text-base lg:text-lg font-semibold text-gray-800 mb-2">Change
            Phone Number</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
              <svg class="h-5 w-5 sm:h-6 sm:w-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                </path>
              </svg>
            </div>
            <input type="number" name="phone_number" value="{{ auth()->user()->phone_number }}"
              class="pl-10 sm:pl-12 pr-4 py-3 sm:py-4 block w-full rounded-lg border-2 border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 text-sm sm:text-base bg-white hover:border-gray-400 transition-all duration-200"
              placeholder="enter your new phone number">
          </div>
        </div>

        {{-- <div>
          <label for="phone number" class="block text-sm sm:text-lg font-medium text-gray-700">Change Phone
            Number</label>
          <input type="number" name="phone_number" value="{{ auth()->user()->phone_number }}"
            class="p-2 mt-1 block w-full rounded-md shadow-sm text-sm" placeholder="Enter your phone number">
        </div> --}}

        {{-- <div>
          <label for="password" class="block text-sm sm:text-lg font-medium text-gray-700">Change Password</label>
          <input type="password" name="password" class="p-2 mt-1 block w-full rounded-md shadow-sm text-sm"
            placeholder="Enter new password">
        </div>

        <div>
          <label for="password" class="block text-sm sm:text-lg font-medium text-gray-700">Confirm
            Password</label>
          <input type="password" name="password_confirmation" class="p-2 mt-1 block w-full rounded-md shadow-sm text-sm"
            placeholder="Confirm new password">
        </div> --}}

        <div
          class="bg-gray-50 p-4 sm:p-6 rounded-xl border border-gray-200 hover:shadow-md hover:border-purple-300 transition-all duration-300">
          <label for="password" class="block text-sm sm:text-base lg:text-lg font-semibold text-gray-800 mb-2">Change
            Password</label>
          <div class="relative mb-4">
            <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
              <svg class="h-5 w-5 sm:h-6 sm:w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                </path>
              </svg>
            </div>
            <input type="password" name="password"
              class="pl-10 sm:pl-12 pr-4 py-3 sm:py-4 block w-full rounded-lg border-2 border-gray-300 shadow-sm focus:border-purple-500 focus:ring-2 focus:ring-purple-200 text-sm sm:text-base bg-white hover:border-gray-400 transition-all duration-200"
              placeholder="Enter new password">
          </div>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
              <svg class="h-5 w-5 sm:h-6 sm:w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <input type="password" name="password_confirmation"
              class="pl-10 sm:pl-12 pr-4 py-3 sm:py-4 block w-full rounded-lg border-2 border-gray-300 shadow-sm focus:border-purple-500 focus:ring-2 focus:ring-purple-200 text-sm sm:text-base bg-white hover:border-gray-400 transition-all duration-200"
              placeholder="Confirm new password">
          </div>
        </div>

        <div>
          <button type="submit"
            class="inline-flex mt-4 justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white cursor-pointer bg-green-600 hover:bg-green-700 focus:bg-green-700">Save
            Changes</button>
        </div>
      </form>

    </div>
  </main>
@endsection
