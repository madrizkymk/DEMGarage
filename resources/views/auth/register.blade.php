{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<x-guest-layout>
    <div class="flex min-h-screen">
        {{-- Bagian kiri: Welcome Back --}}
        <div class="w-1/2 bg-gray-100 flex flex-col justify-center items-center rounded-r-[4rem]">
            <h2 class="text-2xl font-bold mb-2">Welcome Back!</h2>
            <p class="text-gray-600 mb-6 text-center px-6">
                If you already have an account login here and go to journey
            </p>
            <a href="{{ route('login') }}"
                class="bg-gray-400 text-white px-10 py-2 rounded-md font-semibold hover:bg-gray-500 transition">
                Login
            </a>
        </div>

        {{-- Bagian kanan: Form Registrasi --}}
        <div class="w-1/2 flex flex-col justify-center items-center bg-white px-10">
            <h2 class="text-2xl font-bold mb-6">Registration</h2>

            <form method="POST" action="{{ route('register') }}" class="w-full max-w-sm">
                @csrf

                {{-- Name --}}
                <div class="mb-4 relative">
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full pl-10 pr-4 py-2 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-black"
                        placeholder="Name" />
                    <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                        <x-heroicon-o-user class="w-5 h-5" />
                    </span>
                </div>

                {{-- Email --}}
                <div class="mb-4 relative">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="w-full pl-10 pr-4 py-2 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-black"
                        placeholder="Email" />
                    <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                        <x-heroicon-o-envelope class="w-5 h-5" />
                    </span>
                </div>

                {{-- Password --}}
                <div class="mb-4 relative">
                    <input id="password" type="password" name="password" required
                        class="w-full pl-10 pr-4 py-2 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-black"
                        placeholder="Password" />
                    <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                        <x-heroicon-o-lock-closed class="w-5 h-5" />
                    </span>
                </div>

                {{-- Confirm Password --}}
                <div class="mb-6 relative">
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full pl-10 pr-4 py-2 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-black"
                        placeholder="Confirm Password" />
                    <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                        <x-heroicon-o-lock-closed class="w-5 h-5" />
                    </span>
                </div>

                {{-- Tombol Register --}}
                <button type="submit"
                    class="w-full bg-black text-white py-2 rounded-md font-semibold hover:bg-gray-800 transition">
                    Register
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
