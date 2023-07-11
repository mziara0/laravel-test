<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Welcome To Our Awesome Website')
            ->greeting('Welcome MR. ' . $notifiable->name)
            ->line('Lorem ipsum dolor sit amet, consectetur adipiscing elit')
            ->line('sed do eiusmod tempor incididunt ut labore et dolore magna aliqua!');
    }
}
