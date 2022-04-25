<?php

namespace App\Listeners;
use App\Events\AuthLoginEventHandler;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginSuccessful
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
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        \Log::debug("LLEGO".$event->user->name);

        broadcast(new AuthLoginEventHandler(" is online", 'success'));  
    }
}
