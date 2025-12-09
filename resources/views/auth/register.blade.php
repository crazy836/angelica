@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="block text-sm font-medium text-gray-300 mb-1" />
            <x-text-input id="name" 
                          class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" 
                          type="text" 
                          name="name" 
                          value="{{ old('name') }}" 
                          required 
                          autofocus 
                          autocomplete="name" 
                          placeholder="Enter your full name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-300 mb-1" />
            <x-text-input id="email" 
                          class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" 
                          type="email" 
                          name="email" 
                          value="{{ old('email') }}" 
                          required 
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
                              autocomplete="new-password" 
                              placeholder="Create a strong password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block text-sm font-medium text-gray-300 mb-1" />
            <x-password-input id="password_confirmation" 
                              class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" 
                              type="password"
                              name="password_confirmation" 
                              required 
                              autocomplete="new-password" 
                              placeholder="Confirm your password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
        </div>

        <!-- reCAPTCHA -->
        @if(env('RECAPTCHA_SITE_KEY') && strlen(env('RECAPTCHA_SITE_KEY')) > 10)
            <div class="mt-4">
                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                @if ($errors->has('g-recaptcha-response'))
                    <span class="text-red-500 text-sm mt-2 block">{{ $errors->first('g-recaptcha-response') }}</span>
                @endif
            </div>
        @endif

        <div class="flex flex-col sm:flex-row items-center justify-between mt-6 gap-4">
            <a class="text-sm text-red-600 hover:text-red-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" 
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 w-full sm:w-auto">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-6 text-center">
        <p class="text-gray-400 text-sm sm:text-base">
            By registering, you agree to our
            <a href="#" class="text-red-600 hover:text-red-500 font-medium transition duration-300">
                Terms of Service
            </a>
            and
            <a href="#" class="text-red-600 hover:text-red-500 font-medium transition duration-300">
                Privacy Policy
            </a>
        </p>
        
        <div class="mt-4 text-center">
            <p class="text-gray-400 text-sm sm:text-base">
                Already have an account?
                <a href="{{ route('login') }}" class="text-red-600 hover:text-red-500 font-medium transition duration-300">
                    Sign in
                </a>
            </p>
        </div>
    </div>
@endsection