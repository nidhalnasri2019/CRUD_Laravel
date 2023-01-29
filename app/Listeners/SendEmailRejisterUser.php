<?php

namespace App\Listeners;

use App\Events\RejisterUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailRejisterUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle(RejisterUser $event)
    {
        Mail::to($event->user->email)->send(new WelcomeUser($event->user) );
    }
}
