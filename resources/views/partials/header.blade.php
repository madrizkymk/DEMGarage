<header class="bg-[#FEB05D] shadow-lg">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">

      {{-- Logo --}}
      <div class="flex items-center">
        <a href="{{ route('welcome') }}" class="shrink-0">
          <img src="{{ asset('asset/logo-demgarage.png') }}" alt="DEMGarage" class="h-10 w-auto" />
        </a>
      </div>

      {{-- Right side --}}
      <div class="flex items-center space-x-4">
        <nav class="hidden sm:flex space-x-8">
          <a href="{{ route('welcome') }}"
            class="text-black hover:text-blue-700 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Home</a>
          @guest
            <a href="{{ route('user.bookings.index') }}"
              class="text-black hover:text-blue-700 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Services</a>
          @endguest
          @auth
            @if (auth()->user()->role === 'user')
              <a href="{{ route('user.dashboard') }}"
                class="text-black hover:text-blue-700 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Dashboard</a>
              <a href="{{ route('user.bookings.index') }}"
                class="text-black hover:text-blue-700 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Book
                Service</a>
            @elseif(auth()->user()->role === 'admin')
              <a href="{{ route('admin.dashboard') }}"
                class="text-black hover:text-blue-700 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Admin
                Panel</a>
            @endif
          @endauth
        </nav>
        {{-- Jika user BELUM login (guest) --}}
        @guest
          <div class="hidden sm:flex space-x-4">
            <a href="{{ route('login') }}"
              class="bg-white text-black hover:bg-[#fff8f1] px-4 py-2 rounded-md text-sm font-medium transition duration-300 shadow-md">
              Sign In
            </a>
          </div>
          {{-- Mobile menu button --}}
          <div class="sm:hidden">
            <button type="button" class="text-white hover:text-blue-700 p-2" id="mobile-menu-button">
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>
        @endguest

        {{-- Jika user SUDAH login --}}
        @auth
          {{-- Mobile menu button --}}
          <div class="sm:hidden mr-2">
            <button type="button" class="text-white hover:text-blue-700 p-2" id="mobile-menu-button">
              <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>

          {{-- Dropdown User --}}
          <el-dropdown class="relative">
            <button
              class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
              <span class="cursor-pointer hover:bg-white/20 rounded-full absolute -inset-1.5"></span>
              <img src="{{ asset('asset/logo-user.svg') }}" alt="User"
                class="size-9 rounded-full outline outline-2 outline-white/20" />
            </button>

            <el-menu anchor="bottom end" popover
              class="w-56 origin-top-right rounded-md bg-white py-2 shadow-xl outline-1 outline-black/5 border border-gray-200">

              @auth
                <div class="px-4 py-3 border-b border-gray-200">
                  <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                  <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                </div>

                @if (auth()->user()->role === 'user')
                  <a href="{{ route('user.profile.index') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-200">
                    <div class="flex items-center">
                      <svg class="mr-3 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                      </svg>
                      Your Profile
                    </div>
                  </a>

                  <a href="{{ route('user.settings.edit') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-200">
                    <div class="flex items-center">
                      <svg class="mr-3 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                      Settings
                    </div>
                  </a>
                @endif

                <div class="mt-2">
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                      class="cursor-pointer hover:bg-gray-100 w-full text-left px-4 py-2 text-sm text-gray-700 transition duration-200 flex items-center">
                      <svg class="mr-3 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                      </svg>
                      Log out
                    </button>
                  </form>
                </div>
              @endauth
            </el-menu>
          </el-dropdown>
        @endauth
      </div>
    </div>

    {{-- Mobile menu --}}
    <div class="sm:hidden hidden" id="mobile-menu">
      <div class="px-2 pt-2 pb-3 space-y-1 bg-[#2B2A2A] rounded-md mb-4">
        @guest
          <a href="{{ route('welcome') }}"
            class="text-white hover:text-blue-700 block px-3 py-2 rounded-md text-base font-medium">Home</a>
          <a href="{{ route('user.bookings.index') }}"
            class="text-white hover:text-blue-700 block px-3 py-2 rounded-md text-base font-medium">Services</a>
          <div class="border-t border-[#5A7ACD] pt-3 mt-3">
            <a href="{{ route('login') }}"
              class="bg-white text-blue-700 hover:bg-[#fff8f1] block px-3 py-2 rounded-md text-base font-medium mt-2 text-center">Sign
              in</a>
          </div>
        @endguest
        @auth
          @if (auth()->user()->role === 'user')
            <a href="{{ route('user.dashboard') }}"
              class="text-white hover:text-blue-700 block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
            <a href="{{ route('user.bookings.index') }}"
              class="text-white hover:text-blue-700 block px-3 py-2 rounded-md text-base font-medium">Book
              Service</a>
          @elseif(auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}"
              class="text-white hover:text-blue-700 block px-3 py-2 rounded-md text-base font-medium">Admin
              Panel</a>
          @endif
        @endauth
      </div>
    </div>
  </div>
</header>
