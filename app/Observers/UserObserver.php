<?php

namespace App\Observers;


use App\Models\User;

use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $recipients = User::where('is_admin', 1)->get();    
        Log::info('Admins retrieved: ' . $recipients->count());
        
        // Log the created user's name
        Log::info('User created: ' . $user->name);
        
        // Check if there are recipients
        if ($recipients->isNotEmpty()) {
            // Log each admin user
            foreach ($recipients as $recipient) {
                Log::info('User created by: ' . $recipient->name);
        
                // Notify the newly created user about their profile creation
                if ($recipient->id === $user->id) {
                    Log::info('Simple user: ' . $recipient);
        
                    Notification::make()
                        ->title('Profile Created')
                        ->body("Your profile has been successfully created.")
                        ->sendToDatabase($recipient);
                }
        
                // Notify all admins about new user creation
                if ($recipient instanceof User && $recipient->isAdmin()) {
                    Log::info('Sent to admin: ' . $recipient);
        
                    Notification::make()
                        ->title('New User Created')
                        ->body("User {$user->name} has been created.")
                        ->sendToDatabase($recipient);
                }
            }
        } else {
            Log::info('User created, but no authenticated user found.');
        }
}


    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {

    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
