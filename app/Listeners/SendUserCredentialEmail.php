<?php

namespace App\Listeners;

use App\Events\UserCredentialEvent;
use App\Mail\UserCredential;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendUserCredentialEmail
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
     * @param  UserCredentialEvent  $event
     * @return void
     */
    public function handle(UserCredentialEvent $event)
    {
        \Mail::to($event->email)->send(new UserCredentialss($event));
        \Log::info('test', ['event' => $event]);
    }
}
