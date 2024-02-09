<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendLinkMeetNotification extends Notification
{
    use Queueable;
    private $iduser;
    private $title;
    /**
     * Create a new notification instance.
     */
    public function __construct($iduser,$title)
    {
        $this->iduser = $iduser;
        $this->title  = $title;
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

    /**
     * Get the mail representation of the notification.
     */
    public function toDatabase($notifiable)
    {
        return
        [
            'id'   =>$this->iduser,
            'title'=>$this->title,
        ];
    }


}
