@extends('layouts.auth')

@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-green-500" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-300 mb-1" />
            <x-text-input id="email" 
                          class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" 
                          type="email" 
                          name="email" 
                          value="{{ old('email') }}" 
                          required 
                          autofocus 
                          autocomplete="email" 
                          placeholder="Enter your email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-300 mb-1" />
            <x-password-input id="password" 
                              class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" 
                              type="password"
                              name="password"
                              required 
                              autocomplete="current-password" 
                              placeholder="Enter your password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" 
                       type="checkbox" 
                       class="rounded border-gray-600 bg-gray-700 text-red-600 shadow-sm focus:ring-red-500 focus:ring-offset-gray-800"
                       name="remember">
                <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-between mt-6 gap-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-red-600 hover:text-red-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 order-2 sm:order-1" 
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 w-full sm:w-auto order-1 sm:order-2">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-6 text-center">
        <p class="text-gray-400 text-sm sm:text-base">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-red-600 hover:text-red-500 font-medium transition duration-300">
                Register here
            </a>
        </p>
    </div>
@endsection