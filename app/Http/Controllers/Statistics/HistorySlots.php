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
use App\Models\Slots\Cachelog; 
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
        $GamePositions = array(
            7  => [0 => 6, 1 => 4,  2=> 0, 3 => 8, 4=> 3, 5 => 2, 6 => 9, 7 => 1, 8 => 5, 9 => 10, 10 => 7],
            10 => [0 => 6, 1 => 4,  2=> 0, 3 => 8, 4=> 3, 5 => 2, 6 => 9, 7 => 1, 8 => 5, 9 => 10, 10 => 7],
            11 => [0 => 6, 1 => 4,  2=> 0, 3 => 8, 4=> 3, 5 => 2, 6 => 9, 7 => 1, 8 => 5, 9 => 10, 10 => 7],
            12 => [0 => 6, 1 => 4,  2=> 0, 3 => 8, 4=> 3, 5 => 2, 6 => 9, 7 => 1, 8 => 5, 9 => 10, 10 => 7],
            13 => [0 => 6, 1 => 4,  2=> 0, 3 => 8, 4=> 3, 5 => 2, 6 => 9, 7 => 1, 8 => 5, 9 => 10, 10 => 7],
            14 => [0 => 6, 1 => 4,  2=> 0, 3 => 8, 4=> 3, 5 => 2, 6 => 9, 7 => 1, 8 => 5, 9 => 10, 10 => 7],
            15 => [0 => 6, 1 => 4,  2=> 0, 3 => 8, 4=> 3, 5 => 2, 6 => 9, 7 => 1, 8 => 5, 9 => 10, 10 => 7],
            16 => [0 => 6, 1 => 4,  2=> 0, 3 => 8, 4=> 3, 5 => 2, 6 => 9, 7 => 1, 8 => 5, 9 => 10, 10 => 7],
            17 => [0 => 6, 1 => 4,  2=> 0, 3 => 8, 4=> 3, 5 => 2, 6 => 9, 7 => 1, 8 => 5, 9 => 10, 10 => 7],
            18 => [0 => 6, 1 => 4,  2=> 0, 3 => 8, 4=> 3, 5 => 2, 6 => 9, 7 => 1, 8 => 5, 9 => 10, 10 => 7],
            19 => [0 => 6, 1 => 4,  2=> 0, 3 => 8, 4=> 3, 5 => 2, 6 => 9, 7 => 1, 8 => 5, 9 => 10, 10 => 7],
            20 => [0 => 6, 1 => 4,  2=> 0, 3 => 8, 4=> 3, 5 => 2, 6 => 9, 7 => 1, 8 => 5, 9 => 10, 10 => 7],
            21 => [0 => 6, 1 => 4,  2=> 0, 3 => 8, 4=> 3, 5 => 2, 6 => 9, 7 => 1, 8 => 5, 9 => 10, 10 => 7],
            22 => [0 => 6, 1 => 4,  2=> 0, 3 => 8, 4=> 3, 5 => 2, 6 => 9, 7 => 1, 8 => 5, 9 => 10, 10 => 7],
            24 => [0 => 6, 1 => 4,  2=> 0, 3 => 8, 4=> 3, 5 => 2, 6 => 9, 7 => 1, 8 => 5, 9 => 10, 10 => 7],
        );    
        $GameProperty = array(
            7  => ['width' => 122, 'numPerRow' => 15],
            10 => ['width' => 122, 'numPerRow' => 15],
            11 => ['width' => 122, 'numPerRow' => 15],
            12 => ['width' => 122, 'numPerRow' => 15],
            13 => ['width' => 163, 'numPerRow' => 15],
            14 => ['width' => 122, 'numPerRow' => 15],
            15 => ['width' => 122, 'numPerRow' => 15],
            16 => ['width' => 122, 'numPerRow' => 15],
            17 => ['width' => 122, 'numPerRow' => 15],
            18 => ['width' => 208, 'numPerRow' =>  9],
            19 => ['width' => 122, 'numPerRow' => 15],
            20 => ['width' => 208, 'numPerRow' =>  9],
            21 => ['width' => 120, 'numPerRow' => 15],
            22 => ['width' => 122, 'numPerRow' => 15],
            24 => ['width' => 122, 'numPerRow' => 15],
            
        );
        if (isset($historylogRes->data)){
            $game_id2 = unpack('C15', stream_get_contents($historylogRes->data, -1, $offset));
            $parse['message_id'] = $historylogRes->message_id;
            $parse['GameProperty'] = $GameProperty[$SlotID];
            if ($GameProperty[$SlotID]['numPerRow'] == 9 ){
                $freeArray = array(3,6,9);
                $freeArray2 = array(5,10,15);
                
                $i = 1;
                foreach ($game_id2 as $key => $val){
                    if (in_array($key, $freeArray)){
                        $game_id3[$i] = $val;
                        $game_id3[$i + 1] = 100;
                        $game_id3[$i + 2] = 100; 
                        $i += 3;
                    }else if ($key >= 10) {
                     
                    } else {
                        $game_id3[$i] = $val;
                        $i += 1;        
                    }
                          
                }
                foreach ($game_id3 as $key => $val){
                    if ($val != 100 ){
                        $game_id[$key] = $GamePositions[$SlotID][$val];
                    } else {
                        $game_id[$key]= 100;
                    }
                }
                
            } else {
                
                foreach ($game_id2 as $key => $val){
                    $game_id[$key] = $GamePositions[$SlotID][$val];
                }
                
                //$game_id = $game_id2;
            }
        } else {
            $historylog = new Cachelog();
            $historylog->setConnection('pgsql'. $dbID);
            $wherQuery = array(['psid', '=', $rowID ],['game_sequence', '=', $rowGS ], ['event_type', '=', 128 ] );
            $historylogRes = $historylog->where($wherQuery)->first();
            $game_id2 = unpack('C15', stream_get_contents($historylogRes->data, -1, $offset));
            $parse['message_id'] = $historylogRes->message_id;
            $parse['GameProperty'] = $GameProperty[$SlotID];
            //$game_id = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            //$parse['message_id'] = 0;  
            //$parse['game_id'] = 0;
            if ($GameProperty[$SlotID]['numPerRow'] == 9 ){
                $freeArray = array(3,6,9);
                $freeArray2 = array(5,10,15);
                
                $i = 1;
                foreach ($game_id2 as $key => $val){
                    if (in_array($key, $freeArray)){
                        $game_id3[$i] = $val;
                        $game_id3[$i + 1] = 100;
                        $game_id3[$i + 2] = 100; 
                        $i += 3;
                    }else if ($key >= 10) {
                     
                    } else {
                        $game_id3[$i] = $val;
                        $i += 1;        
                    }
                          
                }
                foreach ($game_id3 as $key => $val){
                    if ($val != 100 ){
                        $game_id[$key] = $GamePositions[$SlotID][$val];
                    } else {
                        $game_id[$key]= 100;
                    }
                }
                
            } else {
                foreach ($game_id2 as $key => $val){
                    $game_id[$key] = $GamePositions[$SlotID][$val];
                }
                //$game_id = $game_id2;
            }
        }
        $dataArray1 = array( 
            "success" => "success",
            "gameHistoryRes" => $gameHistoryRes,
            "historylogRes" => $parse,
            "game_id" => $game_id,
            //"game_id2" => $game_id2,
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