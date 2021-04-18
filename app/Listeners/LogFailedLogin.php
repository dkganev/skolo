<?php

namespace App\Listeners;

use App\Models\Cms\UserLogs;
use App\Events\UserFailedToLogIn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogFailedLogin
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
     * @param  UserFailedToLogIn  $event
     * @return void
     */
    public function handle(UserFailedToLogIn $event)
    {
        UserLogs::create([
            'user_name' => $event->user_name,
            'ip' => $event->user_ip,
            'message' => $event->message
        ]);
    }
}
