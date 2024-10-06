<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class NewReservationNotification extends Notification implements ShouldBroadcast
{
    use Queueable;

    public string $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via($notifiable): array
    {
        return ['broadcast'];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'message' => $this->message,
            // You can include additional data here if needed
        ]);
    }

    // Optionally, if you want to include database storage
    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
        ];
    }
}
