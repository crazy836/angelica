<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $cartService;
    protected $orderService;
    
    public function __construct(CartService $cartService, OrderService $orderService)
    {
        $this->cartService = $cartService;
        $this->orderService = $orderService;
    }
    
    public function index()
    {
        $items = $this->cartService->getItems();
        $total = $this->cartService->getTotal();
        
        // Redirect to cart if empty
        if ($items->count() === 0) {
            return redirect()->route('cart.index');
        }
        
        return view('checkout.index', compact('items', 'total'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|string',
            'phone' => 'required|string',
        ]);
        
        // Create shipping address string
        $shippingAddress = "{$request->name}\n{$request->address}\n{$request->city}, {$request->state} {$request->zip}\nPhone: {$request->phone}\nEmail: {$request->email}";
        
        // Create the order
        $order = $this->orderService->createOrder($shippingAddress);
        
        // Redirect to payment page
        return redirect()->route('payment.index', ['order' => $order->id]);
    }
}
