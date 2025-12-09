<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateUserProfilePhotos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-user-profile-photos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update user profile photos to use storage path';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = \App\Models\User::whereNotNull('profile_photo_path')->get();
        
        foreach ($users as $user) {
            // Check if the current path is using the old avatars directory
            if ($user->profile_photo_path && strpos($user->profile_photo_path, 'avatars/') === 0) {
                // Update to use the new storage path
                $newPath = str_replace('avatars/', 'profile-photos/', $user->profile_photo_path);
                $user->profile_photo_path = $newPath;
                $user->save();
                
                $this->info("Updated user {$user->id}: {$user->profile_photo_path}");
            }
        }
        
        $this->info('User profile photos updated successfully!');
    }
}
