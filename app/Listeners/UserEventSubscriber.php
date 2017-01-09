<?php

namespace App\Listeners;

use App\Models\Cms\UserLogs;

class UserEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function user_auth_log($event) {
        UserLogs::create([
            'user_name' => $event->user_name,
            'ip' => $event->user_ip,
            'message' => $event->message
        ]);
    }

    public function added_terminal($event)
    {   
        UserLogs::create([
            'user_name' => $event->user_name,
            'ip' => $event->user_ip,
            'message' => $event->message,
            'psid' => $event->psid
        ]);
    }

    public function subscribe($events)
    {
        $events->listen(
            'App\Events\UserLoggedIn',
            'App\Listeners\UserEventSubscriber@user_auth_log'
        );

        $events->listen(
            'App\Events\UserFailedToLogIn',
            'App\Listeners\UserEventSubscriber@user_auth_log'
        );

        $events->listen(
            'App\Events\TerminalAdded',
            'App\Listeners\UserEventSubscriber@added_terminal'
        );
    }

}