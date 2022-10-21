<?php

namespace App\Listeners;

use App\Events\MoreBikes;
use App\Mail\Congratulation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMoreBikesCongratulation
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
     * @param  \App\Events\MoreBikes  $event
     * @return void
     */
    public function handle(MoreBikes $event)
    {

        $mensaje = new \stdClass();

        $mensaje->asunto = "ERES EL USUARIO CON MÁS MOTOS!!!!!";
        $mensaje->email = $event->bike->user->email;
        $mensaje->nombre = $event->bike->user->name;

        $mensaje->mensaje = "Con esta moto que has subido eres el usuario con más motos en LARABIKES.";

        Mail::to( $event->bike->user->email)->send(new Congratulation($mensaje));
    }
}
