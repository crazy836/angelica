@extends('layouts.auth')

@section('content')
<div class="max-w-md mx-auto">
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold text-white">Verify Your Account</h2>
        <p class="mt-2 text-gray-300">
            Please enter the 6-digit code sent to your email address
        </p>
    </div>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-500">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('otp.verify.post') }}">
        @csrf

        <!-- OTP Input -->
        <div>
            <x-input-label for="otp" :value="__('OTP Code')" class="block text-sm font-medium text-gray-300 mb-1" />
            <x-text-input id="otp" 
                          class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" 
                          type="text" 
                          name="otp" 
                          value="{{ old('otp') }}" 
                          required 
                          autofocus 
                          autocomplete="off" 
                          placeholder="Enter 6-digit code" 
                          maxlength="6" />
            <x-input-error :messages="$errors->get('otp')" class="mt-2 text-red-500 text-sm" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <div>
                <p class="text-sm text-gray-400">
                    Didn't receive the code?
                </p>
                <form method="POST" action="{{ route('otp.resend') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-sm text-red-600 hover:text-red-500 font-medium transition duration-300">
                        Resend OTP
                    </button>
                </form>
            </div>

            <x-primary-button class="px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                {{ __('Verify Account') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-6 text-center">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-gray-400 hover:text-white transition duration-300">
                Cancel and Logout
            </button>
        </form>
    </div>
</div>
@endsection