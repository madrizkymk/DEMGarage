@extends('layouts.app')
@section('title', 'Update Service')
@section('content')
  <main class="flex-grow w-full mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <div class="bg-white flex flex-col rounded-xl shadow sm:p-6 p-3 sm:gap-5 gap-3">
      <div class="flex items-center gap-4">
        <a href="{{ route('admin.dashboard') }}">
          <img src="{{ asset('asset/back-button.png') }}" alt="Back Button"
            class="w-5 sm:w-8 hover:scale-105 transform transition duration-300" />
        </a>
        <h2 class="text-xl sm:text-3xl font-semibold">Update Service</h2>
      </div>

      <!-- Search Form -->
      <form method="GET" action="{{ route('admin.update-service.index') }}" class="flex flex-row gap-2 mb-4">
        <input type="text" name="search" value="{{ request('search') }}"
          placeholder="Search by name, vehicle, or service type..."
          class="flex-1 min-w-0 px-3 py-3 sm:py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 text-sm">
        <button type="submit" class="flex-shrink-0 p-2 bg-gray-100 hover:bg-gray-200 rounded-md transition duration-200">
          <img src="{{ asset('asset/search.png') }}" alt="Search" class="h-5 w-5" />
        </button>
        @if (request('search'))
          <a href="{{ route('admin.update-service.index') }}"
            class="flex-shrink-0 p-2 bg-gray-100 hover:bg-gray-200 rounded-md transition duration-200">
            <img src="{{ asset('asset/cross.png') }}" alt="Clear" class="h-5 w-5" />
          </a>
        @endif
      </form>

      @if ($items->count())
        <div class="space-y-4">
          @foreach ($items as $item)
            <form action="{{ route('admin.update-service.update', $item->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <div
                class="group bg-gray-50 border-2 border-green-50 hover:border-green-200 rounded-lg sm:p-6 p-3 hover:shadow-xl transition-all">
                <div class="grid grid-cols-1 sm:grid-cols-2 items-center justify-between mb-4">
                  <div class="flex items-center">
                    <div
                      class="w-12 h-12 bg-green-100 group-hover:bg-green-200 transition-colors rounded-lg flex items-center justify-center mr-4">
                      <img src="{{ asset('asset/update.png') }}" alt="Update Icon" class="w-6 h-6" />
                    </div>
                    <div>
                      <h3 class="sm:text-lg text-md font-semibold text-gray-900">
                        {{ ucfirst(str_replace('-', ' ', $item->service_type)) }}</h3>
                      <p class="sm:text-sm text-xs text-gray-500">{{ $item->vehicle_number }} - {{ $item->user->name }}
                      </p>
                    </div>
                  </div>
                  <div class="text-right">
                    <span
                      class="inline-flex items-center px-2.5 py-0.5 rounded-full sm:mt-0 mt-2 text-xs font-medium bg-green-100 text-green-800">
                      Completed
                    </span>
                  </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                  <div>
                    <span class="sm:text-sm text-xs text-gray-500">Customer:</span>
                    <p class="sm:text-md text-sm font-medium">{{ $item->user->name }}</p>
                  </div>
                  <div>
                    <span class="sm:text-sm text-xs text-gray-500">Vehicle:</span>
                    <p class="sm:text-md text-sm font-medium">{{ $item->vehicle_number }}</p>
                  </div>
                  <div>
                    <span class="sm:text-sm text-xs text-gray-500">Service:</span>
                    <p class="sm:text-md text-sm font-medium">{{ ucfirst(str_replace('-', ' ', $item->service_type)) }}
                    </p>
                  </div>
                  <div>
                    <span class="sm:text-sm text-xs text-gray-500">Date:</span>
                    <p class="sm:text-md text-sm font-medium">
                      {{ \Carbon\Carbon::parse($item->booking_date)->format('M d, Y') }}</p>
                  </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                  <div>
                    <label class="block sm:text-sm text-xs text-gray-500 mb-1">Price (Rp)</label>
                    <input type="number" name="price" value="{{ $item->price }}"
                      class="block w-full px-3 py-3 sm:py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 text-sm"
                      placeholder="Enter price">
                  </div>
                  <div>
                    <label class="block sm:text-sm text-xs text-gray-500 mb-1">Description</label>
                    <input type="text" name="description" value="{{ $item->description }}"
                      class="block w-full px-3 py-3 sm:py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 text-sm"
                      placeholder="Enter description">
                  </div>
                </div>

                <div class="flex justify-end">
                  <button type="submit"
                    class="inline-flex items-center px-4 py-3 sm:py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-200">
                    Save Changes
                  </button>
                </div>
              </div>
            </form>
          @endforeach
        </div>

        @if ($items->hasPages())
          <div class="mt-6">
            {{ $items->links() }}
          </div>
        @endif
      @else
        <div class="text-center py-12">
          <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <img src="{{ asset('asset/update.png') }}" alt="No services" class="w-12 h-12 opacity-50">
          </div>
          <h3 class="text-lg font-medium text-gray-900 mb-2">No Completed Services</h3>
          <p class="text-gray-500">There are no completed services to update at the moment.</p>
        </div>
      @endif
    </div>
  </main>

@endsection
