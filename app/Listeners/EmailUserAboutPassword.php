<?php

namespace App\Listeners;

use App\Events\UserPassword;
use App\Mail\UserRegisteredPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailUserAboutPassword
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

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserPassword $event)
    {
        $data = $event->data;
        Mail::to($data['email'])->send(new UserRegisteredPassword($data));
    }
}
