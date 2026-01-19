@extends('layouts.app')
@section('title', 'User Management')
@section('content')
  <main class="flex-grow w-full mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <div class="bg-white flex flex-col rounded-xl shadow sm:p-6 p-3 gap-5">
      <div class="flex items-center gap-4">
        <a href="{{ route('admin.dashboard') }}">
          <img src="{{ asset('asset/back-button.png') }}" alt="Back Button"
            class="w-5 sm:w-8 hover:scale-105 transform transition duration-300" />
        </a>
        <h2 class="text-xl sm:text-3xl font-semibold">Users Management</h2>
      </div>

      <!-- Search Form -->
      <form method="GET" action="{{ route('admin.users.index') }}" class="flex flex-row gap-2 mb-4">
        <input type="text" name="search" value="{{ request('search') }}"
          placeholder="Search by name, email, or phone..."
          class="flex-1 min-w-0 px-3 py-3 sm:py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 text-sm">
        <button type="submit"
          class="cursor-pointer flex-shrink-0 p-2 bg-purple-100 hover:bg-purple-200 rounded-md transition duration-200">
          <img src="{{ asset('asset/search.png') }}" alt="Search" class="h-5 w-5" />
        </button>
        @if (request('search'))
          <a href="{{ route('admin.users.index') }}"
            class="flex-shrink-0 p-2 flex items-center bg-red-300 hover:bg-red-500 rounded-md transition duration-200">
            <img src="{{ asset('asset/cross.png') }}" alt="Clear" class="h-5 w-5" />
          </a>
        @endif
      </form>

      @if ($users->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          @foreach ($users as $user)
            <div
              class="group bg-gray-50 border-2 border-purple-50 hover:border-purple-200 rounded-lg sm:p-4 p-3 hover:shadow-xl transition-all cursor-pointer"
              onclick="window.location.href='{{ route('admin.users.show', $user) }}'">
              <div class="flex items-center mb-3">
                <div
                  class="w-10 h-10 bg-purple-100 group-hover:bg-purple-200 rounded-full flex items-center justify-center mr-3">
                  <img src="{{ asset('asset/logo-user.svg') }}" alt="User Icon" class="w-5 h-5">
                </div>
                <div class="flex-1 min-w-0">
                  <h3 class="text-sm font-semibold text-gray-900 truncate">{{ $user->name }}</h3>
                  <p class="text-xs text-gray-500 truncate">{{ $user->email }}</p>
                </div>
              </div>
              <div class="space-y-1">
                <div class="flex justify-between text-xs">
                  <span class="text-gray-600">Phone:</span>
                  <span class="text-gray-900">{{ $user->phone_number ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between text-xs">
                  <span class="text-gray-600">Joined:</span>
                  <span class="text-gray-900">{{ $user->created_at->format('M d, Y') }}</span>
                </div>
              </div>
              <div class="mt-3 pt-3 border-t border-gray-200">
                <div class="text-xs text-purple-600 hover:text-purple-800 font-medium">
                  Click to update services →
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="text-center py-10">
          <img src="{{ asset('asset/logo-user.svg') }}" alt="No Users" class="w-16 h-16 mx-auto mb-4 opacity-50">
          <p class="text-gray-500">No users found.</p>
          @if (request('search'))
            <p class="text-sm text-gray-400 mt-2">Try adjusting your search terms.</p>
          @endif
        </div>
      @endif

      @if ($users->hasPages())
        <div class="mt-6">
          {{ $users->links() }}
        </div>
      @endif
    </div>
  </main>

@endsection
