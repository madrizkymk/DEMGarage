<footer class="bg-[#2B2A2A] text-white">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
      <!-- Company Info -->
      <div class="col-span-1 md:col-span-2">
        <div class="flex items-center mb-4">
          <span class="sm:text-xl text-lg font-bold">DEMGarage</span>
        </div>
        <p class="text-gray-300 sm:text-md text-sm mb-4 max-w-md">
          Professional vehicle service management system. Book your motorcycle service appointments online easily and
          conveniently.
        </p>
        <div class="flex space-x-4">
          <a href="#" class="text-gray-400 hover:text-white transition duration-300">
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
              <path
                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-white transition duration-300">
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
              <path
                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
            </svg>
          </a>
        </div>
      </div>

      <!-- Quick Links -->
      <div>
        <h3 class="sm:text-lg text-md font-semibold sm:mb-4 mb-2">Quick Links</h3>
        <ul class="sm:space-y-2 space-y-1">
          <li><a href="{{ route('welcome') }}"
              class="text-gray-300 hover:text-white text-sm sm:text-md transition duration-300">Home</a>
          </li>
          @guest
            <li><a href="#services"
                class="text-gray-300 hover:text-white text-sm sm:text-md transition duration-300">Services</a></li>
            <li><a href="#about" class="text-gray-300 hover:text-white text-sm sm:text-md transition duration-300">About
                Us</a></li>
            <li><a href="#contact"
                class="text-gray-300 hover:text-white text-sm sm:text-md transition duration-300">Contact</a></li>
          @endguest
          @auth
            @if (auth()->user()->role === 'user')
              <li><a href="{{ route('user.dashboard') }}"
                  class="text-gray-300 hover:text-white text-sm sm:text-md transition duration-300">Dashboard</a></li>
              <li><a href="{{ route('user.bookings.index') }}"
                  class="text-gray-300 hover:text-white text-sm sm:text-md transition duration-300">Book Service</a></li>
            @elseif(auth()->user()->role === 'admin')
              <li><a href="{{ route('admin.dashboard') }}"
                  class="text-gray-300 hover:text-white text-sm sm:text-md transition duration-300">Admin Panel</a></li>
            @endif
          @endauth
        </ul>
      </div>

      <!-- Contact Info -->
      <div>
        <h3 class="text-md sm:text-lg font-semibold sm:mb-4 mb-2">Contact Info</h3>
        <ul class="space-y-2 text-gray-300">
          <li class="flex items-center">
            <svg class="min-w-5 h-5 w-5 mr-2 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <p class="sm:text-sm text-xs">
              Jalan Masjid At Taufiq, (Blok B No.4) CIRACAS, KOTA JAKARTA TIMUR, DKI JAKARTA, ID, 13730
            </p>
          </li>
          <li class="flex items-center sm:text-md text-sm">
            <svg class="h-5 w-5 mr-2 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
            +62 858-1333-4673
          </li>
          <li class="flex items-center sm:text-md text-sm">
            <svg class="h-5 w-5 mr-2 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            info@demgarage.com
          </li>
        </ul>
      </div>
    </div>

    <!-- Bottom Bar -->
    <div
      class="border-t border-gray-800 pt-6 flex sm:text-sm text-xs flex-col md:flex-row justify-between items-center">
      <p class="text-gray-400">&copy; {{ date('Y') }} DEMGarage. All rights reserved.</p>
      <div class="flex space-x-6 mt-2 md:mt-0">
        <a href="#" class="text-gray-400 hover:text-white transition duration-300">Privacy Policy</a>
        <a href="#" class="text-gray-400 hover:text-white transition duration-300">Terms of Service</a>
        <a href="#" class="text-gray-400 hover:text-white transition duration-300">Support</a>
      </div>
    </div>
  </div>
</footer>
