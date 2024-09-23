<?php

namespace App\Observers;


use App\Models\User;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $recipient = Auth::user();
        Log::info('User created: ' . $recipient);

        // Check if the authenticated user is an admin
        if ($recipient instanceof User && $recipient->isAdmin()) {
            Notification::make()
                ->title('New User Created')

                ->body("User {$user->name} has been created.")
                ->sendToDatabase($recipient);
        }

        // $recipient = Auth::user();

        // Notification::make()
        //     ->title('New User Created')
        //     ->body("User {$user->name} has been created.")
        //     ->sendToDatabase($recipient);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        $recipient = Auth::user();

        Notification::make()
            ->title('New User Created')
            ->body("User {$user->name} has been created.")
            ->sendToDatabase($recipient);
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
