@extends('layouts.app')
@section('title', 'Incoming')
@section('content')

  <main class="flex-grow w-full mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

    <div class="bg-white flex flex-col rounded-xl shadow sm:p-6 p-3 sm:gap-5 gap-3">

      <div class="flex items-center gap-4">
        <a href="{{ route('admin.dashboard') }}">
          <img src="{{ asset('asset/back-button.png') }}" alt="Back Button"
            class="w-5 sm:w-8 hover:scale-105 transform transition duration-300" />
        </a>
        <h2 class="text-xl sm:text-3xl font-semibold">Incoming Bookings</h2>
      </div>

      @if ($items->count() > 0)
        @foreach ($items as $item)
          @php
            $formId = 'statusForm' . $item->id;
          @endphp
          <div
            class="group bg-gray-50 border-2 border-blue-50 hover:border-blue-200 shadow-sm rounded-lg w-full flex flex-col gap-4 md:p-6 p-3 hover:shadow-xl transition-all">

            <div class="flex flex-col sm:flex-row items-center min-w-full gap-4">
              <div class="flex-shrink-0">
                <div
                  class="w-12 h-12 bg-blue-100 group-hover:bg-blue-200 transition-colors rounded-lg flex items-center justify-center">
                  <img src="{{ asset('asset/incoming.png') }}" alt="Incoming Icon" class="w-6 h-6" />
                </div>
              </div>

              <div class="flex-1 min-w-0">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 sm:gap-4 gap-1 sm:text-sm text-xs">
                  <div>
                    <span class="text-gray-600 font-medium">Name:</span>
                    <span class="ml-2 text-gray-900">{{ $item->user->name }}</span>
                  </div>
                  <div>
                    <span class="text-gray-600 font-medium">Vehicle:</span>
                    <span class="ml-2 text-gray-900">{{ $item->vehicle_number }}</span>
                  </div>
                  <div>
                    <span class="text-gray-600 font-medium">Service:</span>
                    <span class="ml-2 text-gray-900">{{ $item->service_type }}</span>
                  </div>
                  <div>
                    <span class="text-gray-600 font-medium">Date:</span>
                    <span class="ml-2 text-gray-900">{{ $item->booking_date->format('M d, Y') }}</span>
                  </div>
                </div>
              </div>

              <div class="flex-shrink-0 w-full sm:w-auto sm:text-sm text-xs">
                <form id="{{ $formId }}" action="{{ route('admin.incoming.updateStatus', $item->id) }}"
                  method="POST" class="flex flex-col xl:flex-row gap-2">
                  @csrf
                  @method('PATCH')

                  <div class="flex-1">
                    <label for="status-{{ $item->id }}" class="sr-only">Status</label>
                    <select id="status-{{ $item->id }}" name="status"
                      class="w-full px-3 sm:py-2 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                      <option value="Pending" {{ $item->status == 'Pending' ? 'selected' : '' }}>
                        Pending</option>
                      <option value="In Progress" {{ $item->status == 'In Progress' ? 'selected' : '' }}>In Progress
                      </option>
                      <option value="Completed" {{ $item->status == 'Completed' ? 'selected' : '' }}>
                        Completed</option>
                    </select>
                  </div>

                  <button type="submit"
                    class="px-4 py-3 sm:py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                    Update Status
                  </button>
                </form>
              </div>
            </div>

          </div>
        @endforeach
      @else
        <div class="text-center py-12">
          <div class="mb-4">
            <img src="{{ asset('asset/incoming.png') }}" alt="No Bookings" class="w-16 h-16 mx-auto opacity-50">
          </div>
          <p class="text-gray-500 text-lg">No incoming bookings available.</p>
          <p class="text-sm text-gray-400 mt-2">New bookings will appear here.</p>
        </div>
      @endif

      @if ($items->hasPages())
        <div class="mt-6">
          {{ $items->links() }}
        </div>
      @endif

    </div>
  </main>

@endsection
