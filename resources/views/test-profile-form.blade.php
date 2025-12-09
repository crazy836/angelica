@extends('layouts.landing')

@section('content')
<div class="min-h-screen bg-black text-white py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold mb-8 text-center">Profile Form Test</h1>
            
            <div class="bg-gray-900 rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">Profile Information</h2>
                
                <form method="post" action="{{ route('profile.update') }}" class="space-y-6" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    
                    <!-- Profile Picture Upload Section -->
                    <div class="bg-gray-800 rounded-lg p-4">
                        <label for="avatar" class="block text-sm font-medium text-gray-300 mb-2">Profile Picture</label>
                        <div class="flex items-center space-x-4">
                            <input id="avatar" name="avatar" type="file" class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-lg file:border-0
                                file:text-sm file:font-semibold
                                file:bg-red-600 file:text-white
                                hover:file:bg-red-700" />
                            
                            <div class="flex-shrink-0">
                                <div id="avatar-preview-container" class="w-16 h-16 rounded-full bg-gray-600 flex items-center justify-center text-gray-400">
                                    @if(Auth::user()->profile_photo_path)
                                        <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}?v={{ time() }}" alt="Profile Picture" class="w-16 h-16 rounded-full object-cover">
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Name</label>
                        <input id="name" name="name" type="text" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" value="{{ old('name', Auth::user()->name) }}" required autofocus />
                    </div>
                    
                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                        <input id="email" name="email" type="email" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" value="{{ old('email', Auth::user()->email) }}" required />
                        
                        @if (Auth::user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! Auth::user()->hasVerifiedEmail())
                            <div class="mt-2">
                                <p class="text-sm text-gray-400">
                                    Your email address is unverified.
                                    <button form="send-verification" class="text-sm text-red-600 hover:text-red-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        Click here to re-send the verification email.
                                    </button>
                                </p>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Birthdate Field -->
                    <div>
                        <label for="birthdate" class="block text-sm font-medium text-gray-300 mb-1">Birthdate</label>
                        <input id="birthdate" name="birthdate" type="date" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" value="{{ old('birthdate', Auth::user()->birthdate) }}" />
                    </div>
                    
                    <!-- Save Button -->
                    <div class="flex items-center gap-4">
                        <button type="submit" class="px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection