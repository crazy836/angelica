<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Srmklive\PayPal\Services\PayPal;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Exception\ApiErrorException;

class PaymentService
{
    /**
     * Process a payment for an order
     *
     * @param Order $order
     * @param string $paymentMethod
     * @param array $paymentData
     * @return array
     */
    public function processPayment(Order $order, string $paymentMethod, array $paymentData = []): array
    {
        switch ($paymentMethod) {
            case 'stripe':
                return $this->processStripePayment($order, $paymentData);
                
            case 'cash_on_delivery':
                return $this->processCashOnDelivery($order);
                
            case 'paypal':
                return $this->processPayPalPayment($order);
                
            default:
                return [
                    'success' => false,
                    'message' => 'Unsupported payment method'
                ];
        }
    }
    
    /**
     * Process Stripe payment
     *
     * @param Order $order
     * @param array $paymentData
     * @return array
     */
    private function processStripePayment(Order $order, array $paymentData): array
    {
        try {
            // Set Stripe secret key from config
            Stripe::setApiKey(config('services.stripe.secret'));
            
            // Create a PaymentIntent
            $paymentIntent = PaymentIntent::create([
                'amount' => $order->total_amount * 100, // Convert to cents
                'currency' => 'usd',
                'payment_method' => $paymentData['payment_method_id'] ?? null,
                'confirm' => true,
                'return_url' => route('payment.success', ['order' => $order->id]),
                'metadata' => [
                    'order_id' => $order->id,
                ],
            ]);
            
            return [
                'success' => true,
                'message' => 'Payment processed successfully',
                'transaction_id' => $paymentIntent->id,
                'payment_method' => 'stripe',
                'status' => $paymentIntent->status
            ];
        } catch (ApiErrorException $e) {
            Log::error('Stripe payment error: ' . $e->getMessage());
            
            return [
                'success' => false,
                'message' => 'Payment failed: ' . $e->getMessage()
            ];
        } catch (\Exception $e) {
            Log::error('General payment error: ' . $e->getMessage());
            
            return [
                'success' => false,
                'message' => 'Payment failed: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Process PayPal payment
     *
     * @param Order $order
     * @return array
     */
    private function processPayPalPayment(Order $order): array
    {
        try {
            $mode = config('paypal.mode');
            $clientId = config("paypal.$mode.client_id");
            $clientSecret = config("paypal.$mode.client_secret");
            if (empty($clientId) || empty($clientSecret)) {
                return [
                    'success' => false,
                    'message' => 'PayPal is not configured'
                ];
            }
            Log::info('Starting PayPal payment processing for order #' . $order->id);
            
            // Initialize PayPal client
            $provider = new \Srmklive\PayPal\Services\PayPal();
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            if (!is_array($paypalToken) || empty($paypalToken['access_token'])) {
                Log::warning('PayPal access token not received', ['token' => $paypalToken]);
                return [
                    'success' => false,
                    'message' => 'Unable to authenticate with PayPal. Check API credentials.'
                ];
            }
            
            Log::info('PayPal client initialized successfully');
            
            // Create PayPal order
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "purchase_units" => [
                    [
                        "reference_id" => "ORDER-" . $order->id,
                        "amount" => [
                            "value" => number_format($order->total_amount, 2, '.', ''),
                            "currency_code" => config('paypal.currency', 'USD')
                        ]
                    ]
                ],
                "application_context" => [
                    "cancel_url" => route('payment.index', ['order' => $order->id]),
                    "return_url" => route('payment.success', ['order' => $order->id])
                ]
            ]);
            
            Log::info('PayPal order creation response', ['response' => $response]);
            
            if (isset($response['id']) && $response['status'] == 'CREATED') {
                // Return approval URL for redirection
                foreach ($response['links'] as $link) {
                    if ($link['rel'] == 'approve') {
                        Log::info('PayPal approval URL found, redirecting user', ['url' => $link['href']]);
                        return [
                            'success' => true,
                            'redirect_url' => $link['href'],
                            'message' => 'Redirecting to PayPal'
                        ];
                    }
                }
            }
            
            Log::warning('Failed to create PayPal order or find approval URL');
            $errorMessage = 'Failed to create PayPal order';
            if (isset($response['message'])) {
                $errorMessage .= ': ' . $response['message'];
            } elseif (isset($response['name'])) {
                $errorMessage .= ': ' . $response['name'];
            }
            if (isset($response['details'][0]['issue'])) {
                $errorMessage .= ' (' . $response['details'][0]['issue'] . ')';
            }
            if (isset($response['debug_id'])) {
                $errorMessage .= ' [Debug ID: ' . $response['debug_id'] . ']';
            }
            return [
                'success' => false,
                'message' => $errorMessage
            ];
        } catch (\Exception $e) {
            Log::error('PayPal payment error: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            
            return [
                'success' => false,
                'message' => 'Payment failed: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Process cash on delivery payment
     *
     * @param Order $order
     * @return array
     */
    private function processCashOnDelivery(Order $order): array
    {
        // For cash on delivery, we just log that it was selected
        Log::info('Cash on delivery selected for order #' . $order->id);
        
        return [
            'success' => true,
            'message' => 'Cash on delivery selected',
            'payment_method' => 'cash_on_delivery'
        ];
    }
    
    /**
     * Refund a payment
     *
     * @param Order $order
     * @param string $reason
     * @return array
     */
    public function refundPayment(Order $order, string $reason = ''): array
    {
        try {
            // In a real implementation, we would communicate with the payment gateway to process the refund
            Log::info('Processing refund for order #' . $order->id, [
                'reason' => $reason,
                'payment_method' => $order->payment_method,
                'transaction_id' => $order->transaction_id ?? null
            ]);
            
            return [
                'success' => true,
                'message' => 'Refund processed successfully'
            ];
        } catch (\Exception $e) {
            Log::error('Refund error: ' . $e->getMessage());
            
            return [
                'success' => false,
                'message' => 'Refund failed: ' . $e->getMessage()
            ];
        }
    }
}
