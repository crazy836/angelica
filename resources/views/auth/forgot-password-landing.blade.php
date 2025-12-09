@extends('layouts.auth')

@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-green-500" :status="session('status')" />
    
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-white">Forgot your password?</h2>
        <p class="mt-2 text-gray-300 text-sm">
            No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </p>
    </div>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-300 mb-1" />
            <x-text-input id="email" 
                          class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" 
                          type="email" 
                          name="email" 
                          value="{{ old('email') }}" 
                          required 
                          autofocus 
                          autocomplete="email" 
                          placeholder="Enter your email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="text-sm text-gray-400 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" 
               href="{{ route('login') }}">
                ← Back to login
            </a>

            <x-primary-button class="ms-3 px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>  
    </form>
@endsection