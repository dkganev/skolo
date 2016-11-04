<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Accounting\PsCounters;
use App\Models\Accounting\Casinos;
use App\Models\Accounting\Games;
use App\Models\Bingo\BingoHistory;
use App\Models\Bingo\BingoWins_History;
use App\Models\Bingo\BingoPurchase_History;
use App\Models\Bingo\BingoBall_History;
use App\Models\Bingo\Tickets;
use App\Models\Bingo\psTicketsArchive;
use App\Models\Bingo\psTickets;
use App\Models\Accounting\ServerPs;
use App\Models\Roulette\GameHistory;
use App\Models\Blackjack\BlackjackGameHistory;
use Smiarowski\Postgres\Model\Traits\PostgresArray;
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
        $server_ps = ServerPs::orderBy('psid', 'asc')->get();

        return view('statistics.historyRoulette', ['historys' => $historys, 'server_ps' => $server_ps]); 
    }
    
    public function historyBlackjack()
    {
        $historyClas = new BlackjackGameHistory();
        $historys = $historyClas->orderBy('ts', 'desc')->get();
        $server_ps = ServerPs::orderBy('psid', 'asc')->get();
        
        //$test = $historys->totalWin();
        //var_dump($historyClas->totalWin());
        
        return view('statistics.historyBlackjack', ['historys' => $historys, 'server_ps' => $server_ps]); 
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
        $dataRowUnique = $request['rowUnique']; 
        $psTicketsArchives = psTicketsArchive::where('unique_game_seq', $dataRowUnique)->orderBy('num_tickets', 'desc')->get();
        $server_ps = ServerPs::orderBy('psid', 'asc')->get();
        $testPage = view('statistics.bingoPurchase_History', ['psTicketsArchives' => $psTicketsArchives, 'server_ps' => $server_ps])->render();
        
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
        $dataUnique_game_seq = $request['unique_game_seq'];
        $datapsid = $request['psid'];
       
        $server_ps_seatid = ServerPs::where('psid', $datapsid)->count() ? ServerPs::where('psid', $datapsid)->first()->seatid : "Missing saitid (PSID is $datapsid )";
        $wins_history = BingoWins_History::where('unique_game_seq', $dataUnique_game_seq)->get();
        $BingoBalls = BingoBall_History::where('unique_game_seq', $dataUnique_game_seq)->first();
        $psTicketsArchive = psTicketsArchive::where('unique_game_seq', $dataUnique_game_seq)->first();
        $bingoCount = $psTicketsArchive->ticket_count - 1 ; 
        $bingoStr = $psTicketsArchive->tickets_id ; 
        $psTicketsArchiveHTML = "My Bonus Numbers: " . $psTicketsArchive->mybonus_b1 . ", " . $psTicketsArchive->mybonus_b2 . ", " . $psTicketsArchive->mybonus_b3;
        $BingoBallsHTML = "Balls: ";
        $BingoBallsArray = array();
           for ($i = 1; $i <= $BingoBalls->ball_cnt; $i++) {
               $curBal = "b" . $i;
               $BingoBallsHTML .= $BingoBalls->$curBal . ", ";
               $BingoBallsArray[$i] = $BingoBalls->$curBal;
               
           }
        //$testPage = view('statistics.bingoTickets_History', ['bingoPurchase_Historys' => $bingoPurchase_History, 'wins_history' => $wins_history, 'datapsid' => $datapsid, 'bingoTickets' => $bingoTickets, 'BingoBallsArray' => $BingoBallsArray])->render();
        $testPage = view('statistics.bingoTickets_History', ['psTicketsArchive' => $psTicketsArchive, 'wins_history' => $wins_history, 'datapsid' => $datapsid, 'BingoBallsArray' => $BingoBallsArray])->render();
        $dataArray1 = array(
            "success" => "success",
            "server_ps_seatid" => $server_ps_seatid,
            "BingoBallsHTML" => $BingoBallsHTML,
            "psTicketsArchiveHTML" => $psTicketsArchiveHTML,
            "html" => $testPage,
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    
    public function ajax_statRouletteHistory(Request $request)
    {
        $dataRowID = $request['rowID'];
        $dataRowTS = $request['rowTS'];
        $historys = GameHistory::where('ts', $dataRowTS)->orderBy('ts', 'desc')->first();
        $server_ps = ServerPs::where('psid', $historys->psid )->first();
        if ($server_ps != null){
            $seatid = "PS: " . $server_ps->seatid . ", Time: " . date("Y-m-d H:i:s", strtotime($historys->ts));
        }else{ //PS: 2, Time: 2016-09-13 16:05:33.747872
            $seatid = "PS: Missing saitid (PSID is $historys->psid ), Time: " . date('Y-m-d H:i:s', strtotime($historys->ts)); 
        }
        $positions = array();
        $positionN =161;
        $num_max = $positionN + 1;
        $blob = $historys->bets ;
        $positionsStr = unpack('S' . $num_max, stream_get_contents($blob, -1, 0));
        for ($i = 1; $i <= $num_max; $i++) {
            if($positionsStr[$i] > 0) {
                $positions[$i  - 1] = $positionsStr[$i];
            }
        }
        $rlt_chip_positions = array();
        $rlt_chip_positions = $this->chip_positions();
       
        $testPage = view('statistics.rouletteHistory', ['positions' => $positions, 'rlt_chip_positions' => $rlt_chip_positions])->render();
       
        $dataArray1 = array(
            "success" => "success",
            "dataRowID" => $dataRowID,
            "seatid" => $seatid,
            "winNumber" => $historys->win_num,
            "totalBet" =>  number_format($historys->bet / 100, 2),
            "totalWin" =>  number_format($historys->win_val / 100, 2),
            "jackpotWon" =>  number_format($historys->jackpot / 100, 2),
            "html" => $testPage,
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    
    
    public function chip_positions()
    {
        $rlt_chip_positions = array();
        $rlt_chip_positions[0]= array('left' => 20, 'top' => 300);
        $rlt_chip_positions[1]= array('left' => 125, 'top' => 340);
        $rlt_chip_positions[2]= array('left' => 125, 'top' => 235);
        $rlt_chip_positions[3]= array('left' => 125, 'top' => 125);
        $rlt_chip_positions[4]= array('left' => 228, 'top' => 340);
        $rlt_chip_positions[5]= array('left' => 228, 'top' => 235);
        $rlt_chip_positions[6]= array('left' => 228, 'top' => 125);
        $rlt_chip_positions[7]= array('left' => 330, 'top' => 340);
        $rlt_chip_positions[8]= array('left' => 330, 'top' => 235);
        $rlt_chip_positions[9]= array('left' => 330, 'top' => 125);
   
        $rlt_chip_positions[10]= array('left' => 433, 'top' => 340);
        $rlt_chip_positions[11]= array('left' => 433, 'top' => 235);
        $rlt_chip_positions[12]= array('left' => 433, 'top' => 125);
        $rlt_chip_positions[13]= array('left' => 535, 'top' => 340);
        $rlt_chip_positions[14]= array('left' => 535, 'top' => 235);
        $rlt_chip_positions[15]= array('left' => 535, 'top' => 125);
        $rlt_chip_positions[16]= array('left' => 638, 'top' => 340);
        $rlt_chip_positions[17]= array('left' => 638, 'top' => 235);
        $rlt_chip_positions[18]= array('left' => 638, 'top' => 125);
        $rlt_chip_positions[19]= array('left' => 740, 'top' => 340);
        
        $rlt_chip_positions[20]= array('left' => 740, 'top' => 235);
        $rlt_chip_positions[21]= array('left' => 740, 'top' => 125);
        $rlt_chip_positions[22]= array('left' => 843, 'top' => 340);
        $rlt_chip_positions[23]= array('left' => 843, 'top' => 235);
        $rlt_chip_positions[24]= array('left' => 843, 'top' => 125);
        $rlt_chip_positions[25]= array('left' => 945, 'top' => 340);
        $rlt_chip_positions[26]= array('left' => 945, 'top' => 235);
        $rlt_chip_positions[27]= array('left' => 945, 'top' => 125);
        $rlt_chip_positions[28]= array('left' => 1045, 'top' => 340);
        $rlt_chip_positions[29]= array('left' => 1045, 'top' => 235);
        
        $rlt_chip_positions[30]= array('left' => 1045, 'top' => 125);
        $rlt_chip_positions[31]= array('left' => 1148, 'top' => 340);
        $rlt_chip_positions[32]= array('left' => 1148, 'top' => 235);
        $rlt_chip_positions[33]= array('left' => 1148, 'top' => 125);
        $rlt_chip_positions[34]= array('left' => 1250, 'top' => 340);
        $rlt_chip_positions[35]= array('left' => 1250, 'top' => 235);
        $rlt_chip_positions[36]= array('left' => 1250, 'top' => 125);
        // index 37 = double 0 (american roulette, don't have that here)
        $rlt_chip_positions[38]= array('left' => 270, 'top' => 20);
        $rlt_chip_positions[39]= array('left' => 685, 'top' => 20);
        
        $rlt_chip_positions[40]= array('left' => 1090, 'top' => 20);
        $rlt_chip_positions[41]= array('left' => 1355, 'top' => 340);
        $rlt_chip_positions[42]= array('left' => 1355, 'top' => 235);
        $rlt_chip_positions[43]= array('left' => 1355, 'top' => 125);
        $rlt_chip_positions[44]= array('left' => 178, 'top' => 445);
        $rlt_chip_positions[45]= array('left' => 385, 'top' => 445);
        $rlt_chip_positions[46]= array('left' => 585, 'top' => 445);
        $rlt_chip_positions[47]= array('left' => 790, 'top' => 445);
        $rlt_chip_positions[48]= array('left' => 995, 'top' => 445);
        $rlt_chip_positions[49]= array('left' => 1200, 'top' => 445);
        
        $rlt_chip_positions[50]= array('left' => 76, 'top' => 290);
        $rlt_chip_positions[51]= array('left' => 76, 'top' => 182);
        $rlt_chip_positions[52]= array('left' => 125, 'top' => 395);
        $rlt_chip_positions[53]= array('left' => 230, 'top' => 395);
        $rlt_chip_positions[54]= array('left' => 330, 'top' => 395);
        $rlt_chip_positions[55]= array('left' => 433, 'top' => 395);
        $rlt_chip_positions[56]= array('left' => 535, 'top' => 395);
        $rlt_chip_positions[57]= array('left' => 638, 'top' => 395);
        $rlt_chip_positions[58]= array('left' => 740, 'top' => 395);
        $rlt_chip_positions[59]= array('left' => 843, 'top' => 395);
   
        $rlt_chip_positions[60]= array('left' => 945, 'top' => 395);
        $rlt_chip_positions[61]= array('left' => 1045, 'top' => 395);
        $rlt_chip_positions[62]= array('left' => 1148, 'top' => 395);
        $rlt_chip_positions[63]= array('left' => 1250, 'top' => 395);
        $rlt_chip_positions[64]= array('left' => 180, 'top' => 395);
        $rlt_chip_positions[65]= array('left' => 280, 'top' => 395);
        $rlt_chip_positions[66]= array('left' => 382, 'top' => 395);
        $rlt_chip_positions[67]= array('left' => 485, 'top' => 395);
        $rlt_chip_positions[68]= array('left' => 585, 'top' => 395);
        $rlt_chip_positions[69]= array('left' => 688, 'top' => 395);
   
        $rlt_chip_positions[70]= array('left' => 790, 'top' => 395);
        $rlt_chip_positions[71]= array('left' => 893, 'top' => 395);
        $rlt_chip_positions[72]= array('left' => 995, 'top' => 395);
        $rlt_chip_positions[73]= array('left' => 1098, 'top' => 395);
        $rlt_chip_positions[74]= array('left' => 1200, 'top' => 395);
        $rlt_chip_positions[75]= array('left' => 75, 'top' => 395);
        $rlt_chip_positions[76]= array('left' => 180, 'top' => 290);
        $rlt_chip_positions[77]= array('left' => 280, 'top' => 290);
        $rlt_chip_positions[78]= array('left' => 382, 'top' => 290);
        $rlt_chip_positions[79]= array('left' => 485, 'top' => 290);
        
        $rlt_chip_positions[80]= array('left' => 585, 'top' => 290);
        $rlt_chip_positions[81]= array('left' => 688, 'top' => 290);
        $rlt_chip_positions[82]= array('left' => 790, 'top' => 290);
        $rlt_chip_positions[83]= array('left' => 893, 'top' => 290);
        $rlt_chip_positions[84]= array('left' => 995, 'top' => 290);
        $rlt_chip_positions[85]= array('left' => 1098, 'top' => 290);
        $rlt_chip_positions[86]= array('left' => 1200, 'top' => 290);
        $rlt_chip_positions[87]= array('left' => 180, 'top' => 182);
        $rlt_chip_positions[88]= array('left' => 280, 'top' => 182);
        $rlt_chip_positions[89]= array('left' => 382, 'top' => 182);
   
        $rlt_chip_positions[90]= array('left' => 485, 'top' => 182);
        $rlt_chip_positions[91]= array('left' => 585, 'top' => 182);
        $rlt_chip_positions[92]= array('left' => 688, 'top' => 182);
        $rlt_chip_positions[93]= array('left' => 790, 'top' => 182);
        $rlt_chip_positions[94]= array('left' => 893, 'top' => 182);
        $rlt_chip_positions[95]= array('left' => 995, 'top' => 182);
        $rlt_chip_positions[96]= array('left' => 1098, 'top' => 182);
        $rlt_chip_positions[97]= array('left' => 1200, 'top' => 182);
        $rlt_chip_positions[98]= array('left' => 75, 'top' => 340);
        $rlt_chip_positions[99]= array('left' => 180, 'top' => 340);
   
        $rlt_chip_positions[100]= array('left' => 280, 'top' => 340);
        $rlt_chip_positions[101]= array('left' => 382, 'top' => 340);
        $rlt_chip_positions[102]= array('left' => 485, 'top' => 340);
        $rlt_chip_positions[103]= array('left' => 585, 'top' => 340);
        $rlt_chip_positions[104]= array('left' => 688, 'top' => 340);
        $rlt_chip_positions[105]= array('left' => 790, 'top' => 340);
        $rlt_chip_positions[106]= array('left' => 893, 'top' => 340);
        $rlt_chip_positions[107]= array('left' => 995, 'top' => 340);
        $rlt_chip_positions[108]= array('left' => 1098, 'top' => 340);
        $rlt_chip_positions[109]= array('left' => 1200, 'top' => 340);
        
        $rlt_chip_positions[110]= array('left' => 75, 'top' => 235);
        $rlt_chip_positions[111]= array('left' => 180, 'top' => 235);
        $rlt_chip_positions[112]= array('left' => 280, 'top' => 235);
        $rlt_chip_positions[113]= array('left' => 382, 'top' => 235);
        $rlt_chip_positions[114]= array('left' => 485, 'top' => 235);
        $rlt_chip_positions[115]= array('left' => 585, 'top' => 235);
        $rlt_chip_positions[116]= array('left' => 688, 'top' => 235);
        $rlt_chip_positions[117]= array('left' => 790, 'top' => 235);
        $rlt_chip_positions[118]= array('left' => 893, 'top' => 235);
        $rlt_chip_positions[119]= array('left' => 995, 'top' => 235);
   
        $rlt_chip_positions[120]= array('left' => 1098, 'top' => 235);
        $rlt_chip_positions[121]= array('left' => 1200, 'top' => 235);
        $rlt_chip_positions[122]= array('left' => 75, 'top' => 125);
        $rlt_chip_positions[123]= array('left' => 180, 'top' => 125);
        $rlt_chip_positions[124]= array('left' => 280, 'top' => 125);
        $rlt_chip_positions[125]= array('left' => 382, 'top' => 125);
        $rlt_chip_positions[126]= array('left' => 485, 'top' => 125);
        $rlt_chip_positions[127]= array('left' => 585, 'top' => 125);
        $rlt_chip_positions[128]= array('left' => 688, 'top' => 125);
        $rlt_chip_positions[129]= array('left' => 790, 'top' => 125);
        
        $rlt_chip_positions[130]= array('left' => 893, 'top' => 125);
        $rlt_chip_positions[131]= array('left' => 995, 'top' => 125);
        $rlt_chip_positions[132]= array('left' => 1098, 'top' => 125);
        $rlt_chip_positions[133]= array('left' => 1200, 'top' => 125);
        $rlt_chip_positions[134]= array('left' => 125, 'top' => 290);
        $rlt_chip_positions[135]= array('left' => 230, 'top' => 290);
        $rlt_chip_positions[136]= array('left' => 330, 'top' => 290);
        $rlt_chip_positions[137]= array('left' => 433, 'top' => 290);
        $rlt_chip_positions[138]= array('left' => 535, 'top' => 290);
        $rlt_chip_positions[139]= array('left' => 638, 'top' => 290);
        
        $rlt_chip_positions[140]= array('left' => 740, 'top' => 290);
        $rlt_chip_positions[141]= array('left' => 843, 'top' => 290);
        $rlt_chip_positions[142]= array('left' => 945, 'top' => 290);
        $rlt_chip_positions[143]= array('left' => 1045, 'top' => 290);
        $rlt_chip_positions[144]= array('left' => 1148, 'top' => 290);
        $rlt_chip_positions[145]= array('left' => 1250, 'top' => 290);
        $rlt_chip_positions[146]= array('left' => 125, 'top' => 182);
        $rlt_chip_positions[147]= array('left' => 230, 'top' => 182);
        $rlt_chip_positions[148]= array('left' => 330, 'top' => 182);
        $rlt_chip_positions[149]= array('left' => 433, 'top' => 182);
        
        $rlt_chip_positions[150]= array('left' => 535, 'top' => 182);
        $rlt_chip_positions[151]= array('left' => 638, 'top' => 182);
        $rlt_chip_positions[152]= array('left' => 740, 'top' => 182);
        $rlt_chip_positions[153]= array('left' => 843, 'top' => 182);
        $rlt_chip_positions[154]= array('left' => 945, 'top' => 182);
        $rlt_chip_positions[155]= array('left' => 1045, 'top' => 182);
        $rlt_chip_positions[156]= array('left' => 1148, 'top' => 182);
        $rlt_chip_positions[157]= array('left' => 1250, 'top' => 182);
        
        $rlt_chip_positions[158]= array('left' => 485, 'top' => 20);
        $rlt_chip_positions[159]= array('left' => 893, 'top' => 20);
  
        $rlt_chip_positions[160]= array('left' => 1355, 'top' => 182);
        $rlt_chip_positions[161]= array('left' => 1355, 'top' => 290);
    
        return $rlt_chip_positions ;
    }
    
    
    
    public function ajax_statBJHistory(Request $request)
    {
        $dataRowID = $request['rowID'];
        $dataRowTS = $request['rowTS'];
        $historyClas = new BlackjackGameHistory();
        $historys = $historyClas->where('ts', $dataRowTS)->first();
        /*$server_ps = ServerPs::where('psid', $historys->psid )->first();
        if ($server_ps != null){
            $seatid = "PS: " . $server_ps->seatid . ", Time: " . date("Y-m-d H:i:s", strtotime($historys->ts));
        }else{ //PS: 2, Time: 2016-09-13 16:05:33.747872
            $seatid = "PS: Missing saitid (PSID is $historys->psid ), Time: " . date('Y-m-d H:i:s', strtotime($historys->ts)); 
        }*/
        $tableid = "Table: " . ($historys->table_idx + 1) . ", Time: " . date("Y-m-d H:i:s", strtotime($historys->ts));
        $totalWinArray = $historys->getArrayWin();
        $totalBetArray = $historys->getArrayBet();
        $insuranceArray = $historys->getArrayInsurance();
        $dblArray = $historys->getArrayDbl();
        $surrenderArray = $historys->getArraySurrender();
        $totalCards = $historys->getArrayCards();
        $cards = array();
        $totalSplitArray = array();
            foreach ($totalCards as $keyP2 => $valP2)
            {
                foreach ($valP2 as $keyP => $valP)
                {
                    foreach ($valP as $key => $val)
                    {
                        if ($val != 0){
                            if ($keyP == 1){
                                $totalSplitArray[$keyP2] = $totalBetArray[$keyP2] ;    
                            }else{
                                //$totalSplitArray[$keyP2] = 0;
                            }
        
                            if ($val > 128){
                                $cartRank = $val - 128;
                                if ($cartRank == 14) {
                                    $cartRank = "A";
                                }elseif ($cartRank == 13){
                                    $cartRank = "K";
                                }elseif ($cartRank == 12){
                                    $cartRank = "Q";
                                }elseif ($cartRank == 11){
                                    $cartRank = "J";
                                }
                                    
                                $cards[$keyP2][$keyP][$key] = array('val' => $val, 'cardRank' => $cartRank, 'cardSuit' => "pika"  ); // pika Spades
                            }elseif ($val > 64){
                                $cartRank = $val - 64;
                                if ($cartRank == 14) {
                                    $cartRank = "A";
                                }elseif ($cartRank == 13){
                                    $cartRank = "K";
                                }elseif ($cartRank == 12){
                                    $cartRank = "Q";
                                }elseif ($cartRank == 11){
                                    $cartRank = "J";
                                }
                                $cards[$keyP2][$keyP][$key] = array('val' => $val, 'cardRank' => $cartRank, 'cardSuit' => "kupa"  ); //kupa Hearts"
                             }elseif ($val > 32){
                                $cartRank = $val - 32;
                                if ($cartRank == 14) {
                                    $cartRank = "A";
                                }elseif ($cartRank == 13){
                                    $cartRank = "K";
                                }elseif ($cartRank == 12){
                                    $cartRank = "Q";
                                }elseif ($cartRank == 11){
                                    $cartRank = "J";
                                }
                                $cards[$keyP2][$keyP][$key] = array('val' => $val, 'cardRank' => $cartRank, 'cardSuit' => "karo"  ); //karo Diamonds
                            }else {
                                $cartRank = $val - 16;
                                if ($cartRank == 14) {
                                    $cartRank = "A";
                                }elseif ($cartRank == 13){
                                    $cartRank = "K";
                                }elseif ($cartRank == 12){
                                    $cartRank = "Q";
                                }elseif ($cartRank == 11){
                                    $cartRank = "J";
                                }
                                $cards[$keyP2][$keyP][$key] = array('val' => $val, 'cardRank' => $cartRank, 'cardSuit' => "spatiq"  );  //spatiq Clubs
                            }    
                        }
            
            
                    }
                }
            }    
       
        
        //var_dump($insuranceArray);
        $totalDblArray = array();
        foreach ($dblArray as $key => $val){
            foreach ($val as $keySub => $valSub){
                if ($valSub == 1){
                    if (empty($totalDblArray[$key])){
                        $totalDblArray[$key] = $totalBetArray[$key];
                    }else{
                        $totalDblArray[$key] += $totalBetArray[$key];
                    }
                        
                    
                }
            }
            
        } 
        $totalSurrenderArray = array();
        foreach ($surrenderArray as $key => $val){
            foreach ($val as $keySub => $valSub){
                if ($valSub == 1){
                        $totalSurrenderArray[$key] = $totalBetArray[$key] / 2;
                        $totalWinArray[$key] = 0 ;
                }
            }
            
        } //$surrenderArray
        $totalInsuranceArray  = array();
        foreach ($insuranceArray as $key => $val){
            if ($val == 1){
                $totalInsuranceArray[$key] = $totalBetArray[$key] / 2;
            }
        }
        
        $totalWin = array_sum($totalWinArray) + array_sum($totalSurrenderArray) ;
        $totalBet = array_sum($totalBetArray) + array_sum($totalDblArray) + array_sum($totalInsuranceArray) + array_sum($totalSplitArray) ;
        $testPage = view('statistics.BJ_History', ['cards' => $cards, 'totalBetArray' => $totalBetArray, 'totalWinArray' => $totalWinArray, 'totalDblArray' => $totalDblArray, 'totalInsuranceArray' => $totalInsuranceArray, 'totalSplitArray' => $totalSplitArray, 'totalSurrenderArray' => $totalSurrenderArray ])->render();
        
        $dataArray1 = array(
            "success" => "success",
            "dataRowID" => $totalSplitArray,
            "seatid" => $tableid,
            "totalBet" =>  number_format($totalBet / 100, 2),
            "totalWin" =>  number_format($totalWin / 100, 2),
            "html" => $testPage
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    
    
}
