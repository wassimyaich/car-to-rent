<?php

namespace App\Observers;

use App\Models\Reservation;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class ReservationObserver
{
    /**
     * Handle the Reservation "created" event.
     */
    public function created(Reservation $reservation): void
    {
        $recipients = User::where('is_admin', 1)->get();
        Log::info('Reservation created. Admin recipients count: '.$recipients->count());

        // Log reservation details
        Log::info('Reservation details: '.json_encode($reservation->toArray()));

        // Check if there are any recipients (admins)
        if ($recipients->isNotEmpty()) {
            // Iterate over each admin user
            foreach ($recipients as $recipient) {

                // Notify the admin about the new reservation
                Log::info('Sending notification to admin: '.$recipient->name);

                Notification::make()
                    ->title('New Reservation Created')
                    ->body("A new reservation by {$reservation->user_type} has been created.This is her phone number {$reservation->phone},the {$reservation->car->name} is reserved from {$reservation->start_date} to {$reservation->end_date} .The car is piched from {$reservation->pickup_location}")
                    ->sendToDatabase($recipient);
            }
        } else {
            Log::info('No admin users found to notify.');
        }
    }

    /**
     * Handle the Reservation "updated" event.
     */
    public function updated(Reservation $reservation): void
    {
        //
    }

    /**
     * Handle the Reservation "deleted" event.
     */
    public function deleted(Reservation $reservation): void
    {
        //
    }

    /**
     * Handle the Reservation "restored" event.
     */
    public function restored(Reservation $reservation): void
    {
        //
    }

    /**
     * Handle the Reservation "force deleted" event.
     */
    public function forceDeleted(Reservation $reservation): void
    {
        //
    }
}
