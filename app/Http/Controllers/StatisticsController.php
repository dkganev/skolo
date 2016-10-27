<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\PsCounters;
use App\Models\Casinos;
use App\Models\Games;
use App\Models\BingoHistory;
use App\Models\BingoPurchase_History;
use App\Models\BingoWins_History;
use App\Models\BingoBall_History;
use App\Models\Bingo\Tickets;
use App\Models\Bingo\psTicketsArchive;
use App\Models\ServerPs;
use App\Models\Roulette\GameHistory;
use Excel;

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
    
    public function historyRoulette_statistics()
    {
        $historys = GameHistory::orderBy('ts', 'desc')->get();

        return view('statistics.historyRoulette', ['historys' => $historys]); 
    }
    
    public function exportHistory_statistics()
    {
        $export = $historys = BingoHistory::orderBy('tstamp', 'desc')->get();

        Excel::create('Terminals Data', function($excel) use($export){
            $excel->sheet('Terminals', function($sheet) use($export){
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
   
    public function ajax_statBingoHistory(Request $request)
    {
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
    
    public function ajax_statBingoHistoryTickets(Request $request)
    {
        $databingo_seq = $request['bingo_seq'];
        $datapsid = $request['psid'];
        //$bingoTickets = Tickets::orderBy('idx', 'ask')->get();
        $bingoPurchase_History = BingoPurchase_History::where('bingo_seq', $databingo_seq)->where('psid', $datapsid)->orderBy('ticket_count', 'desc')->first();
        $server_ps_seatid = ServerPs::where('psid', $datapsid)->count() ? ServerPs::where('psid', $datapsid)->orderBy('psid', 'asc')->first()->seatid : "Missing saitid (PSID is $datapsid )";
        $wins_history = BingoWins_History::where('bingo_seq', $databingo_seq)->get();
        $BingoBalls = BingoBall_History::where('unique_game_seq', $wins_history->first()->unique_game_seq)->first();
        
        $bingoCount = BingoPurchase_History::where('bingo_seq', $databingo_seq)->where('psid', $datapsid)->orderBy('ticket_count', 'desc')->first()->ticket_count - 1 ; 
        $bingoStr = BingoPurchase_History::where('bingo_seq', $databingo_seq)->where('psid', $datapsid)->orderBy('ticket_count', 'desc')->first()->tickets_id ; 
        $ticketIDfirst = unpack("L",stream_get_contents($bingoStr, 4, 0));
        $ticketIDLast = unpack("L",stream_get_contents($bingoStr, 4, $bingoCount * 4));
        $bingoTickets = Tickets::where('idx', '>=' , $ticketIDfirst)->where('idx', '<=' , $ticketIDLast)->get();
        $psTicketsArchive = psTicketsArchive::where('bingo_seq', $databingo_seq)->first();
        $psTicketsArchiveHTML = "My Bonus Numbers: " . $psTicketsArchive->mybonus_b1 . ", " . $psTicketsArchive->mybonus_b2 . ", " . $psTicketsArchive->mybonus_b3;
        $BingoBallsHTML = "Balls: ";
        $BingoBallsArray = array();
           for ($i = 1; $i <= $BingoBalls->ball_cnt; $i++) {
               $curBal = "b" . $i;
               $BingoBallsHTML .= $BingoBalls->$curBal . ", ";
               $BingoBallsArray[$i] = $BingoBalls->$curBal;
               
           }
        $testPage = view('statistics.bingoTickets_History', ['bingoPurchase_Historys' => $bingoPurchase_History, 'wins_history' => $wins_history, 'datapsid' => $datapsid, 'bingoTickets' => $bingoTickets, 'BingoBallsArray' => $BingoBallsArray])->render();
        $dataArray1 = array(
            "success" => "success",
            "server_ps_seatid" => $server_ps_seatid,
            "BingoBallsHTML" => $BingoBallsHTML,
            "psTicketsArchiveHTML" => $psTicketsArchiveHTML,
            "html" => $testPage,
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
}
