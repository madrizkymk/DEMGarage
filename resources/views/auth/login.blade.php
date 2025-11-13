{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<x-guest-layout>
    <div class="flex min-h-screen">
        {{-- Bagian kiri: Form Login --}}
        <div class="w-1/2 flex flex-col justify-center items-center bg-white px-10">
            <h2 class="text-2xl font-bold mb-6">Login</h2>

            {{-- Form Login --}}
            <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm">
                @csrf

                {{-- Email --}}
                <div class="mb-4 relative">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full pl-10 pr-4 py-2 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-black"
                        placeholder="Email" />
                    <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                        <x-heroicon-o-user class="w-5 h-5" />
                    </span>
                </div>

                {{-- Password --}}
                <div class="mb-2 relative">
                    <input id="password" type="password" name="password" required
                        class="w-full pl-10 pr-4 py-2 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-black"
                        placeholder="Password" />
                    <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                        <x-heroicon-o-lock-closed class="w-5 h-5" />
                    </span>
                </div>

                {{-- Forgot Password --}}
                <div class="flex justify-end mb-4">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-gray-500 hover:underline">
                            Forgot password?
                        </a>
                    @endif
                </div>

                {{-- Tombol Login --}}
                <button type="submit"
                    class="w-full bg-black text-white py-2 rounded-md font-semibold hover:bg-gray-800 transition">
                    Login
                </button>
            </form>
        </div>

        {{-- Bagian kanan: Welcome --}}
        <div class="w-1/2 bg-gray-100 flex flex-col justify-center items-center rounded-l-[4rem]">
            <h2 class="text-2xl font-bold mb-2">Hello, Welcome!</h2>
            <p class="text-gray-600 mb-6">Don’t have an account ?</p>
            <a href="{{ route('register') }}"
                class="bg-gray-400 text-white px-10 py-2 rounded-md font-semibold hover:bg-gray-500 transition">
                Register
            </a>
        </div>
    </div>
</x-guest-layout>
