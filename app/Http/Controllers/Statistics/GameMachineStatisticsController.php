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
    public function index_blackjack(BjPsCounters $BjPsCounters)
    {
        $bet = 0; $win = 0; $jp = 0; $games = 0; $jp_hits = 0;

        $counters = $BjPsCounters->orderBy('psid', 'asc')->get();

        foreach ($counters as $counter) {
            $bet += $counter->bet;
            $win += $counter->win;
            $jp += $counter->jp;
            $games += $counter->games;
            $jp_hits += $counter->jp_hits;
        }

        $totals = [
            'bet' => $bet,
            'win' => $win,
            'jp'  => $jp,
            'games' => $games,
            'jp_hits' => $jp_hits
        ];

        return view('statistics.game-machine-blackjack', compact('counters', 'totals'));
    }

    public function index_bingo(BingoPsCounters $BingoPsCounters)
    {
        $bet = 0; $win = 0; $jp = 0; $games = 0; $jp_hits = 0;

        $counters = $BingoPsCounters->orderBy('psid', 'asc')->get();

        foreach ($counters as $counter) {
            $bet += $counter->bet;
            $win += $counter->win;
            $jp += $counter->jp;
            $games += $counter->games;
            $jp_hits += $counter->jp_hits;
        }

        $totals = [
            'bet' => $bet,
            'win' => $win,
            'jp'  => $jp,
            'games' => $games,
            'jp_hits' => $jp_hits
        ];

        return view('statistics.game-machine-bingo', compact('counters', 'totals'));
    }

    public function index_rlt1(RLT1PsCounters $RLT1PsCounters)
    {
        $bet = 0; $win = 0; $jp = 0; $games = 0; $jp_hits = 0;

        $counters = $RLT1PsCounters->orderBy('psid', 'asc')->get();

        foreach ($counters as $counter) {
            $bet += $counter->bet;
            $win += $counter->win;
            $jp += $counter->jp;
            $games += $counter->games;
            $jp_hits += $counter->jp_hits;
        }

        $totals = [
            'bet' => $bet,
            'win' => $win,
            'jp'  => $jp,
            'games' => $games,
            'jp_hits' => $jp_hits
        ];

        return view('statistics.game-machine-rl1', compact('counters', 'totals'));
    }

    public function index_rlt2(RLT2PsCounters $RLT2PsCounters)
    {
        $bet = 0; $win = 0; $jp = 0; $games = 0; $jp_hits = 0;

        $counters = $RLT2PsCounters->orderBy('psid', 'asc')->get();

        foreach ($counters as $counter) {
            $bet += $counter->bet;
            $win += $counter->win;
            $jp += $counter->jp;
            $games += $counter->games;
            $jp_hits += $counter->jp_hits;
        }

        $totals = [
            'bet' => $bet,
            'win' => $win,
            'jp'  => $jp,
            'games' => $games,
            'jp_hits' => $jp_hits
        ];

        return view('statistics.game-machine-rlt2', compact('counters', 'totals'));
    }
}
