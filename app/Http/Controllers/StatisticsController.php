<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\PsCounters;
use App\Models\Casinos;
use App\Models\Games;
use App\Models\BingoHistory;


class StatisticsController extends Controller
{

    public function index()
    {
        return view('statistics.index');
    }

    public function terminals_statistics()
    {
        $counters = PsCounters::orderBy('psid', 'asc')->get();

        return view('statistics.terminals', ['counters' => $counters]);
    }

    public function games_statistics()
    {
        $games = Games::orderBy('gameid', 'asc')->get();

        return view('statistics.games', [ 'games' => $games]);
    }
    public function history_statistics()
    {
        $historys = BingoHistory::orderBy('tstamp', 'desc')->get();

        return view('statistics.history', ['historys' => $historys]);
    }
}
