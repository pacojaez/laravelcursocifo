<?php

namespace App\Listeners;

use App\Mail\Congratulation;
use App\Events\OneThousandVisits;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOneThousandVisitsCongratulation
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
     * @param  \App\Events\OneThousandVisits  $event
     * @return void
     */
    public function handle( OneThousandVisits $event )
    {

        $mensaje = new \stdClass();

        $mensaje->asunto = "¡¡¡¡MIL VISITAS!!!!! WUALAAA!!!!";
        $mensaje->email = $event->bike->user->email;
        $mensaje->nombre = $event->bike->user->name;

        $moto = $event->bike->marca . ' - '. $event->bike->modelo;

        $mensaje->mensaje = "Tu moto $moto ha llegado a 1000 visitas!!!!!!! ";

        Mail::to( $event->bike->user->email)->send(new Congratulation($mensaje));
    }
}
