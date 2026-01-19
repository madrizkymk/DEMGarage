<x-guest-layout>

  <div class="shadow-xl rounded-2xl overflow-hidden relative w-full max-w-4xl mx-auto">

    <div id="slider" class="flex w-[300%] transition-all duration-700">

      {{-- -------------------------------- --}}
      {{-- LOGIN --}}
      {{-- -------------------------------- --}}
      <div class="w-1/3 min-h-[500px] flex bg-gradient-to-r from-white to-gray-200 flex-row justify-center items-center">
        <div class="md:w-1/2 w-full flex sm:px-10 px-4 flex-col justify-center items-center">
          <h2 class="text-3xl font-bold mb-6">Login</h2>

          <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm">
            @csrf

            <div class="mb-4">
              <label for="email" class="sr-only">Email</label>
              <input type="email" id="email" name="email" placeholder="Email"
                class="w-full px-4 py-3 bg-gray-200 rounded-md border-0 focus:ring-2 focus:ring-blue-500 focus:bg-white transition-colors"
                value="{{ old('email') }}" required>
              @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="mb-4 relative">
              <label for="password" class="sr-only">Password</label>
              <input type="password" id="password" name="password" placeholder="Password"
                class="w-full px-4 py-3 pr-12 bg-gray-200 rounded-md border-0 focus:ring-2 focus:ring-blue-500 focus:bg-white transition-colors"
                required>
              <button type="button" onclick="togglePassword('password')"
                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                <svg width="20px" height="20px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M8 2c-1.5 0-2.8.4-3.9 1.2l.8.7C5.8 3.3 6.8 3 8 3c3.3 0 6 2.7 6 6h1c0-3.9-3.1-7-7-7zM1 3l1.6 1.5C1.6 5.7 1 7.3 1 9h1c0-1.5.5-2.8 1.4-3.8l2.2 2C5.2 7.7 5 8.3 5 9c0 1.7 1.3 3 3 3 .8 0 1.5-.3 2-.8l3 2.8.7-.7-12-11L1 3zm5.3 4.9l2.9 2.7c-.3.2-.7.4-1.2.4-1.1 0-2-.9-2-2 0-.4.1-.8.3-1.1zM11 9.5l-1-.9c-.2-.8-.9-1.5-1.8-1.6l-1-.9c.3-.1.5-.1.8-.1 1.7 0 3 1.3 3 3v.5z" />
                </svg>
              </button>
              @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            {{-- Forgot password --}}
            @if (Route::has('password.request'))
              <a href="javascript:void(0)" onclick="goForgot()"
                class="text-sm text-gray-500 hover:text-blue-600 hover:underline mb-4 block transition-colors">
                Forgot password?
              </a>
            @endif

            <button type="submit"
              class="cursor-pointer w-full py-3 px-4 bg-black text-white rounded-md hover:bg-gray-800 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200 min-h-[44px]">
              Login
            </button>
          </form>


          {{-- Go to Register --}}
          <button onclick="goRegister()"
            class="cursor-pointer md:hidden w-40 h-10 bg-black mt-4 text-sm text-white rounded-md">
            Create account →
          </button>
        </div>
        <div
          class="w-1/2 flex-col hidden md:flex items-center justify-center bg-gradient-to-r from-gray-300 to-gray-200 h-8/10 rounded-l-2xl">
          <a href="{{ route('welcome') }}" class="shrink-0">
            <img src="{{ asset('asset/logo-demgarage.png') }}" alt="DEGarage" class="h-12" />
          </a>
          <p class="text-gray-600">Don't have an account?</p>
          {{-- Go to Register --}}
          <button onclick="goRegister()" class="cursor-pointer w-40 h-9 bg-black mt-2 text-sm text-white rounded-md">
            Create account →
          </button>
        </div>
      </div>


      {{-- -------------------------------- --}}
      {{-- REGISTER --}}
      {{-- -------------------------------- --}}
      <div
        class="w-1/3 min-h-[500px] flex flex-row justify-center items-center bg-gradient-to-l from-gray-300 to-gray-200">
        <div
          class="flex-col hidden md:flex items-center justify-center bg-gradient-to-r from-gray-200 to-white w-1/2 h-8/10 rounded-r-2xl">
          <a href="{{ route('welcome') }}" class="shrink-0">
            <img src="{{ asset('asset/logo-demgarage.png') }}" alt="DEGarage" class="h-12" />
          </a>
          <p class="text-gray-600">If you already have an account</p>
          {{-- Go to Register --}}
          <button onclick="goLogin()" class="cursor-pointer w-40 h-9 bg-black mt-2 text-sm text-white rounded-md">
            ← Back to login
          </button>
        </div>
        <div class="md:w-1/2 w-full flex sm:px-10 px-4  flex-col justify-center items-center">
          <h2 class="text-3xl font-bold my-6">Register</h2>

          <form method="POST" action="{{ route('register') }}" class="w-full max-w-sm">
            @csrf
            <input type="hidden" name="form_type" value="register">

            <div class="mb-4">
              <label for="name" class="sr-only">Full Name</label>
              <input type="text" id="name" name="name" placeholder="Full Name"
                class="w-full px-4 py-3 bg-white rounded-md border-0 focus:ring-2 focus:ring-blue-500 transition-colors"
                value="{{ old('name') }}" required>
              @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="mb-4">
              <label for="reg-email" class="sr-only">Email</label>
              <input type="email" id="reg-email" name="email" placeholder="Email"
                class="w-full px-4 py-3 bg-white rounded-md border-0 focus:ring-2 focus:ring-blue-500 transition-colors"
                value="{{ old('email') }}" required>
              @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="mb-4">
              <label for="phone" class="sr-only">Phone Number</label>
              <input type="tel" id="phone" name="phone" placeholder="Phone Number (e.g. 08123456789)"
                class="w-full px-4 py-3 bg-white rounded-md border-0 focus:ring-2 focus:ring-blue-500 transition-colors"
                value="{{ old('phone_number') }}" required>
              @error('phone')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="mb-4 relative">
              <label for="reg-password" class="sr-only">Password</label>
              <input type="password" id="reg-password" name="password" placeholder="Password"
                class="w-full px-4 py-3 pr-12 bg-white rounded-md border-0 focus:ring-2 focus:ring-blue-500 transition-colors"
                required>
              <button type="button" onclick="togglePassword('reg-password')"
                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                <svg width="20px" height="20px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M8 2c-1.5 0-2.8.4-3.9 1.2l.8.7C5.8 3.3 6.8 3 8 3c3.3 0 6 2.7 6 6h1c0-3.9-3.1-7-7-7zM1 3l1.6 1.5C1.6 5.7 1 7.3 1 9h1c0-1.5.5-2.8 1.4-3.8l2.2 2C5.2 7.7 5 8.3 5 9c0 1.7 1.3 3 3 3 .8 0 1.5-.3 2-.8l3 2.8.7-.7-12-11L1 3zm5.3 4.9l2.9 2.7c-.3.2-.7.4-1.2.4-1.1 0-2-.9-2-2 0-.4.1-.8.3-1.1zM11 9.5l-1-.9c-.2-.8-.9-1.5-1.8-1.6l-1-.9c.3-.1.5-.1.8-.1 1.7 0 3 1.3 3 3v.5z" />
                </svg>
              </button>
              @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="mb-6 relative">
              <label for="password_confirmation" class="sr-only">Confirm Password</label>
              <input type="password" id="password_confirmation" name="password_confirmation"
                placeholder="Confirm Password"
                class="w-full px-4 py-3 pr-12 bg-white rounded-md border-0 focus:ring-2 focus:ring-blue-500 transition-colors"
                required>
              <button type="button" onclick="togglePassword('password_confirmation')"
                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                <svg width="20px" height="20px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M8 2c-1.5 0-2.8.4-3.9 1.2l.8.7C5.8 3.3 6.8 3 8 3c3.3 0 6 2.7 6 6h1c0-3.9-3.1-7-7-7zM1 3l1.6 1.5C1.6 5.7 1 7.3 1 9h1c0-1.5.5-2.8 1.4-3.8l2.2 2C5.2 7.7 5 8.3 5 9c0 1.7 1.3 3 3 3 .8 0 1.5-.3 2-.8l3 2.8.7-.7-12-11L1 3zm5.3 4.9l2.9 2.7c-.3.2-.7.4-1.2.4-1.1 0-2-.9-2-2 0-.4.1-.8.3-1.1zM11 9.5l-1-.9c-.2-.8-.9-1.5-1.8-1.6l-1-.9c.3-.1.5-.1.8-.1 1.7 0 3 1.3 3 3v.5z" />
                </svg>
              </button>
              @error('password_confirmation')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <button type="submit"
              class="cursor-pointer w-full py-3 px-4 mb-2 bg-black text-white rounded-md hover:bg-gray-800 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200 min-h-[44px]">
              Create Account
            </button>
          </form>

          {{-- Back to Login --}}
          <button onclick="goLogin()"
            class="cursor-pointer md:hidden mb-6 w-40 h-10 bg-black mt-4 text-sm text-white rounded-md">
            ← Back to login
          </button>
        </div>
      </div>



      {{-- -------------------------------- --}}
      {{-- FORGOT PASSWORD --}}
      {{-- -------------------------------- --}}
      <div class="w-1/3 min-h-[500px] flex flex-col justify-center items-center p-10 bg-gray-50">
        <h2 class="text-3xl font-bold mb-6">Reset Password</h2>

        <form method="POST" action="{{ route('password.email') }}" class="w-full max-w-sm">
          @csrf

          <input type="email" name="email" placeholder="Enter your email"
            class="w-full mb-4 px-4 py-3 bg-gray-100 rounded-md border-0 focus:ring-2 focus:ring-blue-500 transition-colors"
            required>

          {{-- Ubah py-2 jadi py-3 agar konsisten dengan tombol Login/Register --}}
          <button
            class="w-full bg-black text-white py-3 px-4 rounded-md hover:bg-gray-800 transition-colors min-h-[44px]">
            Send Reset Link
          </button>
        </form>

        {{-- Tambahkan tombol Back agar user tidak terjebak --}}
        <button onclick="goLogin()" class="mt-6 text-sm text-gray-500 hover:text-black transition-colors">
          ← Back to Login
        </button>
      </div>

    </div>
  </div>


  <script>
    const slider = document.getElementById('slider');

    function goLogin() {
      slider.style.transform = 'translateX(0%)';
      localStorage.setItem('authSlide', 'login');
    }

    function goRegister() {
      slider.style.transform = 'translateX(-33.33%)';
      localStorage.setItem('authSlide', 'register');
    }

    function goForgot() {
      slider.style.transform = 'translateX(-66.66%)';
      localStorage.setItem('authSlide', 'forgot');
    }

    function togglePassword(inputId) {
      const input = document.getElementById(inputId);
      const button = input.nextElementSibling;
      if (input.type === 'password') {
        input.type = 'text';
        button.innerHTML =
          '<svg width="20px" height="20px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M1 10c0-3.9 3.1-7 7-7s7 3.1 7 7h-1c0-3.3-2.7-6-6-6s-6 2.7-6 6H1zm4 0c0-1.7 1.3-3 3-3s3 1.3 3 3-1.3 3-3 3-3-1.3-3-3zm1 0c0 1.1.9 2 2 2s2-.9 2-2-.9-2-2-2-2 .9-2 2z"/></svg>';
      } else {
        input.type = 'password';
        button.innerHTML =
          '<svg width="20px" height="20px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M8 2c-1.5 0-2.8.4-3.9 1.2l.8.7C5.8 3.3 6.8 3 8 3c3.3 0 6 2.7 6 6h1c0-3.9-3.1-7-7-7zM1 3l1.6 1.5C1.6 5.7 1 7.3 1 9h1c0-1.5.5-2.8 1.4-3.8l2.2 2C5.2 7.7 5 8.3 5 9c0 1.7 1.3 3 3 3 .8 0 1.5-.3 2-.8l3 2.8.7-.7-12-11L1 3zm5.3 4.9l2.9 2.7c-.3.2-.7.4-1.2.4-1.1 0-2-.9-2-2 0-.4.1-.8.3-1.1zM11 9.5l-1-.9c-.2-.8-.9-1.5-1.8-1.6l-1-.9c.3-.1.5-.1.8-.1 1.7 0 3 1.3 3 3v.5z"/></svg>';
      }
    }

    // Set initial position: prioritize errors, then localStorage
    if ({{ $errors->any() ? 'true' : 'false' }} && '{{ old('form_type') }}' === 'register') {
      slider.style.transform = 'translateX(-33.33%)';
    } else {
      const savedSlide = localStorage.getItem('authSlide');
      if (savedSlide === 'register') {
        slider.style.transform = 'translateX(-33.33%)';
      } else if (savedSlide === 'forgot') {
        slider.style.transform = 'translateX(-66.66%)';
      } else {
        slider.style.transform = 'translateX(0%)';
      }
    }
  </script>

</x-guest-layout>
