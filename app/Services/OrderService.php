<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    protected $cartService;
    
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    
    public function createOrder($shippingAddress, $billingAddress = null)
    {
        $cartItems = $this->cartService->getItems();
        $totalAmount = $this->cartService->getTotal();
        
        // Create the order
        $order = new Order([
            'user_id' => Auth::id(),
            'status' => 'pending',
            'total_amount' => $totalAmount,
            'shipping_address' => $shippingAddress,
            'billing_address' => $billingAddress ?? $shippingAddress,
            'payment_status' => 'pending',
        ]);
        
        $order->save();
        
        // Create order items
        foreach ($cartItems as $cartItem) {
            $orderItem = new OrderItem([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price,
            ]);
            
            $orderItem->save();
            
            // Update product stock
            $product = $cartItem->product;
            $product->stock -= $cartItem->quantity;
            $product->save();
        }
        
        // Clear the cart
        $this->cartService->clear();
        
        return $order;
    }
    
    public function getUserOrders()
    {
        return Order::where('user_id', Auth::id())
            ->with('items.product')
            ->latest()
            ->get();
    }
    
    public function getOrderById($orderId)
    {
        return Order::where('id', $orderId)
            ->where('user_id', Auth::id())
            ->with('items.product')
            ->firstOrFail();
    }
    
    public function updateOrderStatus($orderId, $status)
    {
        $order = Order::findOrFail($orderId);
        $order->status = $status;
        $order->save();
        
        return $order;
    }
    
    public function updatePaymentStatus($orderId, $paymentStatus, $paymentMethod = null)
    {
        $order = Order::findOrFail($orderId);
        $order->payment_status = $paymentStatus;
        
        if ($paymentMethod) {
            $order->payment_method = $paymentMethod;
        }
        
        $order->save();
        
        return $order;
    }
}