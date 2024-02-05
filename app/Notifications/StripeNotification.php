<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StripeNotification extends Notification
{
    use Queueable;

    private $iduser;
    private $text;
    /**
     * Create a new notification instance.
     */
    public function __construct($iduser,$text)
    {

        $this->iduser       = $iduser;
        $this->text         = $text;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {
        return
        [
            'id'    => $this->iduser,
            'title' => $this->text,
        ];
    }


}
