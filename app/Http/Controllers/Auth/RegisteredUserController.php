<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Prepare validation rules
        $validationRules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];

        // Only require reCAPTCHA if keys are configured
        $recaptchaSiteKey = env('RECAPTCHA_SITE_KEY');
        $recaptchaSecretKey = env('RECAPTCHA_SECRET_KEY');
        
        if ($recaptchaSiteKey && $recaptchaSecretKey && $recaptchaSiteKey !== 'your_site_key_here' && $recaptchaSecretKey !== 'your_secret_key_here') {
            $validationRules['g-recaptcha-response'] = ['required'];
            
            // Validate reCAPTCHA
            $recaptchaResponse = $request->input('g-recaptcha-response');
            $clientIp = $request->ip();

            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $recaptchaSecretKey,
                'response' => $recaptchaResponse,
                'remoteip' => $clientIp,
            ]);

            $body = $response->json();

            if (!isset($body['success']) || !$body['success']) {
                return back()->withErrors([
                    'g-recaptcha-response' => 'reCAPTCHA verification failed. Please try again.',
                ])->withInput();
            }
        }

        $request->validate($validationRules, [
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Generate OTP
        $otp = rand(100000, 999999);
        $user->otp_code = $otp;
        $user->otp_expires_at = now()->addMinutes(10); // OTP expires in 10 minutes
        $user->is_otp_verified = false; // Newly registered users need to verify OTP
        $user->save();

        // Send OTP via email
        try {
            \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\OtpEmail($otp, "Welcome to our platform!"));
        } catch (\Exception $e) {
            \Log::error('Failed to send OTP email during registration: ' . $e->getMessage());
        }

        event(new Registered($user));

        Auth::login($user);

        // Redirect to OTP verification page instead of dashboard
        return redirect()->route('otp.verify');
    }
}
