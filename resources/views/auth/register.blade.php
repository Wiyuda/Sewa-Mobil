<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Status Error --}}
        @if (session('messageError'))
            <p class="text-red-600 dark:text-red-400 mt-2 mb-3 text-center">{{ session('messageError') }}</p>
        @endif

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- SIM -->
        <div class="mt-4">
            <x-input-label for="sim" :value="__('SIM')" />
            <x-text-input id="sim" class="block mt-1 w-full" type="number" name="sim" :value="old('sim')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('sim')" class="mt-2" />
        </div>

        <!-- No. Hanphone -->
        <div class="mt-4">
            <x-input-label for="no_telp" :value="__('No.Hanphone')" />
            <x-text-input id="no_telp" class="block mt-1 w-full" type="number" name="no_telp" :value="old('no_telp')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
        </div>

        <!-- Alamat -->
        <div class="mt-4">
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-textarea id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
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
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
