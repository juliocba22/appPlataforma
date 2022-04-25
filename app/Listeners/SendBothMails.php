<?php

namespace App\Listeners;

use App\Events\ContactWasRecorded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendBothMails
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
     * @param  \App\Events\ContactWasRecorded  $event
     * @return void
     */
    public function handle()
    {
        \Log::debug("LLEGO");
        broadcast(new ContactWasRecorded(" is online" ));  
    }
}
