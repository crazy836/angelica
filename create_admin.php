<?php
require_once 'vendor/autoload.php';

use Illuminate\Support\Facades\Hash;

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Update admin user password
$user = App\Models\User::where('email', 'admin@example.com')->first();
if ($user) {
    $user->password = Hash::make('password');
    $user->save();
    echo "Admin password updated successfully\n";
} else {
    // Create admin user if not exists
    $user = new App\Models\User;
    $user->name = 'Admin User';
    $user->email = 'admin@example.com';
    $user->password = Hash::make('password');
    $user->save();
    echo "Admin user created successfully\n";
}
?>