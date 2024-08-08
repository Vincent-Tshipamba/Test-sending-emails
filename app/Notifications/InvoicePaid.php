<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaid extends Notification
{
    use Queueable;
    private $user_exists;

    /**
     * Create a new notification instance.
     */
    public function __construct($user_exists)
    {
        //
        $this->user_exists = $user_exists;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->from('tshipambalubobo80@gmail.com', '')
            ->greeting('Good afternoon !')
            ->line("Dear " . $this->user_exists->name . ", We are sorry to inform you that you will no longer have access to Orange Digital Academy due to a bad behavior !")
            ->line('Thank you for all the efforts you made to enjoy your training journey !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
