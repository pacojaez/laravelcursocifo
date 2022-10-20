<?php

namespace App\Listeners;

use App\Events\NoBikes;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWarningNoBikes
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
     * @param  \App\Events\NoBikes  $event
     * @return void
     */
    public function handle(NoBikes $event)
    {
        //
    }
}
