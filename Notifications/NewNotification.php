<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewNotification extends Notification
{
    use Queueable;

    protected $table = 'notifications';

    private $newnotice;
   
    public function __construct($newnotice)
    {
       $this->newnotice = $newnotice;
    }
   
    public function via($notifiable)
    {
       return ['database'];
    }

    public function toArray($notifiable)
     {
       return [
            'subject' => $this->newnotice['subject'],
            'message' => $this->newnotice['message'],
        ];
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'notifiable_id');
    }
}
