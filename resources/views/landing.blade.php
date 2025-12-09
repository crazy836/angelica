@extends('layouts.landing')

@section('content')
<div class="relative min-h-screen overflow-hidden">
    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center">
        <div class="absolute inset-0 z-0">
            <div class="bg-gradient-to-r from-black to-red-900 opacity-90 absolute inset-0"></div>
            <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                 alt="Fashion Hero" 
                 class="w-full h-full object-cover hero-image">
        </div>
        
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h1 class="hero-headline text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-6 tracking-tight animate-fade-in-down">
                <span class="block">OXGN</span>
                <span class="block mt-2 text-red-600">FASHION</span>
            </h1>
            <p class="hero-sub text-lg sm:text-xl md:text-2xl mb-8 md:mb-10 max-w-2xl mx-auto font-light animate-fade-in-up">
                Urban style meets high-end quality. Discover the latest trends in streetwear.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in">
                <a href="{{ route('products.index') }}" 
                   class="px-6 py-3 md:px-8 md:py-3 bg-red-600 text-white font-medium rounded-full hover:bg-red-700 transition duration-300 transform hover:scale-105 text-center">
                    Shop Now
                </a>
                <a href="#collections" 
                   class="px-6 py-3 md:px-8 md:py-3 bg-transparent border-2 border-white text-white font-medium rounded-full hover:bg-white hover:text-black transition duration-300 transform hover:scale-105 text-center">
                    View Collections
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 md:py-20 bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 animate-fade-in">Who We Are</h2>
                <p class="text-gray-400 max-w-3xl mx-auto text-base md:text-lg animate-fade-in-up">
                    OXGN Fashion is more than just clothing - we're a lifestyle brand that embodies the spirit of urban culture. 
                    Founded in 2020, we've been at the forefront of streetwear innovation, combining cutting-edge design with 
                    premium materials to create pieces that make a statement.
                </p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 md:gap-8">
                <div class="text-center p-5 md:p-6 bg-black rounded-lg animate-fade-in-up" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-4xl md:text-5xl font-bold text-red-600 mb-3 md:mb-4">500+</div>
                    <h3 class="text-lg md:text-xl font-semibold mb-2">Unique Designs</h3>
                    <p class="text-gray-400 text-sm md:text-base">From classic tees to limited edition pieces</p>
                </div>
                
                <div class="text-center p-5 md:p-6 bg-black rounded-lg animate-fade-in-up" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl md:text-5xl font-bold text-red-600 mb-3 md:mb-4">50K+</div>
                    <h3 class="text-lg md:text-xl font-semibold mb-2">Happy Customers</h3>
                    <p class="text-gray-400 text-sm md:text-base">Join our growing community worldwide</p>
                </div>
                
                <div class="text-center p-5 md:p-6 bg-black rounded-lg animate-fade-in-up" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-4xl md:text-5xl font-bold text-red-600 mb-3 md:mb-4">98%</div>
                    <h3 class="text-lg md:text-xl font-semibold mb-2">Satisfaction Rate</h3>
                    <p class="text-gray-400 text-sm md:text-base">Quality and service you can trust</p>
                </div>
            </div>
        </div>
    </section>

    <!-- New Collections Section -->
    <section id="collections" class="py-16 md:py-20 bg-black">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 md:mb-16 animate-fade-in">Our Latest Collections</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <!-- Collection 1 -->
                <div class="collection-card group overflow-hidden rounded-lg" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative overflow-hidden h-80 md:h-96">
                        <img src="https://images.unsplash.com/photo-1525507119028-ed4c629a60a3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" 
                             alt="Street Collection" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80"></div>
                        <div class="absolute bottom-0 left-0 p-5 md:p-6">
                            <h3 class="text-xl md:text-2xl font-bold text-white">Street Collection</h3>
                            <p class="text-gray-300 mt-2 text-sm md:text-base">Bold designs for the urban explorer</p>
                        </div>
                    </div>
                </div>

                <!-- Collection 2 -->
                <div class="collection-card group overflow-hidden rounded-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative overflow-hidden h-80 md:h-96">
                        <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" 
                             alt="Premium Collection" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80"></div>
                        <div class="absolute bottom-0 left-0 p-5 md:p-6">
                            <h3 class="text-xl md:text-2xl font-bold text-white">Premium Collection</h3>
                            <p class="text-gray-300 mt-2 text-sm md:text-base">Luxury materials with timeless style</p>
                        </div>
                    </div>
                </div>

                <!-- Collection 3 -->
                <div class="collection-card group overflow-hidden rounded-lg" data-aos="fade-up" data-aos-delay="300">
                    <div class="relative overflow-hidden h-80 md:h-96">
                        <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1680&q=80" 
                             alt="Limited Edition" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80"></div>
                        <div class="absolute bottom-0 left-0 p-5 md:p-6">
                            <h3 class="text-xl md:text-2xl font-bold text-white">Limited Edition</h3>
                            <p class="text-gray-300 mt-2 text-sm md:text-base">Exclusive pieces for collectors</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products Carousel -->
    <section id="shop" class="py-16 md:py-20 bg-black" role="region" aria-labelledby="featured-products-heading">
        <div class="container mx-auto px-4">
            <h2 id="featured-products-heading" class="text-3xl md:text-4xl lg:text-5xl font-bold text-center mb-12 md:mb-16 text-white">{{ __('Featured Products') }}</h2>
            
            <div class="text-center mb-10 md:mb-12">
                <p class="text-gray-400 max-w-2xl mx-auto text-base md:text-lg">
                    Discover our handpicked selection of premium urban fashion pieces.
                </p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                <!-- Product 1 -->
                <div class="product-card group overflow-hidden rounded-lg">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/Urban Street Tee.jpg') }}" 
                             alt="Urban Street Tee" loading="lazy" decoding="async"
                             class="w-full h-80 md:h-96 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="px-5 py-2 bg-white text-black font-medium rounded-full hover:bg-red-600 hover:text-white transition duration-300 text-sm md:text-base">
                                Quick View
                            </button>
                        </div>
                    </div>
                    <div class="p-4 bg-gray-900 text-white">
                        <h3 class="text-lg md:text-xl font-semibold">Urban Street Tee</h3>
                        <p class="text-gray-300 mt-1 text-sm">Premium Cotton</p>
                        <div class="flex justify-between items-center mt-3">
                            <span class="text-base md:text-lg font-bold text-white">$49.99</span>
                            <button class="text-red-600 hover:text-red-400 add-to-cart" data-product-id="1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="product-card group overflow-hidden rounded-lg">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/Designer Jacket.jpg') }}" 
                             alt="Designer Jacket" loading="lazy" decoding="async"
                             class="w-full h-80 md:h-96 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="px-5 py-2 bg-white text-black font-medium rounded-full hover:bg-red-600 hover:text-white transition duration-300 text-sm md:text-base">
                                Quick View
                            </button>
                        </div>
                    </div>
                    <div class="p-4 bg-gray-900 text-white">
                        <h3 class="text-lg md:text-xl font-semibold">Designer Jacket</h3>
                        <p class="text-gray-300 mt-1 text-sm">Limited Edition</p>
                        <div class="flex justify-between items-center mt-3">
                            <span class="text-base md:text-lg font-bold text-white">$129.99</span>
                            <button class="text-red-600 hover:text-red-400 add-to-cart" data-product-id="2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="product-card group overflow-hidden rounded-lg">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/Street Denim.jpg') }}" 
                             alt="Street Denim" loading="lazy" decoding="async"
                             class="w-full h-80 md:h-96 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="px-5 py-2 bg-white text-black font-medium rounded-full hover:bg-red-600 hover:text-white transition duration-300 text-sm md:text-base">
                                Quick View
                            </button>
                        </div>
                    </div>
                    <div class="p-4 bg-gray-900 text-white">
                        <h3 class="text-lg md:text-xl font-semibold">Street Denim</h3>
                        <p class="text-gray-300 mt-1 text-sm">Slim Fit</p>
                        <div class="flex justify-between items-center mt-3">
                            <span class="text-base md:text-lg font-bold text-white">$89.99</span>
                            <button class="text-red-600 hover:text-red-400 add-to-cart" data-product-id="3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="product-card group overflow-hidden rounded-lg">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/urban-sneakers.jpg') }}" 
                             alt="Urban Sneakers" loading="lazy" decoding="async"
                             class="w-full h-80 md:h-96 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="px-5 py-2 bg-white text-black font-medium rounded-full hover:bg-red-600 hover:text-white transition duration-300 text-sm md:text-base">
                                Quick View
                            </button>
                        </div>
                    </div>
                    <div class="p-4 bg-gray-900 text-white">
                        <h3 class="text-lg md:text-xl font-semibold">Urban Sneakers</h3>
                        <p class="text-gray-300 mt-1 text-sm">High Top</p>
                        <div class="flex justify-between items-center mt-3">
                            <span class="text-base md:text-lg font-bold text-white">$119.99</span>
                            <button class="text-red-600 hover:text-red-400 add-to-cart" data-product-id="4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Additional Products -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 mt-6 md:mt-8">
                <!-- Product 5 -->
                <div class="product-card group overflow-hidden rounded-lg">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/Casual Hoodie.jpg') }}" 
                             alt="Casual Hoodie" loading="lazy" decoding="async"
                             class="w-full h-80 md:h-96 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="px-5 py-2 bg-white text-black font-medium rounded-full hover:bg-red-600 hover:text-white transition duration-300 text-sm md:text-base">
                                Quick View
                            </button>
                        </div>
                    </div>
                    <div class="p-4 bg-gray-900 text-white">
                        <h3 class="text-lg md:text-xl font-semibold">Casual Hoodie</h3>
                        <p class="text-gray-300 mt-1 text-sm">Comfort Fit</p>
                        <div class="flex justify-between items-center mt-3">
                            <span class="text-base md:text-lg font-bold text-white">$79.99</span>
                            <button class="text-red-600 hover:text-red-400 add-to-cart" data-product-id="5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="product-card group overflow-hidden rounded-lg">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/Summer Shorts.jpg') }}" 
                             alt="Summer Shorts" loading="lazy" decoding="async"
                             class="w-full h-80 md:h-96 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="px-5 py-2 bg-white text-black font-medium rounded-full hover:bg-red-600 hover:text-white transition duration-300 text-sm md:text-base">
                                Quick View
                            </button>
                        </div>
                    </div>
                    <div class="p-4 bg-gray-900 text-white">
                        <h3 class="text-lg md:text-xl font-semibold">Summer Shorts</h3>
                        <p class="text-gray-300 mt-1 text-sm">Lightweight Fabric</p>
                        <div class="flex justify-between items-center mt-3">
                            <span class="text-base md:text-lg font-bold text-white">$39.99</span>
                            <button class="text-red-600 hover:text-red-400 add-to-cart" data-product-id="6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 7 -->
                <div class="product-card group overflow-hidden rounded-lg">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/Winter Beanie.webp') }}" 
                             alt="Winter Beanie" loading="lazy" decoding="async"
                             class="w-full h-80 md:h-96 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="px-5 py-2 bg-white text-black font-medium rounded-full hover:bg-red-600 hover:text-white transition duration-300 text-sm md:text-base">
                                Quick View
                            </button>
                        </div>
                    </div>
                    <div class="p-4 bg-gray-900 text-white">
                        <h3 class="text-lg md:text-xl font-semibold">Winter Beanie</h3>
                        <p class="text-gray-300 mt-1 text-sm">Warm Knit</p>
                        <div class="flex justify-between items-center mt-3">
                            <span class="text-base md:text-lg font-bold text-white">$29.99</span>
                            <button class="text-red-600 hover:text-red-400 add-to-cart" data-product-id="7">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 8 -->
                <div class="product-card group overflow-hidden rounded-lg">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/Sporty Tank Top.jpg') }}" 
                             alt="Sporty Tank Top" loading="lazy" decoding="async"
                             class="w-full h-80 md:h-96 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="px-5 py-2 bg-white text-black font-medium rounded-full hover:bg-red-600 hover:text-white transition duration-300 text-sm md:text-base">
                                Quick View
                            </button>
                        </div>
                    </div>
                    <div class="p-4 bg-gray-900 text-white">
                        <h3 class="text-lg md:text-xl font-semibold">Sporty Tank Top</h3>
                        <p class="text-gray-300 mt-1 text-sm">Moisture Wicking</p>
                        <div class="flex justify-between items-center mt-3">
                            <span class="text-base md:text-lg font-bold text-white">$34.99</span>
                            <button class="text-red-600 hover:text-red-400 add-to-cart" data-product-id="8">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 md:py-20 bg-gray-900">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 md:mb-16 animate-fade-in">What Our Customers Say</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-black p-5 md:p-6 rounded-lg animate-fade-in-up" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-4 text-sm md:text-base">
                        "The quality of OXGN Fashion products exceeded my expectations. The fit is perfect and the materials feel premium. 
                        I've become a loyal customer!"
                    </p>
                    <div class="flex items-center">
                        <div class="bg-gray-700 rounded-full w-10 h-10 flex items-center justify-center mr-3">
                            <span class="text-white font-bold text-sm">JD</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-white text-sm md:text-base">John Doe</h4>
                            <p class="text-gray-400 text-xs md:text-sm">Verified Customer</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-black p-5 md:p-6 rounded-lg animate-fade-in-up" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-4 text-sm md:text-base">
                        "Fast shipping and excellent customer service. The Street Collection pieces are my go-to for any casual outing. 
                        Highly recommend OXGN Fashion!"
                    </p>
                    <div class="flex items-center">
                        <div class="bg-gray-700 rounded-full w-10 h-10 flex items-center justify-center mr-3">
                            <span class="text-white font-bold text-sm">AS</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-white text-sm md:text-base">Alice Smith</h4>
                            <p class="text-gray-400 text-xs md:text-sm">Verified Customer</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-black p-5 md:p-6 rounded-lg animate-fade-in-up" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-4 text-sm md:text-base">
                        "The Limited Edition pieces are truly unique. I love how OXGN combines urban aesthetics with premium quality. 
                        Worth every penny!"
                    </p>
                    <div class="flex items-center">
                        <div class="bg-gray-700 rounded-full w-10 h-10 flex items-center justify-center mr-3">
                            <span class="text-white font-bold text-sm">MJ</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-white text-sm md:text-base">Michael Johnson</h4>
                            <p class="text-gray-400 text-xs md:text-sm">Verified Customer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Editorial Section -->
    <section class="py-16 md:py-20 bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-8 md:gap-12">
                <div class="lg:w-1/2" data-aos="fade-right">
                    <img src="https://images.unsplash.com/photo-1496747611176-843222e1e57c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2073&q=80" 
                         alt="Editorial" 
                         class="w-full rounded-lg shadow-2xl">
                </div>
                <div class="lg:w-1/2" data-aos="fade-left">
                    <h2 class="text-3xl md:text-4xl font-bold mb-5 md:mb-6">Urban Lifestyle Collection</h2>
                    <p class="text-gray-300 mb-5 md:mb-6 text-base md:text-lg leading-relaxed">
                        Our latest collection redefines urban fashion with bold designs and premium materials. 
                        Each piece is crafted to make a statement while ensuring comfort and durability.
                    </p>
                    <p class="text-gray-300 mb-6 md:mb-8 text-base md:text-lg leading-relaxed">
                        From the streets to the boardroom, our versatile pieces adapt to your lifestyle 
                        without compromising on style or quality. Experience the perfect blend of functionality 
                        and fashion with OXGN.
                    </p>
                    <a href="{{ route('products.index') }}" class="inline-block px-6 py-3 md:px-8 md:py-3 bg-red-600 text-white font-medium rounded-full hover:bg-red-700 transition duration-300 transform hover:scale-105 text-center">
                        Explore Collection
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Banner -->
    <section class="py-16 md:py-20 bg-gradient-to-r from-red-800 to-red-600">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-5 md:mb-6 animate-fade-in" data-aos="fade-up">Join Our Community</h2>
            <p class="text-base md:text-xl mb-8 md:mb-10 max-w-2xl mx-auto animate-fade-in-up" data-aos="fade-up" data-aos-delay="100">
                Subscribe to get exclusive offers, early access to sales, and new product announcements.
            </p>
            <div class="max-w-md mx-auto flex flex-col sm:flex-row gap-3 md:gap-4 animate-fade-in-up" data-aos="fade-up" data-aos-delay="200">
                <input type="email" placeholder="Your email address" class="flex-grow px-4 py-3 rounded-full text-black focus:outline-none focus:ring-2 focus:ring-white text-sm md:text-base">
                <button class="px-5 py-3 md:px-6 md:py-3 bg-black text-white font-medium rounded-full hover:bg-gray-800 transition duration-300 whitespace-nowrap text-sm md:text-base">
                    Subscribe
                </button>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add to cart functionality
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const productId = this.getAttribute('data-product-id');
                    
                    // Show loading state
                    const originalHTML = this.innerHTML;
                    this.innerHTML = '<svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
                    this.disabled = true;
                    
                    // Get CSRF token
                    const csrfToken = document.querySelector('meta[name="csrf-token"]');
                    if (!csrfToken) {
                        console.error('CSRF token not found');
                        alert('Error: CSRF token not found. Please refresh the page.');
                        this.innerHTML = originalHTML;
                        this.disabled = false;
                        return;
                    }
                    
                    // Send request to add to cart
                    fetch('/cart/add', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            quantity: 1
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Server responded with status ' + response.status);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            // Update cart count in header
                            const cartCounts = document.querySelectorAll('.cart-count');
                            cartCounts.forEach(cartCount => {
                                cartCount.textContent = data.cart_count;
                            });
                            
                            window.location.href = '{{ route('cart.index') }}';
                        } else {
                            alert('Failed to add product to cart: ' + (data.message || 'Unknown error'));
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        if (error instanceof TypeError) {
                            alert('Network error: Unable to connect to the server. Please check your internet connection.');
                        } else {
                            alert('An error occurred while adding the product to cart: ' + error.message);
                        }
                    })
                    .finally(() => {
                        // Restore button state
                        this.innerHTML = originalHTML;
                        this.disabled = false;
                    });
                });
            });
        });
    </script>
    
    <!-- Footer -->
    <footer id="contact" class="bg-black py-12 border-t border-gray-800">
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
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition text-sm md:text-base">Collections</a></li>
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
