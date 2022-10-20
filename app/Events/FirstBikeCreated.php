<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;


class FirstBikeCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $bike;

    public function __construct( $bike, $user)
    {

        $this->bike = $bike;
        $this->user = $user;

    }

    // public function broadcastOn(): Channel|array|void
    // {
    //     // return new PrivateChannel('channel-name');
    // }
}
