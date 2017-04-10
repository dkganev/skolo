<?php


namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Events\TerminalAdded;
use Illuminate\Support\Facades\DB;
//use DB;
use Excel;
use App\Models\Accounting\Games;
use App\Models\Accounting\ServerPs;
use App\Models\Slots\PsConf;
use App\Models\Slots\AccConf;


class SlotsController extends Controller
{
    public function psconfig_index(Request $request){
        session(['last_page' => '/settings/slots/psconfig']);
        session(['last_menu' => 'menuSlots']);
        $games = Games::orderBy('description', 'asc')->get();
        //$server_ps = ServerPs::orderBy('psid', 'asc')->get();
        
        
        return view('settings.slots.psconfig', ['games' => $games, ]);
    }
    
    public function SlotsChanePS(Request $request){
        $gameid = $request['gameid'];
        //$description = $request['description'];
        //$psid = $request['psid']; 
        //$table = $request['table']; 
        $dbID = 100 + $gameid;
        $server_ps = ServerPs::orderBy('psid', 'asc')->get();
            $results = DB::connection('pgsql'. $dbID)->select(' 
               SELECT
                ps_id
                FROM psconf
               ');
            $idArray = array();
            foreach ($results as $key => $val){
                $idArray[$key] = $val->ps_id;
                
            }
        
        $testPage = view('settings.slots.psTable', ['server_ps' => $server_ps, 'idArray' => $idArray ])->render();
        $dataArray1 = array(
            "success" => "success",
            //"gameid" => $gameid,
            //"description" => $description,
            //"psid" => $psid,
            //"table" => $table,
            //"result" => $idArray ,
            "html" => $testPage,
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
        
        
        
    //return view('settings.slots.psconfig', ['games' => $games, 'server_ps' => $server_ps]);
    }
    public function SlotsChaneGame(Request $request){
        $gameid = $request['gameid'];
        $description = $request['description'];
        $psid = $request['psid']; 
        $table = $request['table']; 
        $dbID = 100 + $gameid;
        //$denomRTP = array();
        if ($table == 'psconf'){
            $results = DB::connection('pgsql'. $dbID)->select(' 
               SELECT
                *
                FROM ' . $table . '
                WHERE ps_id = '. $psid . '
               ');
            if ($gameid == 7){$denomRTP = array(9645,9389);}
            else if ($gameid == 10){$denomRTP = array(9601,9504,9414,9318,9230,9131,9028,8915,8814);}
            else if ($gameid == 11){$denomRTP = array(9578);}
            else if ($gameid == 12){$denomRTP = array(9574);}
            else if ($gameid == 13){$denomRTP = array(9553);}
            else if ($gameid == 14){$denomRTP = array(9581);}
            else if ($gameid == 15){$denomRTP = array(9623,9521,9440,9330,9238,9119,9023,8936,8833);}
            else if ($gameid == 16){$denomRTP = array(9597,9501,9408,9313,9209,9115,9007,8910,8812);}
            else if ($gameid == 17){$denomRTP = array(9637,9419);}
            else if ($gameid == 18){$denomRTP = array(9624,9353);}
            else if ($gameid == 19){$denomRTP = array(9579);}
            else if ($gameid == 20){$denomRTP = array(9551);}
            else if ($gameid == 21){$denomRTP = array(9609,9509,9409,9309,9209,9106,9006,8906,8810);}
            else if ($gameid == 22){$denomRTP = array(9645,9389);}
            else if ($gameid == 24){$denomRTP = array(9609,9509,9409,9309,9209,9106,9006,8906,8810);}
            else if ($gameid == 40){$denomRTP = array(9576,9508,9428);}
            else if ($gameid == 41){$denomRTP = array(9603,9508,9413,9322,9213,9105,9002,8908,8821);}
            else if ($gameid == 42){$denomRTP = array(9614,9535,9439,9314,9229,9131,9023,8921,8841);}
            else if ($gameid == 45){$denomRTP = array(9630,9529,9438,9333,9232,9135,9032,8936,8836);}
            else if ($gameid == 46){$denomRTP = array(9637,9419);}
            else if ($gameid == 48){$denomRTP = array(9623,9521,9440,9330,9238,9119,9023,8936,8833);}
            else if ($gameid == 49){$denomRTP = array(9576,9506,9428);}
            else if ($gameid == 50){$denomRTP = array(9644,9526,9435,9329,9232,9128,9023,8921,8829);}
            else if ($gameid == 51){$denomRTP = array(9579);}
            else if ($gameid == 52){$denomRTP = array(9603,9508,9413,9322,9213,9105,9002,8908,8821);}
            else if ($gameid == 53){$denomRTP = array(9532);}
            else if ($gameid == 54){$denomRTP = array(9617,9522,9442,9341,9245,9145,9045,8947,8844);}
            else if ($gameid == 57){$denomRTP = array(9604,9511,9405,9304,9203,9109,9005,8911,8808);}
            else if ($gameid == 58){$denomRTP = array(9610,9507,9432,9308,9227,9107,9007);}
            else if ($gameid == 59){$denomRTP = array(9608,9517,9437,9339,9233,9133,9037,8944,8847);}
            else if ($gameid == 60){$denomRTP = array(9604,9521,9426,9321,9215);}
            else if ($gameid == 62){$denomRTP = array(9612,9547,9442);}
            else if ($gameid == 63){$denomRTP = array(9581);}
            else{$denomRTP = array(9645,9389); }
        
            $testPage = view('settings.slots.psconfig2', ['results' => $results, 'denomRTP' => $denomRTP  ])->render();
        }else if ($table == 'acc_config'){
            $results = DB::connection('pgsql'. $dbID)->select(' 
               SELECT
                *
                FROM ' . $table . '
                WHERE id = 1
               ');
            $testPage = view('settings.slots.acc', ['results' => $results])->render();
            
        }
        
        
        $dataArray1 = array(
            "success" => "success",
            "gameid" => $gameid,
            "description" => $description,
            "psid" => $psid,
            "table" => $table,
            //"result" => $result ,
            "html" => $testPage,
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
        
    }    
    
    
    public function psconfUpdate(Request $request){
        $gameid = $request['gameid'];
        $dbID = 100 + $gameid;
        $PsConf = new PsConf();
        $PsConf->setConnection('pgsql'. $dbID);
        $PsConf->where('ps_id', $request->ps_id)->first()->update($request->except(['_token', 'gameid']) ); 
        
        $dataArray1 = array(
            "success" => "success",
            //"gameid" => $gameid,
            //"description" => $description,
            //"psid" => $psid,
            //"table" => $table,
            //"result" => $result ,
            //"html" => $testPage,
        );
        event(new TerminalAdded(request()->ip(), request()->user()->name, $request->ps_id , 'Slot Game Gonfig Settings Were Updated!', 2));
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    
    public function psconfUpdateAll(Request $request){
        $gameid = $request['gameid'];
        $dbID = 100 + $gameid;
        $results = DB::connection('pgsql'. $dbID)->select(' 
               SELECT
                ps_id
                FROM psconf
               ');
            $idArray = array();
        $PsConf = new PsConf();
        $PsConf->setConnection('pgsql'. $dbID);
        //$PsConf->get()->update($request->except(['_token', 'gameid', 'ps_id']) ); 
            foreach ($results as $key => $val){
                $PsConf->where('ps_id', $val->ps_id)->first()->update($request->except(['_token', 'gameid', 'ps_id']) ); 
        
            }
        //$PsConf->get()->update($request->except(['_token', 'gameid']) ); 
        
        $dataArray1 = array(
            "success" => "success",
            //"gameid" => $gameid,
            //"description" => $description,
            //"psid" => $psid,
            //"table" => $table,
            //"result" => $result ,
            //"html" => $testPage,
        );
        event(new TerminalAdded(request()->ip(), request()->user()->name, $request->ps_id , 'Slot Game Gonfig Settings Were Updated!', 2));
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
     
     public function accUpdate(Request $request){
        $gameid = $request['gameid'];
        $dbID = 100 + $gameid;
        $AccConf = new AccConf();
        $AccConf->setConnection('pgsql'. $dbID);
        $AccConf->first()->update($request->except(['_token', 'gameid']) ); 
        
        $dataArray1 = array(
            "success" => "success",
            //"gameid" => $gameid,
            //"description" => $description,
            //"psid" => $psid,
            //"table" => $table,
            //"result" => $result ,
            //"html" => $testPage,
        );
        event(new TerminalAdded(request()->ip(), request()->user()->name, $request->ps_id , 'Slot Acc Gonfig Settings Were Updated!', 2));
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
         
         
    
    
     }
     
     
}