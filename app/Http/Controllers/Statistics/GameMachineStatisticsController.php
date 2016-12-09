<?php 

namespace App\Http\Controllers\Statistics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Blackjack\PsCounters;
use App\Models\Accounting\PsErrorsList;
use Excel;

class GameMachineStatisticsController extends Controller
{
    public function index()
    {
        $counters = PsCounters::orderBy('psid', 'asc')->get();
        return view('statistics.game-machine-statistics', compact('counters'));
    }
}
