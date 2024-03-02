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
    private $Condition;
    /**
     * Create a new notification instance.
     */
    public function __construct($iduser,$title,$Condition)
    {
        $this->iduser = $iduser;
        $this->title  = $title;
        $this->Condition    = $Condition;
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
            'condition' => $this->Condition,
        ];
    }


}
