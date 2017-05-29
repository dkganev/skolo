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
            if ($request->session()->get('last_slot')){
               $page['slotID'] =  $request->session()->get('last_slot');
            }else{
               $page['slotID'] = 52; 
            }
            $page['sortMenuOpen'] = 0;
        }
        session(['last_slot' => $page['slotID']]);
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
        $wherQuery = array(['psid', '=', $rowID ],['game_sequence', '=', $rowGS ], ['event_type', '=', 128 ], ['timestamp', '>', $rowTS ] );
        $historylogRes = $historylog->where($wherQuery)->orderBy('timestamp', 'desc')->first();
        $parse = array();
        $offset = 15;
        //$game_id = unpack('h30', stream_get_contents($historylogRes->data, -1, $offset));
        $GamePositions = array(
            7  => [0 => 6, 1 => 9,  2=> 10, 3 => 8, 4=> 5, 5 => 2, 6 => 3, 7 => 0, 8 => 1, 9 => 7, 10 => 4, 255 => 100], //ok
            10 => [0 => 6, 1 => 4,  2=> 0, 3 => 8, 4=> 3, 5 => 2, 6 => 9, 7 => 1, 8 => 5, 9 => 10, 10 => 7, 255 => 100], //OK
            11 => [0 => 1, 1 => 3,  2=> 4, 3 => 5, 4=> 2, 5 => 7, 6 => 0, 7 => 8, 255 => 100],//ok
            12 => [0 => 0, 1 => 3,  2=> 2, 3 => 4, 4=> 6, 5 => 1, 6 => 5, 7 => 7, 255 => 100], //ok
            13 => [0 => 4, 1 => 7,  2=> 1, 3 => 6, 4=> 8, 5 => 2, 6 => 3, 7 => 0, 8 => 9, 9 => 5, 255 => 100], //ok
            14 => [0 => 0, 1 => 3,  2=> 2, 3 => 4, 4=> 6, 5 => 1, 6 => 7, 7 => 5, 255 => 100 ], //ok
            15 => [0 => 9, 1 => 8,  2=> 7, 3 => 6, 4=> 5, 5 => 2, 6 => 1, 7 => 4, 8 => 3, 9 => 0, 255 => 100], //ok
            16 => [0 => 2, 1 => 5,  2=> 0, 3 => 6, 4=> 7, 5 => 1, 6 => 3, 7 => 4, 8 => 10, 9 => 9, 10 => 8,11 => 11,12 => 12, 255 => 100], //ok
            17 => [0 => 1, 1 => 5,  2=> 6, 3 => 7, 4=> 0, 5 => 4, 6 => 9, 7 => 10, 8 => 2, 9 => 8, 10 => 3, 255 => 100],//ok
            18 => [0 => 8, 1 => 0,  2=> 1, 3 => 5, 4=> 3, 5 => 6, 6 => 2, 7 => 4, 8 => 7, 255 => 100], //OK 3 Coloni
            19 => [0 => 0, 1 => 1,  2=> 2, 3 => 3, 4=> 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10, 255 => 100], //----
            20 => [0 => 1, 1 => 2,  2=> 7, 3 => 5, 4=> 8, 5 => 6, 6 => 4, 7 => 3, 8 => 0, 255 => 100], //OK 3 Coloni
            21 => [0 => 9, 1 => 8,  2=> 7, 3 => 6, 4=> 5, 5 => 4, 6 => 3, 7 => 2, 8 => 1, 9 => 0, 255 => 100], //ok
            22 => [0 => 1, 1 => 2,  2=> 3, 3 => 0, 4=> 7, 5 => 8, 6 => 10, 7 => 4, 8 => 9, 9 => 5, 10 => 6, 255 => 100], //ok
            24 => [0 => 7, 1 => 9,  2=> 8, 3 => 6, 4=> 5, 5 => 0, 6 => 1, 7 => 2, 8 => 4, 9 => 3, 255 => 100], //ok
            40 => [0 => 0, 1 => 1,  2=> 2, 3 => 3, 4=> 0, 5 => 5, 6 => 6, 7 => 6, 8 => 6, 9 => 6, 10 => 6, 255 => 100],
            41 => [0 => 0, 1 => 0,  2=> 0, 3 => 0, 4=> 0, 5 => 0, 6 => 0, 7 => 1, 8 => 0, 9 => 0, 10 => 0, 255 => 100],
            42 => [0 => 0, 1 => 0,  2=> 0, 3 => 0, 4=> 0, 5 => 0, 6 => 0, 7 => 1, 8 => 0, 9 => 0, 10 => 0, 255 => 100],
            45 => [0 => 6, 1 => 0,  2=> 9, 3 => 4, 4=> 1, 5 => 3, 6 => 2, 7 => 8, 8 => 7, 9 => 5, 10 => 7, 255 => 100],  //OK 4 reda
            46 => [0 => 2, 1 => 5,  2=> 3, 3 => 0, 4=> 4, 5 => 1, 6 => 9, 7 => 8, 8 => 10, 9 => 6, 10 => 7, 255 => 100], //ok
            48 => [0 => 8, 1 => 7,  2=> 6, 3 => 5, 4=> 4, 5 => 3, 6 => 2, 7 => 1, 8 => 0, 9 => 9, 255 => 100], //ok
            49 => [0 => 2, 1 => 0,  2=> 7, 3 => 6, 4=> 5, 5 => 1, 6 => 8, 7 => 4, 8 => 3, 255 => 100], //ok
            50 => [0 => 5, 1 => 0,  2=> 2, 3 => 4, 4=> 3, 5 => 1, 6 => 8, 7 => 7, 8 => 6, 9 => 9, 10 => 10, 11 => 12, 12 => 11, 255 => 100],  ///ok
            51 => [0 => 0, 1 => 6,  2=> 2, 3 => 3, 4=> 1, 5 => 4, 6 => 7, 7 => 5, 255 => 100, 255 => 100], //ok
            52 => [0 => 11, 1 => 10,  2=> 9, 3 => 8, 4=> 7, 5 => 6, 6 => 5, 7 => 4, 8 => 3, 9 => 2, 10 => 0, 11 => 1, 255 => 100], //ok 4 reda
            53 => [0 => 11 , 255 => 100],
            54 => [0 => 0, 1 => 2,  2=> 1, 3 => 3, 4=> 8, 5 => 5, 6 => 6, 7 => 7, 8 => 4, 9 => 9, 10 => 10, 255 => 100], //bad data
            57 => [0 => 11, 1 => 10,  2=> 9, 3 => 8 , 4=> 7, 5 => 6, 6 => 5, 7 => 4, 8 => 3, 9 => 2, 10 => 0, 11 => 1, 255 => 100], //Ok 4 reda
            58 => [0 => 5, 1 => 7,  2=> 2, 3 => 3 , 4=> 8, 5 => 4, 6 => 9, 7 => 0, 8 => 10, 9 => 11, 10 => 12, 11 => 1, 255 => 100],     ////ok  12pic
            59 => [0 => 2, 1 => 5,  2=> 3, 3 => 0 , 4=> 8, 5 => 10, 6 => 1, 7 => 9, 8 => 4, 9 => 7, 10 => 6, 255 => 100],     //ok
            60 => [0 => 12, 1 => 11,  2=> 10, 3 => 9 , 4=> 8, 5 => 7, 6 => 6, 7 => 5, 8 => 4, 9 => 3, 10 => 2, 11 => 1, 12 => 0, 255 => 100], //ok    
            62 => [0 => 0, 1 => 4,  2=> 3, 3 => 5 , 4=> 8, 5 => 2, 6 => 6, 7 => 1, 8 => 7, 255 => 100],     //bad data
            63 => [0 => 7, 1 => 6,  2=> 5, 3 => 4 , 4=> 3, 5 => 2, 6 => 1, 7 => 0, 255 => 100],     //ok            
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
            21 => ['width' => 122, 'numPerRow' => 15],
            22 => ['width' => 122, 'numPerRow' => 15],
            24 => ['width' => 122, 'numPerRow' => 15],
            40 => ['width' => 122, 'numPerRow' => 15],
            41 => ['width' => 122, 'numPerRow' => 15],
            42 => ['width' => 122, 'numPerRow' => 15],
            45 => ['width' => 163, 'numPerRow' => 15],
            46 => ['width' => 122, 'numPerRow' => 15],
            48 => ['width' => 122, 'numPerRow' => 15],
            49 => ['width' => 122, 'numPerRow' => 15],
            50 => ['width' => 122, 'numPerRow' => 15],
            51 => ['width' => 122, 'numPerRow' => 15],
            52 => ['width' => 122, 'numPerRow' => 15],
            53 => ['width' => 122, 'numPerRow' => 15],
            54 => ['width' => 122, 'numPerRow' => 15],
            57 => ['width' => 163, 'numPerRow' => 15],
            58 => ['width' => 122, 'numPerRow' => 15],
            59 => ['width' => 122, 'numPerRow' => 15],
            60 => ['width' => 122, 'numPerRow' => 15],
            62 => ['width' => 121, 'numPerRow' => 15],
            63 => ['width' => 122, 'numPerRow' => 15],
            
        );
        if (isset($historylogRes->data)){
            $game_id2 = unpack('C20', stream_get_contents($historylogRes->data, -1, $offset));
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
                $game_id3[16] = 100; $game_id3[17] = 100; $game_id3[18] = 100; $game_id3[19] = 100; $game_id3[20] = 100;
                foreach ($game_id3 as $key => $val){
                    if ($val != 100  ){
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
            $game_id2 = unpack('C20', stream_get_contents($historylogRes->data, -1, $offset));
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
                $game_id3[16] = 100; $game_id3[17] = 100; $game_id3[18] = 100; $game_id3[19] = 100; $game_id3[20] = 100;
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
        $nextArrow = 1;
        $prevArrow = 1;
        $wherQuery2 = array(['ps_id', '=', $rowID ],['timestamp', '<', $gameHistoryRes['timestamp'] ]);
        //$gameHistoryRes2 = $gameHistory->where($wherQuery2)->orderBy('timestamp', 'asc')->first();
        if (!$gameHistory->where($wherQuery2)->count()){
            $prevArrow = 0;
        }
        
        $wherQuery2 = array(['ps_id', '=', $rowID ],['timestamp', '>', $gameHistoryRes['timestamp'] ]);
        //$gameHistoryRes2 = $gameHistory->where($wherQuery2)->orderBy('timestamp', 'desc')->first();
        if (!$gameHistory->where($wherQuery2)->count()){
            $nextArrow = 0;
        }
        
        
        $dataArray1 = array( 
            "success" => "success",
            "gameHistoryRes" => $gameHistoryRes,
            "historylogRes" => $parse,
            "game_id" => $game_id,
            "nextArrow" => $nextArrow,
            "prevArrow" =>  $prevArrow,
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);  
    }
    
    public function export2excelSlots(Request $request){
        //session(['last_page' => 'statistics/historySlots']);
        //session(['last_menu' => 'menuHistory']);
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
            if ($request->session()->get('last_slot')){
               $page['slotID'] =  $request->session()->get('last_slot');
            }else{
               $page['slotID'] = 52; 
            }
            $page['sortMenuOpen'] = 0;
        }
        //session(['last_slot' => $page['slotID']]);
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
        
        $export = array();
        foreach ($historys as $key => $history) {
            $export[$key] = array(
                'Time' => $history->timestamp, 
                'Game #' => $history->game_sequence,
                'Ps ID' =>  $history->ps_id, 
                'Total Bet' => $history->bet / 100,
                'Total Win' => $history->paytable_win / 100 ,
                'Jackpot' => $history->jackpot_win / 100,
                'Gamble Attempts' => $history->gamble_attempts / 100,
                'Gamble Win' => $history->gamble_win / 100
            );
            
        }
        
        Excel::create('Slots', function($excel) use($export){
            $excel->sheet('Slots', function($sheet) use($export){
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
    
        
        //return view('statistics.historySlots', ['historys' => $historys, 'page' => $page, 'games' => $games, 'discard' => $discard ]); 
     
    }
    
}   
