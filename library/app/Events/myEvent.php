<?php

namespace App\Events;

use App\Models\notification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class myEvent implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $message;

  public function __construct($message)
  {
      $this->message = $message;
  }

  public function broadcastOn()
  {
    // dd($this->message);
      notification::create([
        'massage'=>$this->message['massage'],
        'user_id'=>$this->message['user_id'],
        'link'=>$this->message['link'],
        ]);
      return ['my-channel'];
  }

  public function broadcastAs()
  {
      return 'my-event';
  }


}
