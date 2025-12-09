<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OxgnFashion Admin') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- AOS CSS for animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="font-sans antialiased bg-gray-900">
    <div class="min-h-screen relative overflow-hidden">
        <!-- Background with overlay -->
        <div class="absolute inset-0 z-0">
            <div class="bg-gradient-to-r from-black to-red-900 opacity-90 absolute inset-0"></div>
            <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                 alt="Fashion Admin Background" 
                 class="w-full h-full object-cover">
        </div>
        
        <!-- Navigation -->
        <nav class="relative z-10 bg-black bg-opacity-80 backdrop-blur-sm shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold text-white">
                                OXGN<span class="text-red-600">FASHION</span> ADMIN
                            </a>
                        </div>
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="{{ route('admin.dashboard') }}" class="border-red-600 text-white inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Dashboard
                            </a>
                            <a href="{{ route('admin.products.index') }}" class="border-transparent text-gray-300 hover:border-gray-300 hover:text-white inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Products
                            </a>
                            <a href="{{ route('admin.orders.index') }}" class="border-transparent text-gray-300 hover:border-gray-300 hover:text-white inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Orders
                            </a>
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                        <div class="ml-3 relative">
                            <div class="flex items-center">
                                <div class="text-sm text-white mr-3">
                                    {{ Auth::user()->name }}
                                </div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="text-sm text-gray-300 hover:text-white transition duration-300">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="relative z-10 py-8">
            <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
                @if (session('success'))
                    <div class="mb-4 rounded-md bg-green-50 p-4 bg-opacity-90 backdrop-blur-sm">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800">
                                    {{ session('success') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
    
    <!-- AOS JS for animations -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>
</body>
</html>