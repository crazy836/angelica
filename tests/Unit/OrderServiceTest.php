<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\OrderService;
use App\Services\CartService;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $orderService;
    protected $cartService;
    protected $user;
    protected $product;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->cartService = app(CartService::class);
        $this->orderService = app(OrderService::class);
        $this->user = User::factory()->create();
        $category = Category::factory()->create();
        $this->product = Product::factory()->create([
            'category_id' => $category->id,
            'price' => 29.99,
            'stock' => 10
        ]);
    }

    /** @test */
    public function it_can_create_order_from_cart()
    {
        $this->actingAs($this->user);
        
        // Add product to cart
        $this->cartService->addItem($this->product->id, 2);
        
        // Create order
        $shippingAddress = "John Doe\n123 Main St\nNew York, NY 10001\nPhone: 123-456-7890\nEmail: john@example.com";
        $order = $this->orderService->createOrder($shippingAddress);
        
        $this->assertNotNull($order);
        $this->assertEquals($this->user->id, $order->user_id);
        $this->assertEquals(59.98, $order->total_amount);
        $this->assertEquals('pending', $order->status);
        $this->assertEquals('pending', $order->payment_status);
        
        // Check order items
        $this->assertCount(1, $order->items);
        $this->assertEquals($this->product->id, $order->items->first()->product_id);
        $this->assertEquals(2, $order->items->first()->quantity);
        $this->assertEquals(29.99, $order->items->first()->price);
        
        // Check product stock was reduced
        $this->product->refresh();
        $this->assertEquals(8, $this->product->stock);
        
        // Check cart was cleared
        $cartItems = $this->cartService->getItems();
        $this->assertCount(0, $cartItems);
    }

    /** @test */
    public function it_can_get_user_orders()
    {
        $this->actingAs($this->user);
        
        // Add product to cart
        $this->cartService->addItem($this->product->id, 1);
        
        // Create order
        $shippingAddress = "John Doe\n123 Main St\nNew York, NY 10001";
        $this->orderService->createOrder($shippingAddress);
        
        // Get user orders
        $orders = $this->orderService->getUserOrders();
        
        $this->assertCount(1, $orders);
        $this->assertEquals($this->user->id, $orders->first()->user_id);
    }

    /** @test */
    public function it_can_update_order_status()
    {
        $this->actingAs($this->user);
        
        // Add product to cart
        $this->cartService->addItem($this->product->id, 1);
        
        // Create order
        $shippingAddress = "John Doe\n123 Main St\nNew York, NY 10001";
        $order = $this->orderService->createOrder($shippingAddress);
        
        // Update order status
        $updatedOrder = $this->orderService->updateOrderStatus($order->id, 'processing');
        
        $this->assertEquals('processing', $updatedOrder->status);
    }

    /** @test */
    public function it_can_update_payment_status()
    {
        $this->actingAs($this->user);
        
        // Add product to cart
        $this->cartService->addItem($this->product->id, 1);
        
        // Create order
        $shippingAddress = "John Doe\n123 Main St\nNew York, NY 10001";
        $order = $this->orderService->createOrder($shippingAddress);
        
        // Update payment status
        $updatedOrder = $this->orderService->updatePaymentStatus($order->id, 'paid', 'stripe');
        
        $this->assertEquals('paid', $updatedOrder->payment_status);
        $this->assertEquals('stripe', $updatedOrder->payment_method);
    }
}