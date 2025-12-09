@extends('layouts.landing')

@section('content')
<div class="relative min-h-screen bg-black text-white">
    <!-- Profile Content -->
    <div class="pb-12">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8 md:mb-12">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 md:mb-6 animate-fade-in-down">
                    Edit Profile
                </h1>
                <p class="text-base md:text-xl text-gray-400 max-w-2xl mx-auto animate-fade-in-up">
                    Update your account information and password
                </p>
            </div>

            <div class="max-w-4xl mx-auto space-y-6 md:space-y-8">
                <div class="bg-gray-900 rounded-lg p-5 md:p-6 animate-fade-in">
                    <h2 class="text-xl md:text-2xl font-bold mb-5 md:mb-6">Profile Information</h2>
                    <div class="max-w-2xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="bg-gray-900 rounded-lg p-5 md:p-6 animate-fade-in">
                    <h2 class="text-xl md:text-2xl font-bold mb-5 md:mb-6">Update Password</h2>
                    <div class="max-w-2xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="bg-gray-900 rounded-lg p-5 md:p-6 animate-fade-in">
                    <h2 class="text-xl md:text-2xl font-bold mb-5 md:mb-6">Delete Account</h2>
                    <div class="max-w-2xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-black py-8 border-t border-gray-800 mt-auto">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-2xl font-bold mb-4">OXGN<span class="text-red-600">FASHION</span></h3>
                    <p class="text-gray-400 text-sm md:text-base">
                        Urban fashion redefined. Premium quality streetwear for the modern lifestyle.
                    </p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Shop</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition text-sm md:text-base">New Arrivals</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition text-sm md:text-base">Best Sellers</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition text-sm md:text-base">Sale</a></li>
                        <li><a href="#collections" class="text-gray-400 hover:text-white transition text-sm md:text-base">Collections</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition text-sm md:text-base">Contact Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition text-sm md:text-base">Shipping Info</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition text-sm md:text-base">Returns</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition text-sm md:text-base">FAQ</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Connect</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.477 2 2 6.477 2 12c0 5.523 4.477 10 10 10s10-4.477 10-10c0-5.523-4.477-10-10-10zm0 18c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8zm-2-12c-1.105 0-2 .895-2 2s.895 2 2 2 2-.895 2-2-.895-2-2-2zm4 8H8v-1c0-1.324 1.945-2 4-2s4 .676 4 2v1z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p class="text-sm md:text-base">&copy; {{ date('Y') }} OXGN FASHION. All rights reserved.</p>
            </div>
        </div>
    </footer>
</div>
@endsection