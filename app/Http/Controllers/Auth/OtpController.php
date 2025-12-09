<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OtpController extends Controller
{
    /**
     * Show the OTP verification form.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $user = Auth::user();
        
        // If user is already verified, redirect to dashboard
        if ($user && $user->is_otp_verified) {
            return redirect()->route('dashboard');
        }
        
        return view('auth.otp-verify');
    }
    
    /**
     * Verify the OTP code.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6',
        ], [
            'otp.required' => 'Please enter the OTP code.',
            'otp.numeric' => 'OTP must be numeric.',
            'otp.digits' => 'OTP must be 6 digits.',
        ]);
        
        $user = Auth::user();
        
        // Check if OTP is valid
        if (!$user->otp_code || !$user->otp_expires_at) {
            return back()->withErrors(['otp' => 'No OTP code found. Please request a new one.']);
        }
        
        // Check if OTP is expired
        if (now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'OTP code has expired. Please request a new one.']);
        }
        
        // Check if OTP matches
        if ($request->otp != $user->otp_code) {
            return back()->withErrors(['otp' => 'Invalid OTP code. Please try again.']);
        }
        
        // Mark user as OTP verified
        $user->is_otp_verified = true;
        $user->otp_code = null;
        $user->otp_expires_at = null;
        $user->save();
        
        return redirect()->route('dashboard')->with('status', 'Your account has been verified successfully!');
    }
    
    /**
     * Resend the OTP code.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resend(Request $request)
    {
        $user = Auth::user();
        
        // Generate new OTP
        $otp = rand(100000, 999999);
        $user->otp_code = $otp;
        $user->otp_expires_at = now()->addMinutes(10); // OTP expires in 10 minutes
        $user->is_otp_verified = false; // User needs to verify the new OTP
        $user->save();
        
        // Send OTP via email
        try {
            Mail::to($user->email)->send(new \App\Mail\OtpEmail($otp, "Your OTP code is:"));
        } catch (\Exception $e) {
            Log::error('Failed to send OTP email: ' . $e->getMessage());
            return back()->with('error', 'Failed to send OTP email. Please try again.');
        }
        
        return back()->with('status', 'A new OTP code has been sent to your email.');
    }
}
