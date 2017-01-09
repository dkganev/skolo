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

    // export game machine blackjack
    public function export_gm_bj()
    {
        //$export = BjPsCounters::all();
        $bet = 0; $win = 0; $jp = 0; $games = 0; $jp_hits = 0;

        $counters = BjPsCounters::orderBy('psid', 'asc')->get();
        $export = array();
            foreach ($counters as $key => $val) {
                $bet += $val->bet;
                $win += $val->win;
                $jp += $val->jp;
                $games += $val->games;
                $jp_hits += $val->jp_hits;
                $export[$key] = array(
                    'PS ID' => $val->psid, 
                    'Total Bet' => number_format($val->bet/100, 2), 
                    'Total Win' => number_format($val->win/100, 2), 
                    'Jackpot' => number_format($val->jp/100, 2), 
                    'Games' => $val->games, 
                    'JP Hits' => $val->jp_hits
                );
            
            }
                $export[$key + 1] = array(
                    'PS ID' => "TOTAL", 
                    'Total Bet' => number_format($bet/100, 2), 
                    'Total Win' => number_format($win/100, 2), 
                    'Jackpot' => number_format($jp/100, 2), 
                    'Games' => $games, 
                    'JP Hits' => $jp_hits
                );

        
        Excel::create('Blackjack Game Machine Counters', function($excel) use($export){
            $excel->sheet('Blackjack Counters', function($sheet) use($export){
                
                $sheet->fromArray($export);
                $sheet->freezeFirstRow();
                $sheet->setFontFamily('Liberation Sans');
                $sheet->setFontSize(10);
                $sheet->row(1, function ($row) {
                    $row->setFontWeight('bold');
                });
                $sheet->setBorder('A1', 'thin');
                $sheet->setHeight(1, 20);
            });
        })->export('xls');
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

    // export game machine bingo
    public function export_gm_bingo()
    {
        //$export = BingoPsCounters::all();
        $bet = 0; $win = 0; $jp = 0; $games = 0; $jp_hits = 0;

        $counters = BingoPsCounters::orderBy('psid', 'asc')->get();
        $export = array();
            foreach ($counters as $key => $val) {
                $bet += $val->bet;
                $win += $val->win;
                $jp += $val->jp;
                $games += $val->games;
                $jp_hits += $val->jp_hits;
                $export[$key] = array(
                    'PS ID' => $val->psid, 
                    'Total Bet' => number_format($val->bet/100, 2), 
                    'Total Win' => number_format($val->win/100, 2), 
                    'Jackpot' => number_format($val->jp/100, 2), 
                    'Games' => $val->games, 
                    'JP Hits' => $val->jp_hits
                );
            
            }
                $export[$key + 1] = array(
                    'PS ID' => "TOTAL", 
                    'Total Bet' => number_format($bet/100, 2), 
                    'Total Win' => number_format($win/100, 2), 
                    'Jackpot' => number_format($jp/100, 2), 
                    'Games' => $games, 
                    'JP Hits' => $jp_hits
                );
        Excel::create('Bingo Game Machine Counters', function($excel) use($export){
            $excel->sheet('Bingo Game Machine', function($sheet) use($export){
                
                $sheet->fromArray($export);
                $sheet->freezeFirstRow();
                $sheet->setFontFamily('Liberation Sans');
                $sheet->setFontSize(10);
                $sheet->row(1, function ($row) {
                    $row->setFontWeight('bold');
                });
                $sheet->setBorder('A1', 'thin');
                $sheet->setHeight(1, 20);
            });
        })->export('xls');
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

    // export game machine roulette 1
    public function export_gm_rlt1()
    {
        //$export = RLT1PsCounters::all();
        $bet = 0; $win = 0; $jp = 0; $games = 0; $jp_hits = 0;

        $counters = RLT1PsCounters::orderBy('psid', 'asc')->get();
        $export = array();
            foreach ($counters as $key => $val) {
                $bet += $val->bet;
                $win += $val->win;
                $jp += $val->jp;
                $games += $val->games;
                $jp_hits += $val->jp_hits;
                $export[$key] = array(
                    'PS ID' => $val->psid, 
                    'Total Bet' => number_format($val->bet/100, 2), 
                    'Total Win' => number_format($val->win/100, 2), 
                    'Jackpot' => number_format($val->jp/100, 2), 
                    'Games' => $val->games, 
                    'JP Hits' => $val->jp_hits
                );
            
            }
                $export[$key + 1] = array(
                    'PS ID' => "TOTAL", 
                    'Total Bet' => number_format($bet/100, 2), 
                    'Total Win' => number_format($win/100, 2), 
                    'Jackpot' => number_format($jp/100, 2), 
                    'Games' => $games, 
                    'JP Hits' => $jp_hits
                );
        Excel::create('RLT1 Game Machine Counters', function($excel) use($export){
            $excel->sheet('RLT1 Game Machine', function($sheet) use($export){
                
                $sheet->fromArray($export);
                $sheet->freezeFirstRow();
                $sheet->setFontFamily('Liberation Sans');
                $sheet->setFontSize(10);
                $sheet->row(1, function ($row) {
                    $row->setFontWeight('bold');
                });
                $sheet->setBorder('A1', 'thin');
                $sheet->setHeight(1, 20);
            });
        })->export('xls');
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

    // export game machine roulette 2
    public function export_gm_rlt2()
    {
        //$export = RLT2PsCounters::all();
        $bet = 0; $win = 0; $jp = 0; $games = 0; $jp_hits = 0;

        $counters = RLT2PsCounters::orderBy('psid', 'asc')->get();

        $export = array();
            foreach ($counters as $key => $val) {
                $bet += $val->bet;
                $win += $val->win;
                $jp += $val->jp;
                $games += $val->games;
                $jp_hits += $val->jp_hits;
                $export[$key] = array(
                    'PS ID' => $val->psid, 
                    'Total Bet' => number_format($val->bet/100, 2), 
                    'Total Win' => number_format($val->win/100, 2), 
                    'Jackpot' => number_format($val->jp/100, 2), 
                    'Games' => $val->games, 
                    'JP Hits' => $val->jp_hits
                );
            
            }
                $export[$key + 1] = array(
                    'PS ID' => "TOTAL", 
                    'Total Bet' => number_format($bet/100, 2), 
                    'Total Win' => number_format($win/100, 2), 
                    'Jackpot' => number_format($jp/100, 2), 
                    'Games' => $games, 
                    'JP Hits' => $jp_hits
                );
        Excel::create('RLT2 Game Machine Counters', function($excel) use($export){
            $excel->sheet('RLT2 Game Machine', function($sheet) use($export){
                
                $sheet->fromArray($export);
                $sheet->freezeFirstRow();
                $sheet->setFontFamily('Liberation Sans');
                $sheet->setFontSize(10);
                $sheet->row(1, function ($row) {
                    $row->setFontWeight('bold');
                });
                $sheet->setBorder('A1', 'thin');
                $sheet->setHeight(1, 20);
            });
        })->export('xls');
    }
}
