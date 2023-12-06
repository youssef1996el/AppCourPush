<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
class RegisterNotification extends Notification
{
    use Queueable;
    private $name;
    private $role_name;
    private $iduser;

    /**
     * Create a new notification instance.
     */
    public function __construct($name,$role_name,$iduser)
    {
        $this->name= $name;
        $this->role_name= $role_name;
        $this->iduser= $iduser;
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
            'id'    =>$this->iduser,
            'title' =>$this->role_name === 'professeur' ? 'Un nouveau professeur a été inscrit '.$this->name : 'Un nouveau élève a été inscrit '.$this->name,

        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */

}
