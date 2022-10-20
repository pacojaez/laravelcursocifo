<?php

namespace App\Listeners;

use App\Mail\Congratulation;
use App\Events\FirstBikeCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendFirstBikeCreatedCongratulation
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
     * @param  \App\Events\FirstBikeCreated  $event
     * @return void
     */
    public function handle(FirstBikeCreated $event)
    {

        $mensaje = new \stdClass();

        $mensaje->asunto = "TU PRIMERA MOTO";
        $mensaje->email = $event->user->email;
        $mensaje->nombre = $event->user->name;
        $moto = $event->bike->marca . ' - '. $event->bike->modelo;

        $mensaje->mensaje = "Gracias por tu primera aportación a LARABIKES. Hemos creado la moto $moto ";

        Mail::to( $event->user->email)->send(new Congratulation($mensaje));
    }
}
