@extends('layouts.landing')

@section('content')
<div class="relative min-h-screen bg-black text-white">
    <!-- Dashboard Content -->
    <div class="pb-12">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-down">
                    Welcome, <span class="text-red-600">{{ Auth::user()->name }}</span>
                </h1>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto animate-fade-in-up">
                    Manage your account, view your orders, and explore our latest collections.
                </p>
            </div>

            <!-- Dashboard Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div class="bg-gray-900 rounded-lg p-6 text-center animate-fade-in-up" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-4xl font-bold text-red-600 mb-2">0</div>
                    <h3 class="text-xl font-semibold mb-2">Orders</h3>
                    <p class="text-gray-400">View your purchase history</p>
                </div>
                
                <div class="bg-gray-900 rounded-lg p-6 text-center animate-fade-in-up" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl font-bold text-red-600 mb-2">0</div>
                    <h3 class="text-xl font-semibold mb-2">Wishlist</h3>
                    <p class="text-gray-400">Your favorite items</p>
                </div>
                
                <div class="bg-gray-900 rounded-lg p-6 text-center animate-fade-in-up" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-4xl font-bold text-red-600 mb-2">1</div>
                    <h3 class="text-xl font-semibold mb-2">Account</h3>
                    <p class="text-gray-400">Manage your profile</p>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-gray-900 rounded-lg p-6 mb-16 animate-fade-in">
                <h2 class="text-3xl font-bold mb-6 text-center">Quick Actions</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="{{ route('profile.edit') }}" class="group block bg-black rounded-lg p-4 text-center hover:bg-red-600 transition duration-300">
                        <div class="text-xl mb-3 text-red-600 group-hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold mb-1 group-hover:text-white">Edit Profile</h3>
                        <p class="text-xs text-gray-400 group-hover:text-gray-200">Update your information</p>
                    </a>
                    
                    <a href="{{ route('products.index') }}" class="group block bg-black rounded-lg p-4 text-center hover:bg-red-600 transition duration-300">
                        <div class="text-xl mb-3 text-red-600 group-hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold mb-1 group-hover:text-white">Shop Now</h3>
                        <p class="text-xs text-gray-400 group-hover:text-gray-200">Browse collections</p>
                    </a>
                    
                    <a href="#" class="group block bg-black rounded-lg p-4 text-center hover:bg-red-600 transition duration-300">
                        <div class="text-xl mb-3 text-red-600 group-hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold mb-1 group-hover:text-white">My Wishlist</h3>
                        <p class="text-xs text-gray-400 group-hover:text-gray-200">View saved items</p>
                    </a>
                    
                    <a href="#" class="group block bg-black rounded-lg p-4 text-center hover:bg-red-600 transition duration-300">
                        <div class="text-xl mb-3 text-red-600 group-hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold mb-1 group-hover:text-white">Order History</h3>
                        <p class="text-xs text-gray-400 group-hover:text-gray-200">Track your orders</p>
                    </a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-gray-900 rounded-lg p-6 animate-fade-in">
                <h2 class="text-3xl font-bold mb-6 text-center">Recent Activity</h2>
                <div class="space-y-4">
                    <div class="flex items-center p-4 bg-black rounded-lg">
                        <div class="mr-4 text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Account Created</h3>
                            <p class="text-gray-400">Welcome to OXGN Fashion! Your account was successfully created.</p>
                        </div>
                        <div class="ml-auto text-gray-500">
                            {{ Auth::user()->created_at->format('M d, Y') }}
                        </div>
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
                    <p class="text-gray-400">
                        Urban fashion redefined. Premium quality streetwear for the modern lifestyle.
                    </p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Shop</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition">New Arrivals</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition">Best Sellers</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition">Sale</a></li>
                        <li><a href="#collections" class="text-gray-400 hover:text-white transition">Collections</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Contact Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Shipping Info</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Returns</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">FAQ</a></li>
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
                <p>&copy; {{ date('Y') }} OXGN FASHION. All rights reserved.</p>
            </div>
        </div>
    </footer>
</div>
@endsection