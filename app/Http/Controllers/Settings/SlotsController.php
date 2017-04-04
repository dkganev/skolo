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
        $games = Games::orderBy('gameid', 'asc')->get();
        $server_ps = ServerPs::orderBy('psid', 'asc')->get();
        
        
    return view('settings.slots.psconfig', ['games' => $games, 'server_ps' => $server_ps]);
    }
    
    public function SlotsChaneGame(Request $request){
        $gameid = $request['gameid'];
        $description = $request['description'];
        $psid = $request['psid']; 
        $table = $request['table']; 
        $dbID = 100 + $gameid;
        
        if ($table == 'psconf'){
            $results = DB::connection('pgsql'. $dbID)->select(' 
               SELECT
                *
                FROM ' . $table . '
                WHERE ps_id = '. $psid . '
               ');
            $testPage = view('settings.slots.psconfig2', ['results' => $results ])->render();
        }else if ($table == 'acc_config'){
            $results = DB::connection('pgsql'. $dbID)->select(' 
               SELECT
                *
                FROM ' . $table . '
                WHERE id = 1
               ');
            $testPage = view('settings.slots.acc', ['results' => $results ])->render();
            
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