<?php
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Spatie\Permission\Models\Role;

// Create admin role if it doesn't exist
try {
    $adminRole = Role::findByName('admin', 'web');
    echo "Admin role already exists\n";
} catch (Spatie\Permission\Exceptions\RoleDoesNotExist $e) {
    $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);
    echo "Admin role created\n";
}

// Check admin user
$user = App\Models\User::where('email', 'admin@example.com')->first();
if ($user) {
    echo "User: " . $user->name . "\n";
    echo "Email: " . $user->email . "\n";
    echo "Has admin role: " . ($user->hasRole('admin') ? 'Yes' : 'No') . "\n";
    
    // If user doesn't have admin role, assign it
    if (!$user->hasRole('admin')) {
        $user->assignRole('admin');
        echo "Admin role assigned to user\n";
    }
} else {
    echo "Admin user not found\n";
}
?>