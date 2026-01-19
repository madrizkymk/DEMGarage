@extends('layouts.app')
@section('title', 'Booking')
@section('content')
  <main class="flex-grow w-full mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    @if (session('success'))
      <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg border border-green-300">
        {{ session('success') }}
      </div>
    @endif
    <div class="bg-white rounded-xl shadow p-6">
      <div class="flex items-center gap-4 mb-5">
        <a href="{{ route('user.dashboard') }}">
          <img src=" {{ asset('asset/back-button.png') }}" alt="Back Button"
            class="w-5 sm:w-8 hover:scale-105 transform transition duration-300" />
        </a>
        <h2 class="text-xl sm:text-3xl font-semibold">Booking</h2>
      </div>
      <form class="space-y-6" method="POST" action="{{ route('user.bookings.store') }}">
        @csrf
        <div>
          <label for="vehicle_number" class="block sm:text-md text-sm font-medium text-gray-700 mb-2">Vehicle
            Number</label>
          <input type="text" id="vehicle_number" name="vehicle_number"
            class="mt-1 block w-full px-2 py-3 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm text-xs transition-colors uppercase"
            placeholder="Enter vehicle number (e.g. B 1234 AB)" value="{{ old('vehicle_number') }}"
            oninput="formatVehicleNumber(this)" required>
          @error('vehicle_number')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label for="service_type" class="block sm:text-md text-sm font-medium text-gray-700 mb-2">Service Type</label>
          <select name="service_type" id="service_type"
            class="cursor-pointer mt-1 block w-full px-2 py-3 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm text-xs font-medium text-gray-700 transition-colors"
            required>
            <option value="" disabled {{ old('service_type') ? '' : 'selected' }}>Select service type</option>
            <option value="minor service" {{ old('service_type') == 'minor service' ? 'selected' : '' }}>Minor Service
            </option>
            <option value="major service" {{ old('service_type') == 'major service' ? 'selected' : '' }}>Major Service
            </option>
            <option value="modification" {{ old('service_type') == 'modification' ? 'selected' : '' }}>Modification
            </option>
          </select>
          @error('service_type')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label for="booking_date" class="block text-sm sm:text-md font-medium text-gray-700 mb-2">Booking Date</label>
          <input type="date" id="booking_date" name="booking_date"
            class="cursor-pointer mt-1 block w-32 px-2 py-3 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm text-xs transition-colors"
            value="{{ old('booking_date') }}" min="{{ date('Y-m-d') }}" required>
          @error('booking_date')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="flex justify-end text-xs sm:text-xl font-semibold pt-4">
          <button type="submit"
            class="cursor-pointer inline-flex justify-center items-center px-6 py-3 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-800 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 min-h-[44px]">
            <span id="submit-text">Booking</span>
            <svg id="loading-spinner" class="hidden animate-spin ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
              </circle>
              <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
              </path>
            </svg>
          </button>
        </div>
      </form>
    </div>
    <div class="flex flex-col sm:flex-row items-center mt-6 gap-6">
      <div class="bg-white w-full flex flex-col text-center rounded-xl shadow h-auto p-4">
        <p class="text-xs sm:text-lg font-normal">We're here to help you find the best solution for your vehicle.</p>
        <p class="text-xs sm:text-lg font-semibold text-red-700">Consult your service needs with us first before making a
          booking.</p>
      </div>
      <a href=" https://wa.me/+6285813334673" target="_blank" rel="noopener noreferrer"
        class="hover:scale-105 transform transition duration-300">
        <img src="{{ asset('asset/whatsapp.png') }}" alt="Contact us on WhatsApp" class="h-auto w-20">
      </a>

    </div>
  </main>
  </div>

  <script>
    function formatVehicleNumber(input) {
      let value = input.value.toUpperCase().replace(/[^A-Z0-9]/g, ''); // Hanya huruf dan angka, uppercase

      // Format: 1-2 huruf, spasi, 1-4 angka, spasi, 0-3 huruf
      let formatted = '';
      if (value.length > 0) {
        // Huruf pertama (1-2)
        let letters1 = value.match(/^[A-Z]{1,2}/);
        if (letters1) {
          formatted += letters1[0];
          value = value.slice(letters1[0].length);
        }

        // Angka (1-4)
        if (value.length > 0 && formatted.length > 0) {
          let numbers = value.match(/^\d{1,4}/);
          if (numbers) {
            formatted += ' ' + numbers[0];
            value = value.slice(numbers[0].length);
          }
        }

        // Huruf kedua (0-3)
        if (value.length > 0 && formatted.includes(' ')) {
          let letters2 = value.match(/^[A-Z]{0,3}/);
          if (letters2 && letters2[0]) {
            formatted += ' ' + letters2[0];
          }
        }
      }

      input.value = formatted.trim();
    }
  </script>

  <script>
    // Form validation and loading state
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.querySelector('form');
      const submitBtn = document.querySelector('button[type="submit"]');
      const submitText = document.getElementById('submit-text');
      const loadingSpinner = document.getElementById('loading-spinner');

      form.addEventListener('submit', function(e) {
        // Show loading state
        submitBtn.disabled = true;
        submitText.textContent = 'Processing...';
        loadingSpinner.classList.remove('hidden');

        // Basic client-side validation
        const vehicleNumber = document.getElementById('vehicle_number').value;
        const serviceType = document.getElementById('service_type').value;
        const bookingDate = document.getElementById('booking_date').value;

        if (!vehicleNumber || !serviceType || !bookingDate) {
          e.preventDefault();
          alert('Please fill in all required fields.');
          resetButton();
          return;
        }

        // Check if booking date is not in the past
        const selectedDate = new Date(bookingDate);
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        if (selectedDate < today) {
          e.preventDefault();
          alert('Booking date cannot be in the past.');
          resetButton();
          return;
        }
      });

      function resetButton() {
        submitBtn.disabled = false;
        submitText.textContent = 'Booking';
        loadingSpinner.classList.add('hidden');
      }
    });
  </script>
@endsection
