<?php 

namespace App\Http\Controllers\Statistics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Blackjack\BjPsCounters;
use App\Models\Bingo\BingoPsCounters;
use App\Models\Accounting\PsErrorsList;
use Excel;

class GameMachineStatisticsController extends Controller
{
    public function index_blackjack()
    {
        $counters = BjPsCounters::orderBy('psid', 'asc')->get();
        return view('statistics.game-machine-blackjack', compact('counters'));
    }

    public function index_bingo()
    {
        $counters = BingoPsCounters::orderBy('psid', 'asc')->get();
        return view('statistics.game-machine-bingo', compact('counters'));
    }
    
    // public function index()
    // {
    //     $counters = PsCounters::orderBy('psid', 'asc')->get();
    //     return view('statistics.game-machine-blackjack', compact('counters'));
    // }
    // public function index()
    // {
    //     $counters = PsCounters::orderBy('psid', 'asc')->get();
    //     return view('statistics.game-machine-blackjack', compact('counters'));
    // }
    // public function index()
    // {
    //     $counters = PsCounters::orderBy('psid', 'asc')->get();
    //     return view('statistics.game-machine-blackjack', compact('counters'));
    // }
}
