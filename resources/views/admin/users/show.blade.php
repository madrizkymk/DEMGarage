@extends('layouts.app')
@section('title', 'User Details')
@section('content')
  <main class="flex-grow w-full mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <div class="bg-white flex flex-col rounded-xl shadow sm:p-6 p-3 sm:gap-5 gap-3">
      <div class="flex items-center gap-4">
        <a href="{{ route('admin.users.index') }}">
          <img src="{{ asset('asset/back-button.png') }}" alt="Back Button"
            class="w-5 sm:w-8 hover:scale-105 transform transition duration-300" />
        </a>
        <h2 class="text-xl sm:text-3xl font-semibold">User Details</h2>
      </div>

      <!-- User Information Card -->
      <div class="bg-gray-50 border border-purple-200 rounded-lg p-6">
        <div class="grid sm:grid-cols-2 grid-cols-1 items-center justify-between mb-4">
          <div class="flex items-center justify-center">
            <div class="sm:w-16 w-10 sm:h-16 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-4">
              <img src="{{ asset('asset/logo-user.svg') }}" alt="User Icon" class="w-8 h-8">
            </div>
            <div class="flex-1">
              <h3 class="sm:text-2xl text-md font-bold text-gray-900">{{ $user->name }}</h3>
              <p class="text-gray-600 sm:text-md text-xs">{{ $user->email }}</p>
              <p class="sm:text-sm text-xs text-gray-500">Joined {{ $user->created_at->format('M d, Y') }}</p>
            </div>
          </div>
          <div class="sm:text-right text-center">
            <a href="{{ route('admin.update-service.index', ['search' => $user->name]) }}"
              class="inline-flex items-center px-4 py-3 sm:py-2 mt-4 sm:mt-0 bg-purple-600 text-white sm:text-sm text-xs font-medium rounded-md hover:bg-purple-700 transition duration-200">
              <img src="{{ asset('asset/search.png') }}" alt="Search"
                class="w-5 h-5 mr-2 rounded-sm bg-white border-3" />
              Find Services
            </a>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
          <div class="bg-white md:p-4 p-2 rounded-lg border-purple-200 border-2">
            <div class="md:text-sm text-xs text-gray-500">Phone</div>
            <div class="md:text-lg text-md font-semibold">{{ $user->phone_number ?? 'Not provided' }}</div>
          </div>
          <div class="bg-white md:p-4 p-2 rounded-lg border-purple-200 border-2">
            <div class="md:text-sm text-xs text-gray-500">Total Bookings</div>
            <div class="md:text-lg text-md font-semibold">{{ $user->bookings->count() }}</div>
          </div>
          <div class="bg-white md:p-4 p-2 rounded-lg border-purple-200 border-2">
            <div class="md:text-sm text-xs text-gray-500">Email Verified</div>
            <div class="md:text-lg text-md font-semibold">
              @if ($user->email_verified_at)
                <span class="text-green-600">✓ Verified</span>
              @else
                <span class="text-red-600">✗ Unverified</span>
              @endif
            </div>
          </div>
        </div>
      </div>

      <!-- Booking History -->
      <div class="bg-white border border-purple-200 rounded-lg sm:p-6 py-4 px-2">
        <h3 class="text-xl font-semibold mb-4">Booking History</h3>

        @if ($bookings->count())
          <div class="space-y-4">
            @foreach ($bookings as $booking)
              <div
                class="border border-purple-200 hover:border-2 rounded-lg sm:p-4 p-2 hover:shadow-lg transition-shadow">
                <div class="flex justify-between items-start mb-2">
                  <div>
                    <h4 class="font-semibold sm:text-md text-sm text-gray-900">{{ $booking->service_type }}</h4>
                    <p class="text-sm text-gray-600">{{ $booking->vehicle_number }}</p>
                  </div>
                  <div class="text-right">
                    <span
                      class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $booking->status_badge_class }}">
                      {{ $booking->status_label }}
                    </span>
                  </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 sm:gap-2 gap-0 sm:text-sm text-xs">
                  <div>
                    <span class="text-gray-500">Date:</span>
                    <span class="font-medium">{{ $booking->created_at->format('M d, Y') }}</span>
                  </div>
                  <div>
                    <span class="text-gray-500">Price:</span>
                    <span class="font-medium">Rp {{ number_format($booking->price ?? 0, 0, ',', '.') }}</span>
                  </div>
                  <div>
                    <span class="text-gray-500">Status:</span>
                    <span class="font-medium">{{ ucfirst($booking->status) }}</span>
                  </div>
                  <div>
                    <span class="text-gray-500">Updated:</span>
                    <span class="font-medium">{{ $booking->updated_at->format('M d, Y') }}</span>
                  </div>
                </div>
              </div>
            @endforeach
          </div>

          <!-- Pagination -->
          <div class="mt-6">
            {{ $bookings->links() }}
          </div>
        @else
          <div class="text-center py-8">
            <img src="{{ asset('asset/logo-user.svg') }}" alt="No bookings" class="w-16 h-16 mx-auto mb-4 opacity-50">
            <p class="text-gray-500">No booking history found for this user.</p>
          </div>
        @endif
      </div>
    </div>
  </main>
@endsection
