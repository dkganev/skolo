<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\PsCounters;
use App\Models\Casinos;
use App\Models\Games;
use App\Models\BingoHistory;
use App\Models\BingoPurchase_History;
use App\Models\ServerPs;

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
    public function ajax_statBingoHistory(Request $request)
    {
        //$historys = BingoHistory::orderBy('tstamp', 'desc')->get();

        //return view('statistics.history', ['historys' => $historys]); //ajax_statBingoHistory
        $databoxID = $request['boxID'];
        $bingoPurchase_History = BingoPurchase_History::where('bingo_seq', $databoxID)->orderBy('ticket_count', 'desc')->get();
        $server_ps = ServerPs::orderBy('psid', 'asc')->get();
        //var_dump($bingoPurchase_History);
        $testPage = view('statistics.bingoPurchase_History', ['bingoPurchase_Historys' => $bingoPurchase_History, 'server_ps' => $server_ps])->render();
        
        $dataArray1 = array(
            "success" => "success",
            "databoxID" => $databoxID,
            "html" => $testPage,
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    
}
