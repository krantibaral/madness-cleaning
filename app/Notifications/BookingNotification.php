<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\Booking;

class BookingNotification extends Notification
{
    use Queueable;

    protected $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function via($notifiable)
    {
        return ['database']; // Only using the 'database' channel
    }

    public function toArray($notifiable)
    {
        
        $serviceName = null;

      
        if ($this->booking->window_cleaning_service_id) {
            $serviceName = 'Window Cleaning Service';
        } elseif ($this->booking->house_cleaning_service_id) {
            $serviceName = 'House Cleaning Service';
        } elseif ($this->booking->lease_cleaning_service_id) {
            $serviceName = 'Lease Cleaning Service';
        } elseif ($this->booking->carpet_cleaning_service_id) {
            $serviceName = 'Carpet Cleaning Service';
        } elseif ($this->booking->commercial_cleaning_service_id) {
            $serviceName = 'Commercial Cleaning Service';
        } elseif ($this->booking->builder_cleaning_service_id) {
            $serviceName = 'Builder Cleaning Service';
        } elseif ($this->booking->lawn_service_id) {
            $serviceName = 'Lawn Cleaning Service';
        } elseif ($this->booking->rubbish_removal_service_id) {
            $serviceName = 'Rubbish Removal Service';
        }

        
        return [
            'message' => 'A new booking has been made for ' . $serviceName,
        ];
    }
}
