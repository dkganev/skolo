<?php 

namespace App\Http\Controllers\Statistics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Excel;
use App\Http\Requests;
use App\Models\Bingo\BingoPsCounters;
use App\Models\Blackjack\BjPsCounters;
use App\Models\Roulette\RLT1PsCounters;
use App\Models\Roulette\Roulette2\RLT2PsCounters;


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

    public function index_rlt1()
    {
        $counters = RLT1PsCounters::orderBy('psid', 'asc')->get();
        return view('statistics.game-machine-rl1', compact('counters'));
    }

    public function index_rlt2()
    {
        $counters = BingoPsCounters::orderBy('psid', 'asc')->get();
        return view('statistics.game-machine-rlt2', compact('counters'));
    }
}
