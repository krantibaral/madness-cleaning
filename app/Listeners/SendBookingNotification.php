<?php

// app/Listeners/SendBookingNotification.php
namespace App\Listeners;

use App\Events\BookingMade;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notifiable;
use App\Models\User;

class SendBookingNotification
{
    public function handle(BookingMade $event)
    {
        // Example of sending notification to the user
        $user = User::find($event->booking->user_id);
        $user->notify(new \App\Notifications\BookingNotification($event->booking));
    }
}
