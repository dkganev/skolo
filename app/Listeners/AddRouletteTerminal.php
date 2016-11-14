<?php

namespace App\Listeners;

use App\Events\TerminalCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Roulette\PsConf;

class AddRouletteTerminal
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
     * @param  TerminalCreated  $event
     * @return void
     */
    public function handle(TerminalCreated $event)
    {
        // Get the Default Ps Config with ID 0
        $default_ps = PsConf::where('ps_id', 0 )->first();
        
        $new_psconf = $default_ps->replicate();
        $new_psconf->ps_id = $event->psid;
        $new_psconf->seat_id = $event->seatid;
        $new_psconf->save();

        // Get the Default Ps Config with ID 0
        $default_ps = App\Models\Roulette\Roulette2\PsConf::where('ps_id', 0 )->first();
        
        $new_psconf = $default_ps->replicate();
        $new_psconf->ps_id = $event->psid;
        $new_psconf->seat_id = $event->seatid;
        $new_psconf->save();
    }
}
