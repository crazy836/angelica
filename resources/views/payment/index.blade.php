@extends('layouts.landing')

@section('content')
<div class="relative min-h-screen bg-black text-white pt-20">
    <div class="pb-12">
        <div class="container mx-auto px-4">
            @if($errors->has('payment'))
                <div class="mb-6 bg-red-900 text-red-100 border border-red-700 rounded p-4">
                    {{ $errors->first('payment') }}
                </div>
            @endif
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-down">
                    Payment
                </h1>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto animate-fade-in-up">
                    Complete your purchase securely
                </p>
            </div>
            
            @php
                $paypalMode = config('paypal.mode');
                $paypalClientId = config('paypal.' . $paypalMode . '.client_id');
                $paypalConfigured = !empty($paypalClientId);
            @endphp
            <div class="max-w-3xl mx-auto">
                <div class="bg-gray-900 rounded-lg shadow-md overflow-hidden">
                    <div class="px-6 py-8">
                        <h2 class="text-2xl font-bold text-white mb-6">Order Summary</h2>
                        
                        <div class="mt-6">
                            <div class="flex justify-between text-base font-medium text-white">
                                <p>Order #{{ $order->id }}</p>
                                <p>${{ number_format($order->total_amount, 2) }}</p>
                            </div>
                            <p class="mt-1 text-sm text-gray-400">Status: {{ ucfirst($order->status) }}</p>
                            
                            <div class="mt-6">
                                <h3 class="text-lg font-medium text-white">Items</h3>
                                <ul class="mt-4 divide-y divide-gray-800">
                                    @foreach($order->items as $item)
                                        <li class="flex py-4">
                                            <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md border border-gray-700">
                                                @if($item->product->cover_image)
                                                    <img src="{{ asset('images/' . $item->product->cover_image) }}" alt="{{ $item->product->name }}" class="h-full w-full object-cover">
                                                @else
                                                    <div class="bg-gray-800 border-2 border-dashed border-gray-700 rounded-xl w-full h-full flex items-center justify-center">
                                                        <svg class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="ml-4 flex flex-1 flex-col">
                                                <div>
                                                    <div class="flex justify-between text-base font-medium text-white">
                                                        <h4>{{ $item->product->name }}</h4>
                                                        <p class="ml-4">${{ number_format($item->price * $item->quantity, 2) }}</p>
                                                    </div>
                                                    <p class="mt-1 text-sm text-gray-400">Qty {{ $item->quantity }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            
                            <div class="mt-6 border-t border-gray-800 pt-4">
                                <div class="flex justify-between text-xl font-bold text-white">
                                    <p>Total</p>
                                    <p>${{ number_format($order->total_amount, 2) }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-10">
                            <h2 class="text-2xl font-bold text-white mb-6">Payment Method</h2>
                            
                            <form id="payment-form" action="{{ route('payment.process') }}" method="POST" class="mt-6" data-paypal-configured="{{ $paypalConfigured ? '1' : '0' }}">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <input id="stripe" name="payment_method" type="radio" value="stripe" class="h-4 w-4 border-gray-300 text-red-600 focus:ring-red-500" checked>
                                        <label for="stripe" class="ml-3 block text-base font-medium text-white">Credit Card (Stripe)</label>
                                    </div>
                                    
                                    <!-- Stripe Card Element -->
                                    <div id="card-element-container" class="ml-7 p-4 border border-gray-700 rounded-md bg-gray-800 hidden">
                                        <div id="card-element"><!-- Stripe Elements will create form elements here --></div>
                                        <div id="card-errors" role="alert" class="text-red-400 text-sm mt-2"></div>
                                    </div>
                                    
                                    <div class="flex items-center">
                                        <input id="paypal" name="payment_method" type="radio" value="paypal" class="h-4 w-4 border-gray-300 text-red-600 focus:ring-red-500">
                                        <label for="paypal" class="ml-3 block text-base font-medium text-white">PayPal</label>
                                    </div>
                                    @if(!$paypalConfigured)
                                        <div class="mt-2 text-sm text-red-400">PayPal is not available: missing client credentials.</div>
                                    @endif
                                    
                                    <div class="flex items-center">
                                        <input id="cash-on-delivery" name="payment_method" type="radio" value="cash_on_delivery" class="h-4 w-4 border-gray-300 text-red-600 focus:ring-red-500">
                                        <label for="cash-on-delivery" class="ml-3 block text-base font-medium text-white">Cash on Delivery</label>
                                    </div>
                                </div>
                                
                                <div class="mt-10">
                                    <button id="submit-button" type="submit" class="w-full flex justify-center rounded-md border border-transparent bg-red-600 py-3 px-4 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition duration-300">
                                        Pay Now
                                    </button>
                                </div>
                            </form>
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
                        <li><a href="{{ route('shop') }}" class="text-gray-400 hover:text-white transition">New Arrivals</a></li>
                        <li><a href="{{ route('shop') }}" class="text-gray-400 hover:text-white transition">Best Sellers</a></li>
                        <li><a href="{{ route('shop') }}" class="text-gray-400 hover:text-white transition">Sale</a></li>
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

<!-- Include Stripe.js -->
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client
    var stripe = Stripe('{{ config("services.stripe.key") }}');
    
    // Create an instance of Elements
    var elements = stripe.elements();
    
    // Custom styling for the card element
    var style = {
        base: {
            color: '#fff',
            fontFamily: 'Arial, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: 'rgba(255,255,255,0.5)'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    
    // Create an instance of the card Element
    var card = elements.create('card', {style: style});
    
    // Add an instance of the card Element into the `card-element` <div>
    card.mount('#card-element');
    
    // Handle real-time validation errors from the card Element
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    
    // Handle form submission
    var form = document.getElementById('payment-form');
    var submitButton = document.getElementById('submit-button');
    
    // Toggle card element visibility based on payment method selection
    document.querySelectorAll('input[name="payment_method"]').forEach((elem) => {
        elem.addEventListener("change", function(event) {
            if (event.target.value === 'stripe') {
                document.getElementById('card-element-container').classList.remove('hidden');
            } else {
                document.getElementById('card-element-container').classList.add('hidden');
            }
        });
    });
    
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        // Check which payment method is selected
        var paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
        var paypalConfigured = document.getElementById('payment-form').getAttribute('data-paypal-configured') === '1';
        
        if (paymentMethod === 'stripe') {
            // Disable the submit button to prevent double clicks
            submitButton.disabled = true;
            submitButton.textContent = 'Processing...';
            
            // Create a payment method using the card Element
            stripe.createPaymentMethod({
                type: 'card',
                card: card,
            }).then(function(result) {
                if (result.error) {
                    // Show error to customer
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                    
                    // Re-enable the submit button
                    submitButton.disabled = false;
                    submitButton.textContent = 'Pay Now';
                } else {
                    // Add the payment method ID to the form
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'payment_method_id');
                    hiddenInput.setAttribute('value', result.paymentMethod.id);
                    form.appendChild(hiddenInput);
                    
                    // Submit the form
                    form.submit();
                }
            });
        } else if (paymentMethod === 'paypal') {
            if (!paypalConfigured) {
                alert('PayPal is not available. Please choose another payment method.');
                return;
            }
            // For PayPal, redirect to PayPal
            // Create a hidden form to submit to the PayPal processing route
            var paypalForm = document.createElement('form');
            paypalForm.method = 'POST';
            paypalForm.action = '{{ route('payment.process') }}';
            
            // Add CSRF token
            var csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            paypalForm.appendChild(csrfToken);
            
            // Add order ID
            var orderIdInput = document.createElement('input');
            orderIdInput.type = 'hidden';
            orderIdInput.name = 'order_id';
            orderIdInput.value = '{{ $order->id }}';
            paypalForm.appendChild(orderIdInput);
            
            // Add payment method
            var paymentMethodInput = document.createElement('input');
            paymentMethodInput.type = 'hidden';
            paymentMethodInput.name = 'payment_method';
            paymentMethodInput.value = 'paypal';
            paypalForm.appendChild(paymentMethodInput);
            
            // Append form to body and submit
            document.body.appendChild(paypalForm);
            paypalForm.submit();
        } else {
            // For other payment methods, just submit the form
            form.submit();
        }
    });
</script>
@endsection
