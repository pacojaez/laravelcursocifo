<?php

namespace App\Listeners;

use App\Events\NewConcesionarioAddedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailConcesionarioAdded
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
     * @param  \App\Events\NewConcesionarioAddedEvent  $event
     * @return void
     */
    public function handle(NewConcesionarioAddedEvent $event)
    {
        //
    }
}
