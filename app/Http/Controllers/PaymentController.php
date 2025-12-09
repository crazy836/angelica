<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderService;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $orderService;
    protected $paymentService;
    
    public function __construct(OrderService $orderService, PaymentService $paymentService)
    {
        $this->orderService = $orderService;
        $this->paymentService = $paymentService;
    }
    
    public function index(Request $request)
    {
        $orderId = $request->query('order');
        $order = Order::findOrFail($orderId);
        
        // Ensure the order belongs to the authenticated user
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }
        
        return view('payment.index', compact('order'));
    }
    
    public function process(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_method' => 'required|in:stripe,cash_on_delivery,paypal',
            'payment_method_id' => 'nullable|required_if:payment_method,stripe|string',
        ]);
        
        $order = Order::findOrFail($request->order_id);
        
        // Ensure the order belongs to the authenticated user
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }
        
        // Prepare payment data
        $paymentData = [];
        if ($request->payment_method === 'stripe' && $request->payment_method_id) {
            $paymentData['payment_method_id'] = $request->payment_method_id;
        } elseif ($request->payment_method === 'paypal') {
            // PayPal-specific data can be added here if needed
            $paymentData['payment_method'] = 'paypal';
        }
        
        // Process payment
        $result = $this->paymentService->processPayment($order, $request->payment_method, $paymentData);
        
        Log::info('Payment processing result', ['method' => $request->payment_method, 'result' => $result]);
        
        if ($result['success']) {
            // Handle redirect for PayPal
            if ($request->payment_method === 'paypal' && isset($result['redirect_url'])) {
                Log::info('Redirecting to PayPal', ['url' => $result['redirect_url']]);
                return redirect()->away($result['redirect_url']);
            }
            
            // Update order status based on payment method
            if ($request->payment_method === 'stripe') {
                $this->orderService->updatePaymentStatus($order->id, 'paid', 'stripe');
                $this->orderService->updateOrderStatus($order->id, 'processing');
            } elseif ($request->payment_method === 'paypal') {
                $this->orderService->updatePaymentStatus($order->id, 'pending', 'paypal');
                $this->orderService->updateOrderStatus($order->id, 'processing');
            } elseif ($request->payment_method === 'cash_on_delivery') {
                $this->orderService->updatePaymentStatus($order->id, 'pending', 'cash_on_delivery');
                $this->orderService->updateOrderStatus($order->id, 'processing');
            }
            
            return redirect()->route('payment.success', ['order' => $order->id]);
        } else {
            return back()->withErrors(['payment' => $result['message']]);
        }
    }
    
    public function success(Request $request)
    {
        $orderId = $request->query('order');
        $order = Order::findOrFail($orderId);
        
        // Ensure the order belongs to the authenticated user
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }
        // If PayPal was used and we have a token, attempt to capture
        if ($order->payment_method === 'paypal') {
            $token = $request->query('token');
            if ($token) {
                try {
                    $provider = new \Srmklive\PayPal\Services\PayPal();
                    $provider->setApiCredentials(config('paypal'));
                    $provider->getAccessToken();
                    $capture = $provider->capturePaymentOrder($token);
                    if (isset($capture['status']) && $capture['status'] === 'COMPLETED') {
                        $this->orderService->updatePaymentStatus($order->id, 'paid', 'paypal');
                        $this->orderService->updateOrderStatus($order->id, 'processing');
                    }
                } catch (\Exception $e) {
                    \Log::error('PayPal capture error: '.$e->getMessage());
                }
            }
        }
        
        return view('payment.success', compact('order'));
    }
}
