<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Reservation;

class ReservationStatusUpdated extends Notification
{
    use Queueable;

    protected $reservation;

    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // You can add 'database' if you want to store in database notifications
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Your reservation status has been updated.')
            ->action('View Reservation', route('reservations.show', $this->reservation->id))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Your reservation status has been updated.',
            'reservation_id' => $this->reservation->id,
        ];
    }
}