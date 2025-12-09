@extends('layouts.landing')

@section('content')
<div class="relative min-h-screen bg-black text-white pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 md:py-32 bg-gradient-to-r from-black to-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fade-in-down">
                    About <span class="text-red-600">OXGN</span>FASHION
                </h1>
                <p class="text-xl text-gray-300 mb-8 animate-fade-in-up">
                    Redefining urban fashion with premium quality streetwear
                </p>
            </div>
        </div>
    </section>

    <!-- Story Section -->
    <section class="py-20 bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">Our Story</h2>
                    <p class="text-gray-300 text-lg mb-6">
                        Founded in 2020, OXGN Fashion emerged from a passion for urban culture and a desire to create clothing that speaks to the modern streetwear enthusiast. What started as a small venture in a garage has grown into a globally recognized brand that defines contemporary urban fashion.
                    </p>
                    <p class="text-gray-300 text-lg mb-6">
                        Our journey began with a simple vision: to blend cutting-edge design with premium materials, creating pieces that not only look good but feel exceptional. We believe that fashion is a form of self-expression, and our collections are designed to empower individuals to showcase their unique style.
                    </p>
                    <p class="text-gray-300 text-lg">
                        Today, OXGN Fashion continues to push boundaries in streetwear innovation, staying true to our roots while embracing the future of fashion technology and sustainable practices.
                    </p>
                </div>
                <div class="relative" data-aos="fade-left">
                    <div class="relative rounded-lg overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1525507119028-ed4c629a60a3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="OXGN Fashion Studio" class="w-full h-auto">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-70"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="py-20 bg-black">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Mission & Vision</h2>
                <p class="text-gray-400 max-w-2xl mx-auto text-lg">
                    Driving innovation in urban fashion while staying connected to our community
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-gray-900 p-8 rounded-lg" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-red-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Our Mission</h3>
                    <p class="text-gray-300">
                        To create innovative, high-quality streetwear that empowers individuals to express their authentic selves while fostering a community that celebrates urban culture and creativity.
                    </p>
                </div>
                
                <div class="bg-gray-900 p-8 rounded-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-red-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Our Vision</h3>
                    <p class="text-gray-300">
                        To become the leading global brand in urban fashion, recognized for our commitment to quality, innovation, and sustainability while continuously pushing the boundaries of streetwear design.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">By The Numbers</h2>
                <p class="text-gray-400 max-w-2xl mx-auto text-lg">
                    Our growth and impact in the urban fashion industry
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="text-center p-6 bg-black rounded-lg" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-5xl font-bold text-red-600 mb-4">500+</div>
                    <h3 class="text-xl font-semibold mb-2">Unique Designs</h3>
                    <p class="text-gray-400">From classic tees to limited edition pieces</p>
                </div>
                
                <div class="text-center p-6 bg-black rounded-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-5xl font-bold text-red-600 mb-4">50K+</div>
                    <h3 class="text-xl font-semibold mb-2">Happy Customers</h3>
                    <p class="text-gray-400">Join our growing community worldwide</p>
                </div>
                
                <div class="text-center p-6 bg-black rounded-lg" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-5xl font-bold text-red-600 mb-4">98%</div>
                    <h3 class="text-xl font-semibold mb-2">Satisfaction Rate</h3>
                    <p class="text-gray-400">Quality and service you can trust</p>
                </div>
                
                <div class="text-center p-6 bg-black rounded-lg" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-5xl font-bold text-red-600 mb-4">25+</div>
                    <h3 class="text-xl font-semibold mb-2">Countries Served</h3>
                    <p class="text-gray-400">Global presence and reach</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 bg-black">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Our Leadership</h2>
                <p class="text-gray-400 max-w-2xl mx-auto text-lg">
                    The passionate team behind OXGN Fashion
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mx-auto max-w-2xl">
                <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative mx-auto mb-6 w-48 h-48 rounded-full overflow-hidden border-4 border-red-600">
                        <img src="{{ asset('images/Angelica F. Monces  (Laroya).png') }}" alt="Alex Morgan" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-2xl font-bold">Angelica F. Monces  (Laroya)</h3>
                    <p class="text-red-600 mb-2"></p>
                    <p class="text-gray-400">
                        Visionary leader with years in fashion retail and brand development.
                    </p>
                </div>
                
                <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative mx-auto mb-6 w-48 h-48 rounded-full overflow-hidden border-4 border-red-600">
                        <img src="{{ asset('images/Veronica Ann  (Nica).png') }}" alt="Veronica Ann (Nica)" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-2xl font-bold">Veronica Ann (Nica)</h3>
                    <p class="text-red-600 mb-2"></p>
                    <p class="text-gray-400">
                        Designer specializing in urban streetwear aesthetics.
                    </p>
                </div>
                

            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-20 bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Our Core Values</h2>
                <p class="text-gray-400 max-w-2xl mx-auto text-lg">
                    Principles that guide everything we do
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-black p-6 rounded-lg" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-red-600 text-2xl font-bold mb-4">01</div>
                    <h3 class="text-xl font-bold mb-3">Innovation</h3>
                    <p class="text-gray-400">
                        Constantly pushing boundaries in design and materials to stay ahead of trends.
                    </p>
                </div>
                
                <div class="bg-black p-6 rounded-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-red-600 text-2xl font-bold mb-4">02</div>
                    <h3 class="text-xl font-bold mb-3">Quality</h3>
                    <p class="text-gray-400">
                        Uncompromising standards in every stitch, seam, and detail of our garments.
                    </p>
                </div>
                
                <div class="bg-black p-6 rounded-lg" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-red-600 text-2xl font-bold mb-4">03</div>
                    <h3 class="text-xl font-bold mb-3">Authenticity</h3>
                    <p class="text-gray-400">
                        Staying true to urban culture while respecting our customers' individuality.
                    </p>
                </div>
                
                <div class="bg-black p-6 rounded-lg" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-red-600 text-2xl font-bold mb-4">04</div>
                    <h3 class="text-xl font-bold mb-3">Sustainability</h3>
                    <p class="text-gray-400">
                        Committed to eco-friendly practices and responsible manufacturing processes.
                    </p>
                </div>
                
                <div class="bg-black p-6 rounded-lg" data-aos="fade-up" data-aos-delay="500">
                    <div class="text-red-600 text-2xl font-bold mb-4">05</div>
                    <h3 class="text-xl font-bold mb-3">Community</h3>
                    <p class="text-gray-400">
                        Building connections and supporting the urban culture community worldwide.
                    </p>
                </div>
                
                <div class="bg-black p-6 rounded-lg" data-aos="fade-up" data-aos-delay="600">
                    <div class="text-red-600 text-2xl font-bold mb-4">06</div>
                    <h3 class="text-xl font-bold mb-3">Excellence</h3>
                    <p class="text-gray-400">
                        Striving for perfection in customer service, product quality, and brand experience.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-red-800 to-red-600">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Join Our Journey</h2>
            <p class="text-xl mb-10 max-w-2xl mx-auto">
                Be part of the OXGN Fashion movement and experience urban style redefined.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('shop') }}" class="px-8 py-3 bg-black text-white font-medium rounded-full hover:bg-gray-800 transition duration-300 transform hover:scale-105">
                    Shop Collection
                </a>
                <a href="{{ route('landing') }}#contact" class="px-8 py-3 bg-white text-black font-medium rounded-full hover:bg-gray-100 transition duration-300 transform hover:scale-105">
                    Contact Us
                </a>
            </div>
        </div>
    </section>

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
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition">Collections</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition">Contact Us</a></li>
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