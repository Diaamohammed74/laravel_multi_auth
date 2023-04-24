<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminPasswordNotification extends Notification
{
    use Queueable;
    public $token;
    public $email;
    /**
     * Create a new notification instance.
     */
    public function __construct($token,$email)
    {
        $this->token=$token;
        $this->email=$email;
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
                    ->line('يحرق ام الانسان ع الصبح')
                    ->action('غير الباسوورد من هنا ', url('/back/reset-password',$this->token,$this->email))
                    ->line('غور');
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
