@extends('layouts.app')
@section('title', 'Active Bookings')
@section('content')
  <main class="flex-grow w-full mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <div class="bg-white flex flex-col rounded-xl shadow sm:p-6 p-3 sm:gap-5 gap-3">
      <div class="flex items-center gap-4">
        <a href="{{ route('user.dashboard') }}">
          <img src="{{ asset('asset/back-button.png') }}" alt="Back Button"
            class="w-5 sm:w-8 hover:scale-105 transform transition duration-300" />
        </a>
        <h2 class="text-lg sm:text-3xl font-semibold">Active Bookings</h2>
      </div>

      @if ($bookedBookings->count() > 0)
        <div class="space-y-4">
          @foreach ($bookedBookings as $booking)
            <div
              class="group bg-gray-50 border border-green-50 hover:border-green-200 rounded-lg sm:p-6 p-2 hover:shadow-xl shadow-md transition-all">
              <div class="grid grid-cols-1 sm:grid-cols-2 items-center justify-between mb-4 sm:gap-0 gap-2">
                <div class="flex items-center">
                  <div
                    class="w-12 h-12 bg-green-100 group-hover:bg-green-200 transition-colors rounded-lg flex items-center justify-center mr-4">
                    <img src="{{ asset('asset/booked.png') }}" alt="Booking Icon" class="w-6 h-6" />
                  </div>
                  <div>
                    <h3 class="sm:text-lg text-md font-semibold text-gray-900">
                      {{ ucfirst(str_replace('-', ' ', $booking->service_type)) }}</h3>
                    <p class="text-sm text-gray-500">{{ $booking->vehicle_number }}</p>
                  </div>
                </div>
                <div class="text-right">
                  <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if ($booking->status === 'Completed') bg-green-100 text-green-800
                                    @elseif($booking->status === 'In Progress') bg-yellow-100 text-yellow-800
                                    @else bg-blue-100 text-blue-800 @endif">
                    {{ $booking->status ?? 'Pending' }}
                  </span>
                </div>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-3 sm:gap-4 gap-2 mb-4">
                <div>
                  <span class="text-sm text-gray-500">Booking Date:</span>
                  <p class="sm:text-lg text-sm font-medium">
                    {{ \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') }}</p>
                </div>
                <div>
                  <span class="text-sm text-gray-500">Vehicle:</span>
                  <p class="sm:text-lg text-sm font-medium">{{ $booking->vehicle_number }}</p>
                </div>
                <div>
                  <span class="text-sm text-gray-500">Service:</span>
                  <p class="sm:text-lg text-sm font-medium">{{ ucfirst(str_replace('-', ' ', $booking->service_type)) }}
                  </p>
                </div>
              </div>

              <div class="flex justify-end">
                <form method="POST" action="{{ route('user.booked.destroy', $booking->id) }}" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent sm:text-sm text-xs font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-200"
                    onclick="return confirm('Are you sure you want to cancel this booking?')">
                    Cancel Booking
                  </button>
                </form>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="text-center py-12">
          <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <img src="{{ asset('asset/booked.png') }}" alt="No bookings" class="w-12 h-12 opacity-50">
          </div>
          <h3 class="text-lg font-medium text-gray-900 mb-2">No Active Bookings</h3>
          <p class="text-gray-500">You don't have any active bookings at the moment.</p>
          <a href="{{ route('user.bookings.index') }}"
            class="inline-flex items-center mt-4 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition duration-200">
            Book a Service
          </a>
        </div>
      @endif
    </div>
  </main>
@endsection
