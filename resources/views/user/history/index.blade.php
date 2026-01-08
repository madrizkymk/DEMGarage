@extends('layouts.app')
@section('title', 'Service History')
@section('content')
  <main class="flex-grow w-full mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <div class="bg-white flex flex-col rounded-xl shadow sm:p-6 p-3 sm:gap-5 gap-3">
      <div class="flex items-center gap-4">
        <a href="{{ route('user.dashboard') }}">
          <img src="{{ asset('asset/back-button.png') }}" alt="Back Button"
            class="w-5 sm:w-8 hover:scale-105 transform transition duration-300" />
        </a>
        <h2 class="text-xl sm:text-3xl font-semibold">Service History</h2>
      </div>

      @if ($items->count())
        <div class="space-y-4">
          @foreach ($items as $item)
            <div
              class="group bg-gray-50 border border-purple-50 shadow-sm hover:border-purple-200 rounded-lg sm:p-6 p-2 hover:shadow-xl transition-all">
              <div class="grid grid-cols-1 sm:grid-cols-2 items-center justify-between sm:mb-4 mb-0">
                <div class="flex items-center">
                  <div
                    class="w-12 h-12 bg-purple-100 group-hover:bg-purple-200 transition-colors rounded-lg flex items-center justify-center mr-4">
                    <img src="{{ asset('asset/history.png') }}" alt="History Icon" class="w-6 h-6" />
                  </div>
                  <div>
                    <h3 class="sm:text-lg text-md font-semibold text-gray-900">
                      {{ ucfirst(str_replace('-', ' ', $item->service_type)) }}</h3>
                    <p class="text-sm text-gray-500">{{ $item->vehicle_number }}</p>
                  </div>
                </div>
                <div class="mt-2 sm:mt-0 text-right">
                  <div class="sm:text-lg text-sm font-bold text-green-600">
                    Rp {{ number_format($item->price ?? 0, 0, ',', '.') }}
                  </div>
                  <div class="sm:text-sm text-xs text-gray-500">Completed</div>
                </div>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-3 sm:gap-4 gap-1">
                <div>
                  <span class="sm:text-sm text-xs text-gray-500">Service Date:</span>
                  <p class="sm:text-md text-sm font-medium">
                    {{ \Carbon\Carbon::parse($item->booking_date)->format('M d, Y') }}</p>
                </div>
                <div>
                  <span class="sm:text-sm text-xs text-gray-500">Vehicle:</span>
                  <p class="sm:text-md text-sm font-medium">{{ $item->vehicle_number }}</p>
                </div>
                <div>
                  <span class="sm:text-sm text-xs text-gray-500">Description:</span>
                  <p class="sm:text-md text-sm font-medium">{{ $item->description ?? 'No description' }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="text-center py-12">
          <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <img src="{{ asset('asset/history.png') }}" alt="No history" class="w-12 h-12 opacity-50">
          </div>
          <h3 class="text-lg font-medium text-gray-900 mb-2">No Service History</h3>
          <p class="text-gray-500">You haven't completed any services yet.</p>
          <a href="{{ route('user.bookings.index') }}"
            class="inline-flex items-center mt-4 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition duration-200">
            Book Your First Service
          </a>
        </div>
      @endif
    </div>
  </main>
@endsection
