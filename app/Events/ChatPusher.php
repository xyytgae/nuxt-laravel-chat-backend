<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Http\Request;
use Pusher\Pusher;

class ChatPusher
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Pusherを実行
     *
     * @return void
     */
    public function pusher(Request $request)
    {
        // require '../../../vendor/autoload.php';

        $options = array(
            'cluster' => 'ap3',
            'useTLS' => true
        );
        $pusher = new Pusher(
            '980fee87030ccaabeb61',
            'a0bae9da1a1174195f1e',
            '1202991',
            $options
        );

        $data['message'] = $request->all();
        $pusher->trigger('my-channel', 'my-event', $data);
    }
}
