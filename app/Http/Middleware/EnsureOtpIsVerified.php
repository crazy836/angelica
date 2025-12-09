<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureOtpIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Skip OTP check for OTP verification routes
        if ($request->route()->named('otp.verify', 'otp.verify.post', 'otp.resend')) {
            return $next($request);
        }
        
        // Check if user is authenticated
        if ($request->user()) {
            // Skip OTP check for admin users
            if ($request->user()->hasRole('admin')) {
                return $next($request);
            }
            
            // Check if OTP verified
            // If is_otp_verified is null, it means the user was created before OTP was implemented, so we consider them verified
            // If is_otp_verified is false (0), it means the user is newly registered and needs to verify OTP
            if ($request->user()->is_otp_verified === 0) {
                // Redirect to OTP verification page
                return redirect()->route('otp.verify');
            }
        }
        
        return $next($request);
    }
}