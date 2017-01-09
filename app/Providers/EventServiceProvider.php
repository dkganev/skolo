<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\TerminalCreated' => [
            'App\Listeners\AddRouletteTerminal',
        ],

        // 'App\Events\UserLoggedIn' => [
        //     'App\Listeners\LogSuccessLogin',
        // ],

        // 'App\Events\UserFailedToLogIn' => [
        //     'App\Listeners\LogFailedLogin',
        // ],
        // // 'App\Events\TerminalCreated' => [
        // //     'App\Listeners\AddRouletteTerminal',
        // // ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        'App\Listeners\UserEventSubscriber',
    ];
}
