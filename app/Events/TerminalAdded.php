<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TerminalAdded
{
    use InteractsWithSockets, SerializesModels;

    public $user_ip;
    public $user_name;
    public $message;
    public $psid;
    public $type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_ip, $user_name, $psid, $message, $type)
    {
        $this->psid = $psid;
        $this->user_ip = $user_ip;
        $this->user_name = $user_name;
        //$this->type = 2;
        //$this->message = 'Terminal added!';
        $this->type = $type;
        $this->message =  $message; //'User logged in!';
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
