<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\CartService;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $cartService;
    protected $user;
    protected $product;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->cartService = app(CartService::class);
        $this->user = User::factory()->create();
        $category = Category::factory()->create();
        $this->product = Product::factory()->create([
            'category_id' => $category->id,
            'price' => 29.99
        ]);
    }

    /** @test */
    public function it_can_add_product_to_cart()
    {
        $this->actingAs($this->user);
        
        $this->cartService->addItem($this->product->id, 2);
        
        $items = $this->cartService->getItems();
        
        $this->assertCount(1, $items);
        $this->assertEquals($this->product->id, $items->first()->product_id);
        $this->assertEquals(2, $items->first()->quantity);
    }

    /** @test */
    public function it_can_calculate_cart_total()
    {
        $this->actingAs($this->user);
        
        $this->cartService->addItem($this->product->id, 3);
        
        $total = $this->cartService->getTotal();
        
        $this->assertEquals(89.97, $total);
    }

    /** @test */
    public function it_can_remove_item_from_cart()
    {
        $this->actingAs($this->user);
        
        $cartItem = $this->cartService->addItem($this->product->id, 1);
        $this->cartService->removeItem($cartItem->id);
        
        $items = $this->cartService->getItems();
        
        $this->assertCount(0, $items);
    }

    /** @test */
    public function it_can_update_item_quantity()
    {
        $this->actingAs($this->user);
        
        $cartItem = $this->cartService->addItem($this->product->id, 1);
        $this->cartService->updateItem($cartItem->id, 5);
        
        $items = $this->cartService->getItems();
        
        $this->assertEquals(5, $items->first()->quantity);
    }

    /** @test */
    public function it_can_clear_cart()
    {
        $this->actingAs($this->user);
        
        $this->cartService->addItem($this->product->id, 1);
        $this->cartService->clear();
        
        $items = $this->cartService->getItems();
        
        $this->assertCount(0, $items);
    }
}