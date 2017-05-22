<?php

namespace App\Http\Controllers\Statistics;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Accounting\Games;
use App\Models\Slots\BetWinHistory; 
use App\Models\Slots\GameHistory; 
use App\Models\Slots\Historylog; 
//use Smiarowski\Postgres\Model\Traits\PostgresArray;
use Excel;

class HistorySlots extends Controller
{
    public function historySlotsIndex(Request $request){
        session(['last_page' => 'statistics/historySlots']);
        session(['last_menu' => 'menuHistory']);
        $games = Games::orderBy('description', 'asc')->get();
        $discard = array (1,33,69,70);
        if ($request['arr']) {
            $page['arrayReq']= explode(",",$request['arr']);
            $page['rowsPerPage'] = $page['arrayReq'][0];
            $page['OrderQuery'] = $page['arrayReq'][1];
            $page['OrderDesc'] = $page['arrayReq'][2];
            $page['slotID'] = $page['arrayReq'][3];
            $page['sortMenuOpen'] = $page['arrayReq'][4];
        }else {
            $page['rowsPerPage'] = 20;
            $page['OrderQuery'] = 'timestamp';
            $page['OrderDesc'] = 'desc';
            $page['slotID'] = 52;
            $page['sortMenuOpen'] = 0;
        }
        $dbID = 100 + $page['slotID'];
        $gamesDescription = Games::where('gameid',$page['slotID'])->orderBy('description', 'asc')->first();
        $page['gamesDescription'] = $gamesDescription->description;
        $wherQuery = array();
        if ($request['array']){
            $arrayReq= explode(",",$request['array']);
            $page['FromGameTs'] = $arrayReq[0];
            $page['ToGameTs'] = $arrayReq[1];
            $page['game_sequence'] = $arrayReq[2];
            $page['ps_id'] = $arrayReq[3];
            $page['FromGameBet'] = $arrayReq[4];
            $page['ToGameBet'] = $arrayReq[5];
            $page['FromGameWin'] = $arrayReq[6];
            $page['ToGameWin'] = $arrayReq[7];
            $page['FromGameJackpot'] = $arrayReq[8];
            $page['ToGameJackpot'] = $arrayReq[9];
            $page['FromGameGamble'] = $arrayReq[10];
            $page['ToGameGamble'] = $arrayReq[11];
            $page['FromGameGambleWin'] = $arrayReq[12];
            $page['ToGameGambleWin'] = $arrayReq[13];
            
            
            if ($page['FromGameTs']){
                array_push($wherQuery,['timestamp', '>=', $page['FromGameTs']]);
            }
            if ($page['ToGameTs']){
                array_push($wherQuery,['timestamp', '<=', $page['ToGameTs']]);
            }
            if ($page['game_sequence']){
                array_push($wherQuery,['game_sequence', '=', $page['game_sequence']]);
            }
            if ($page['ps_id']){
                array_push($wherQuery,['ps_id', '=', $page['ps_id']]);
            }
            if ($page['FromGameBet']){
                array_push($wherQuery,['bet', '>=', $page['FromGameBet'] * 100]);
            }
            if ($page['ToGameBet']){
                array_push($wherQuery,['bet', '<=', $page['ToGameBet'] * 100]);
            }
            if ($page['FromGameWin']){
                array_push($wherQuery,['paytable_win', '>=', $page['FromGameWin'] * 100]);
            }
            if ($page['ToGameWin']){
                array_push($wherQuery,['paytable_win', '<=', $page['ToGameWin'] * 100]);
            }
            if ($page['FromGameJackpot']){
                array_push($wherQuery,['jackpot_win', '>=', $page['FromGameJackpot'] * 100]);
            }
            if ($page['ToGameJackpot']){
                array_push($wherQuery,['jackpot_win', '<=', $page['ToGameJackpot'] * 100]);
            }
            if ($page['FromGameGamble']){
                array_push($wherQuery,['gamble_attempts', '>=', $page['FromGameGamble'] * 100]);
            }
            if ($page['ToGameGamble']){
                array_push($wherQuery,['gamble_attempts', '<=', $page['ToGameGamble'] * 100]);
            }
            if ($page['FromGameGambleWin']){
                array_push($wherQuery,['gamble_win', '>=', $page['FromGameGambleWin'] * 100]);
            }
            if ($page['ToGameGambleWin']){
                array_push($wherQuery,['gamble_win', '<=', $page['ToGameGambleWin'] * 100]);
            }
            
        
            
        }else{
            $page['FromGameTs'] = "";
            $page['ToGameTs'] = "";
            $page['game_sequence'] = "";
            $page['ps_id'] = "";
            $page['FromGameBet'] = "";
            $page['ToGameBet'] = "";
            $page['FromGameWin'] = "";
            $page['ToGameWin'] = "";
            $page['FromGameJackpot'] = "";
            $page['ToGameJackpot'] = "";
            $page['FromGameGamble'] = "";
            $page['ToGameGamble'] = "";
            $page['FromGameGambleWin'] = "";
            $page['ToGameGambleWin'] = "";
        }
        
        $historyClas = new BetWinHistory();
        $historyClas->setConnection('pgsql'. $dbID);
        $historys = $historyClas->where($wherQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
        
        
        return view('statistics.historySlots', ['historys' => $historys, 'page' => $page, 'games' => $games, 'discard' => $discard ]); 
     
    }
    
    public function ajax_SlotModalHistory(Request $request){
        $rowID = $request['rowID'];
        $rowTS = $request['rowTS'];
        $rowGS = $request['rowGS'];
        $SlotID = $request['SlotID'];
        $dbID = 100 + $SlotID;
        $gameHistory = new GameHistory();
        $gameHistory->setConnection('pgsql'. $dbID);
        //$wherQuery = array(['ps_id', '=', $rowID ],['game_sequence', '=', $rowGS ], ['timestamp', '=', $rowTS]);
        $wherQuery = array(['ps_id', '=', $rowID ],['game_sequence', '=', $rowGS ]);
        $gameHistoryRes = $gameHistory->where($wherQuery)->first();
        
        
        $historylog = new Historylog();
        $historylog->setConnection('pgsql'. $dbID);
        //$game_id = unpack('S', stream_get_contents($blob, 2, $this->offset)); //Historylog
        //$wherQuery = array(['psid', '=', $rowID ],['game_sequence', '=', $rowGS ], ['event_type', '=', 1 ] );
        $wherQuery = array(['psid', '=', $rowID ],['game_sequence', '=', $rowGS ], ['event_type', '=', 128 ] );
        $historylogRes = $historylog->where($wherQuery)->first();
        $parse = array();
        $offset = 15;
        //$game_id = unpack('h30', stream_get_contents($historylogRes->data, -1, $offset));
        if (isset($historylogRes->data)){
            $game_id = unpack('C15', stream_get_contents($historylogRes->data, -1, $offset));
            $parse['message_id'] = $historylogRes->message_id;  
            //$parse['game_id'] = $game_id[1];
            
        } else {
            $game_id = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            $parse['message_id'] = 0;  
            //$parse['game_id'] = 0;
        }
        $dataArray1 = array( 
            "success" => "success",
            "gameHistoryRes" => $gameHistoryRes,
            "historylogRes" => $parse,
            "game_id" => $game_id,
            //"gameIDArrow" => $historys->rlt_seq,
            //"winNumber" => $historys->win_num,
            //"totalBet" =>  number_format($historys->bet / 100, 2),
            //"totalWin" =>  number_format($historys->win_val / 100, 2),
            //"jackpotWon" =>  number_format($historys->jackpot / 100, 2),
            //"html" => $testPage,
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);  
    }
}    