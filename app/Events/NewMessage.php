<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

// make sure to implement the ShouldBroadcast interface.
// This is needed so that Laravel knows to broadcast the event over a WebSocket connection
class NewMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public function __construct(public string $message)
    { }

    public function broadcastOn(): array
    {
        return [
            // we'll broadcast the event on a public channel called new-public-channel.
            new Channel('messages'),
        ];
    }
}