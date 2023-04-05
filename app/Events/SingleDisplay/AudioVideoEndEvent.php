<?php

namespace App\Events\SingleDisplay;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AudioVideoEndEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $channel;

    public function __construct($request)
    {
        $this->channel = $request->channel;
    }

    public function broadcastOn(): Channel
    {
        return new Channel($this->channel);
    }
}

