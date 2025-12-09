<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixUserProfilePhotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::whereNotNull('profile_photo_path')->get();
        
        foreach ($users as $user) {
            // Clear invalid profile photo paths
            $user->profile_photo_path = null;
            $user->save();
        }
        
        $this->command->info('User profile photos cleared successfully!');
    }
}
