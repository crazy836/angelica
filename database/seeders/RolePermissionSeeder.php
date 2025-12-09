<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $customerRole = Role::create(['name' => 'customer']);
        
        // Create permissions
        $permissions = [
            // Product permissions
            'view products',
            'create products',
            'edit products',
            'delete products',
            
            // Order permissions
            'view orders',
            'edit orders',
            'delete orders',
            
            // User permissions
            'view users',
            'edit users',
            'delete users',
        ];
        
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        
        // Assign permissions to admin role
        $adminRole->givePermissionTo(Permission::all());
    }
}
