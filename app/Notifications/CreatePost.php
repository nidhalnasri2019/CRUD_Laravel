<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreatePost extends Notification
{
    use Queueable;

     private $post_id;
     private $byUser;
     private $title;
    public function __construct($post_id,$byUser,$title)
    {
        $this->post_id = $post_id;
        $this->byUser =$byUser;
        $this->title =$title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }
   
    public function toArray($notifiable)
    {
        return [
           'post_id'=>$this->post_id,
           'byUser'=>$this->byUser,
           'title'=>$this->title
        ];
    }
}
