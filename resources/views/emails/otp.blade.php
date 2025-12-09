<x-mail::message>
# Your OTP Code

{{ $message }}

## OTP Code: {{ $otp }}

This code will expire in 10 minutes. Please enter this code on the verification page to complete your registration.

If you did not request this code, please ignore this email.

Thanks,<br>
{{ config('app.name') }} Team
</x-mail::message>
