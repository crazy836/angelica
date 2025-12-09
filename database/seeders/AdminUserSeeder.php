<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get roles
        $adminRole = Role::where('name', 'admin')->first();
        $customerRole = Role::where('name', 'customer')->first();
        
        // Create or update admin user
        $admin = User::firstOrCreate([
            'email' => 'admin@example.com'
        ], [
            'name' => 'Admin User',
            'password' => bcrypt('password'),
        ]);
        
        // Assign admin role if not already assigned
        if (!$admin->hasRole('admin')) {
            $admin->assignRole($adminRole);
        }
        
        // Create or update customer user
        $customer = User::firstOrCreate([
            'email' => 'customer@example.com'
        ], [
            'name' => 'Customer User',
            'password' => bcrypt('password'),
        ]);
        
        // Assign customer role if not already assigned
        if (!$customer->hasRole('customer')) {
            $customer->assignRole($customerRole);
        }
    }
}
