<?php

namespace App\Events;

use App\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;


// ShouldBroadcast put in a queue
// ShouldBroadcastNow broadcast immediately

class Example implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


   // public string $message = 'Hello World';
    /**
     * Create a new event instance.
     */
    //    public function __construct(protected User $user)
    public function __construct(public User $user, public Message $message)
    {
        //
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->user->id,
            'name' => $this->user->name,

            'message' => $this->message,
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('chat'),
        ];
    }
}
