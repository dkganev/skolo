<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TerminalCreated
{
    use InteractsWithSockets, SerializesModels;

    public $psid;
    public $seatid;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($psid, $seatid)
    {
        $this->psid = $psid;
        $this->seatid = $seatid;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
