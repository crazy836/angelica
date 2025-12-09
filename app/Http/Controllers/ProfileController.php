<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Display the user's orders.
     */
    public function orders(Request $request): View
    {
        $orders = Order::where('user_id', $request->user()->id)
            ->with('items.product')
            ->latest()
            ->paginate(10);
            
        return view('profile.orders', [
            'orders' => $orders,
        ]);
    }

    /**
     * Display a specific order.
     */
    public function showOrder(Request $request, $orderId)
    {
        $order = Order::where('user_id', $request->user()->id)
            ->with('items.product')
            ->findOrFail($orderId);
            
        return view('profile.order-detail', [
            'order' => $order,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        
        // Handle profile photo upload
        if ($request->hasFile('avatar')) {
            // Delete old profile photo if exists
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }
            
            // Store the new profile photo
            $path = $request->file('avatar')->store('profile-photos', 'public');
            $user->profile_photo_path = $path;
        }
        
        // Update other fields
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}