<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class CartService
{
    public function getCart()
    {
        $userId = Auth::id();
        $sessionId = Session::getId();
        
        Log::info('Getting cart', [
            'user_id' => $userId,
            'session_id' => $sessionId,
            'auth_check' => Auth::check()
        ]);
        
        if (Auth::check()) {
            $cart = Cart::firstOrCreate(
                ['user_id' => $userId],
                ['session_id' => $sessionId]
            );
        } else {
            $cart = Cart::firstOrCreate(
                ['session_id' => $sessionId],
                ['user_id' => null]
            );
        }
        
        Log::info('Cart retrieved', [
            'cart_id' => $cart->id,
            'user_id' => $cart->user_id,
            'session_id' => $cart->session_id
        ]);
        
        return $cart;
    }
    
    public function addItem($productId, $quantity = 1)
    {
        $cart = $this->getCart();
        $product = Product::findOrFail($productId);
        
        Log::info('Adding item to cart', [
            'product_id' => $productId,
            'quantity' => $quantity,
            'cart_id' => $cart->id
        ]);
        
        // Check if item already exists in cart
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $productId)
            ->first();
            
        if ($cartItem) {
            // Update quantity
            $cartItem->quantity += $quantity;
            $cartItem->save();
            Log::info('Updated existing cart item', [
                'cart_item_id' => $cartItem->id,
                'new_quantity' => $cartItem->quantity
            ]);
        } else {
            // Create new cart item
            $cartItem = new CartItem([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'quantity' => $quantity
            ]);
            $cartItem->save();
            Log::info('Created new cart item', [
                'cart_item_id' => $cartItem->id,
                'quantity' => $cartItem->quantity
            ]);
        }
        
        return $cartItem;
    }
    
    public function updateItem($itemId, $quantity)
    {
        $cartItem = CartItem::findOrFail($itemId);
        
        // Ensure the item belongs to the current user's cart
        $cart = $this->getCart();
        if ($cartItem->cart_id !== $cart->id) {
            throw new \Exception('Item does not belong to the current cart');
        }
        
        if ($quantity <= 0) {
            $cartItem->delete();
        } else {
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }
        
        return $cartItem;
    }
    
    public function removeItem($itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);
        
        // Ensure the item belongs to the current user's cart
        $cart = $this->getCart();
        if ($cartItem->cart_id !== $cart->id) {
            throw new \Exception('Item does not belong to the current cart');
        }
        
        $cartItem->delete();
    }
    
    public function getItems()
    {
        $cart = $this->getCart();
        return $cart->items()->with('product')->get();
    }
    
    public function getTotal()
    {
        $items = $this->getItems();
        $total = 0;
        
        foreach ($items as $item) {
            $total += $item->product->price * $item->quantity;
        }
        
        return $total;
    }
    
    public function getItemCount()
    {
        $cart = $this->getCart();
        $count = $cart->items()->sum('quantity');
        Log::info('Getting item count', [
            'cart_id' => $cart->id,
            'item_count' => $count
        ]);
        return $count;
    }
    
    public function clear()
    {
        $cart = $this->getCart();
        $cart->items()->delete();
    }
}