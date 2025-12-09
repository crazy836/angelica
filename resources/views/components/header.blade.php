<div x-data="{ open: false }" class="fixed top-0 left-0 right-0 z-50 py-4 bg-black shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between w-full">
            <!-- Logo -->
            <div>
                <a href="{{ route('landing') }}" class="text-2xl font-bold text-white">OXGN<span class="text-red-600">FASHION</span></a>
            </div>
            
            <!-- Desktop Navigation -->
            <div class="hidden md:flex md:items-center md:space-x-8">
                <nav class="flex space-x-6">
                    <a href="{{ route('landing') }}" class="text-white hover:text-[#C20404] transition duration-300 font-medium">Home</a>
                    <a href="{{ route('shop') }}" class="text-white hover:text-[#C20404] transition duration-300 font-medium">Shop</a>
                    <a href="{{ route('landing') }}#collections" class="text-white hover:text-[#C20404] transition duration-300 font-medium">Collections</a>
                    <a href="{{ route('about') }}" class="text-white hover:text-[#C20404] transition duration-300 font-medium">About</a>
                    <a href="{{ route('contact') }}" class="text-white hover:text-[#C20404] transition duration-300 font-medium">Contact</a>
                </nav>
            </div>
            
            <!-- Right section with cart, login/signup -->
            <div class="hidden md:flex md:items-center md:space-x-3">
                <!-- Cart Icon -->
                <a href="{{ route('cart.index') }}" class="relative text-white hover:text-[#C20404] transition duration-300">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    @php
                        try {
                            $cartCount = app(App\Services\CartService::class)->getItemCount();
                        } catch (Exception $e) {
                            $cartCount = 0;
                        }
                    @endphp
                    @if($cartCount > 0)
                        <span class="absolute -top-2 -right-2 bg-[#C20404] text-white text-xs rounded-full h-5 w-5 flex items-center justify-center cart-count">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
                
                @auth
                    <div class="relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-white hover:text-[#C20404] transition duration-300">
                                    @if(Auth::user()->profile_photo_path)
                                        <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" 
                                             class="w-8 h-8 rounded-full object-cover mr-2" alt="User Avatar">
                                    @else
                                        <span class="w-8 h-8 rounded-full bg-gray-700 flex items-center justify-center mr-2">
                                            <span class="text-white text-xs font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                        </span>
                                    @endif
                                    <span class="hidden lg:inline">{{ Auth::user()->name }}</span>
                                    <svg class="fill-current h-4 w-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('profile.orders')">
                                    {{ __('My Orders') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:text-[#C20404] transition duration-300 hidden lg:inline">Login</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-[#C20404] text-white font-bold rounded-full hover:bg-[#8C0000] transition duration-300 hidden lg:inline">Sign Up</a>
                @endauth
            </div>
            
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="text-white focus:outline-none">
                    <svg x-show="!open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div x-show="open" class="md:hidden mt-4 pb-4" x-cloak>
            <nav class="flex flex-col space-y-4">
                <a href="{{ route('landing') }}" class="text-white hover:text-[#C20404] transition duration-300 font-medium py-2">Home</a>
                <a href="{{ route('shop') }}" class="text-white hover:text-[#C20404] transition duration-300 font-medium py-2">Shop</a>
                <a href="{{ route('landing') }}#collections" class="text-white hover:text-[#C20404] transition duration-300 font-medium py-2">Collections</a>
                <a href="{{ route('about') }}" class="text-white hover:text-[#C20404] transition duration-300 font-medium py-2">About</a>
                <a href="{{ route('contact') }}" class="text-white hover:text-[#C20404] transition duration-300 font-medium py-2">Contact</a>
                
                <div class="pt-4 border-t border-gray-700">
                    <div class="flex items-center justify-between">
                        <!-- Cart Icon -->
                        <a href="{{ route('cart.index') }}" class="relative text-white hover:text-[#C20404] transition duration-300">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            @if($cartCount > 0)
                                <span class="absolute -top-2 -right-2 bg-[#C20404] text-white text-xs rounded-full h-5 w-5 flex items-center justify-center cart-count">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>
                        
                        @auth
                            <div class="flex items-center">
                                @if(Auth::user()->profile_photo_path)
                                    <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" 
                                         class="w-8 h-8 rounded-full object-cover mr-2" alt="User Avatar">
                                @else
                                    <span class="w-8 h-8 rounded-full bg-gray-700 flex items-center justify-center mr-2">
                                        <span class="text-white text-xs font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                    </span>
                                @endif
                                <span class="text-white">{{ Auth::user()->name }}</span>
                                
                                <!-- Mobile logout button -->
                                <form method="POST" action="{{ route('logout') }}" class="ml-4">
                                    @csrf
                                    <button type="submit" class="text-white hover:text-[#C20404] transition duration-300 text-sm">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="flex space-x-3">
                                <a href="{{ route('login') }}" class="text-white hover:text-[#C20404] transition duration-300">Login</a>
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-[#C20404] text-white font-bold rounded-full hover:bg-[#8C0000] transition duration-300">Sign Up</a>
                            </div>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>