<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;
    
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    
    public function index()
    {
        $items = $this->cartService->getItems();
        $total = $this->cartService->getTotal();
        
        return view('cart.index', compact('items', 'total'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
        
        $this->cartService->addItem($request->product_id, $request->quantity);
        
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:0',
        ]);
        
        $this->cartService->updateItem($id, $request->quantity);
        
        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }
    
    public function destroy($id)
    {
        $this->cartService->removeItem($id);
        
        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }
    
    public function add(Request $request)
    {
        \Log::info('Cart add request received', [
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'user_id' => auth()->id(),
            'session_id' => session()->getId(),
            'headers' => $request->headers->all()
        ]);
        
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
        
        try {
            $this->cartService->addItem($request->product_id, $request->quantity);
            
            $cartCount = $this->cartService->getItemCount();
            \Log::info('Product added to cart successfully', [
                'product_id' => $request->product_id,
                'cart_count' => $cartCount,
                'user_id' => auth()->id(),
                'session_id' => session()->getId()
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Product added to cart successfully.',
                'cart_count' => $cartCount
            ]);
        } catch (\Exception $e) {
            \Log::error('Cart add error: ' . $e->getMessage(), [
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'user_id' => auth()->id(),
                'session_id' => session()->getId(),
                'exception' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to add product to cart: ' . $e->getMessage()
            ], 500);
        }
    }
}