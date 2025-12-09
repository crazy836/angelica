@extends('layouts.landing')

@section('content')
<div class="relative min-h-screen bg-black text-white pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 md:py-32 bg-gradient-to-r from-black to-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fade-in-down">
                    Get In <span class="text-red-600">Touch</span>
                </h1>
                <p class="text-xl text-gray-300 mb-8 animate-fade-in-up">
                    We'd love to hear from you. Reach out to our team for any inquiries.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="py-20 bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Information -->
                <div data-aos="fade-right">
                    <h2 class="text-3xl md:text-4xl font-bold mb-8">Contact Information</h2>
                    
                    <div class="space-y-8">
                        <!-- Address -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-red-600 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-2">Our Location</h3>
                                <p class="text-gray-300">
                                    123 Fashion Street<br>
                                    New York, NY 10001<br>
                                    United States
                                </p>
                            </div>
                        </div>
                        
                        <!-- Phone -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-red-600 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-2">Phone Number</h3>
                                <p class="text-gray-300">
                                    +1 (555) 123-4567<br>
                                    Mon-Fri, 9:00 AM - 6:00 PM EST
                                </p>
                            </div>
                        </div>
                        
                        <!-- Email -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-red-600 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-2">Email Address</h3>
                                <p class="text-gray-300">
                                    support@oxgnfashion.com<br>
                                    orders@oxgnfashion.com
                                </p>
                            </div>
                        </div>
                        
                        <!-- Social Media -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-red-600 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-2">Follow Us</h3>
                                <div class="flex space-x-4 mt-2">
                                    <a href="#" class="text-gray-300 hover:text-white transition">
                                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="text-gray-300 hover:text-white transition">
                                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="text-gray-300 hover:text-white transition">
                                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C6.477 2 2 6.477 2 12c0 5.523 4.477 10 10 10s10-4.477 10-10c0-5.523-4.477-10-10-10zm0 18c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8zm-2-12c-1.105 0-2 .895-2 2s.895 2 2 2 2-.895 2-2-.895-2-2-2zm4 8H8v-1c0-1.324 1.945-2 4-2s4 .676 4 2v1z"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="text-gray-300 hover:text-white transition">
                                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.097.118.112.222.085.343-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.164-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="bg-black p-8 rounded-lg shadow-xl" data-aos="fade-left">
                    <h2 class="text-3xl md:text-4xl font-bold mb-8">Send us a Message</h2>
                    
                    <form>
                        <div class="mb-6">
                            <label for="name" class="block text-gray-300 mb-2">Full Name</label>
                            <input type="text" id="name" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600 text-white" placeholder="Enter your name">
                        </div>
                        
                        <div class="mb-6">
                            <label for="email" class="block text-gray-300 mb-2">Email Address</label>
                            <input type="email" id="email" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600 text-white" placeholder="Enter your email">
                        </div>
                        
                        <div class="mb-6">
                            <label for="subject" class="block text-gray-300 mb-2">Subject</label>
                            <input type="text" id="subject" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600 text-white" placeholder="Enter subject">
                        </div>
                        
                        <div class="mb-6">
                            <label for="message" class="block text-gray-300 mb-2">Message</label>
                            <textarea id="message" rows="5" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600 text-white" placeholder="Enter your message"></textarea>
                        </div>
                        
                        <button type="submit" class="w-full px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition duration-300 transform hover:scale-105">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-20 bg-black">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Find Us</h2>
                <p class="text-gray-400 max-w-2xl mx-auto text-lg">
                    Visit our flagship store in the heart of the fashion district
                </p>
            </div>
            
            <div class="rounded-lg overflow-hidden shadow-2xl">
                <div class="bg-gray-800 h-96 flex items-center justify-center">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                        </svg>
                        <p class="text-gray-400">Interactive Map Placeholder</p>
                        <p class="text-gray-500 text-sm mt-2">123 Fashion Street, New York, NY 10001</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Frequently Asked Questions</h2>
                <p class="text-gray-400 max-w-2xl mx-auto text-lg">
                    Quick answers to common questions
                </p>
            </div>
            
            <div class="max-w-3xl mx-auto space-y-6">
                <div class="bg-black rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-2">How long does shipping take?</h3>
                    <p class="text-gray-300">
                        Standard shipping takes 3-5 business days within the US, and 7-14 business days internationally. Express shipping options are available at checkout.
                    </p>
                </div>
                
                <div class="bg-black rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-2">What is your return policy?</h3>
                    <p class="text-gray-300">
                        We offer a 30-day return policy on all unworn items with original tags attached. Items must be in resalable condition. Visit our Returns page for detailed instructions.
                    </p>
                </div>
                
                <div class="bg-black rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-2">Do you offer international shipping?</h3>
                    <p class="text-gray-300">
                        Yes, we ship to over 50 countries worldwide. International shipping rates and delivery times vary by destination. Customs duties and taxes may apply.
                    </p>
                </div>
                
                <div class="bg-black rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-2">How can I track my order?</h3>
                    <p class="text-gray-300">
                        Once your order ships, you'll receive a confirmation email with tracking information. You can also log into your account to view order status and tracking details.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-red-800 to-red-600">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Need Immediate Assistance?</h2>
            <p class="text-xl mb-10 max-w-2xl mx-auto">
                Chat with our customer service team or call us directly
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#" class="px-8 py-3 bg-black text-white font-medium rounded-full hover:bg-gray-800 transition duration-300 transform hover:scale-105">
                    Live Chat
                </a>
                <a href="tel:+15551234567" class="px-8 py-3 bg-white text-black font-medium rounded-full hover:bg-gray-100 transition duration-300 transform hover:scale-105">
                    Call Now: +1 (555) 123-4567
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