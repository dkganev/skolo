<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Models\Accounting\ServerPs;
use App\Models\Accounting\PsSettings;
use App\Models\Accounting\PsCounters;
use App\Models\Accounting\BillingConfig;
use App\Models\Accounting\PsStatus;
use App\Models\Accounting\Casinos;
use App\Models\Accounting\Langs;
use App\Models\Accounting\ClientGameIds;
use App\Models\Roulette\PsConf;
use Excel;
use App\Events\TerminalAdded;
use App\Events\TerminalCreated;

class TerminalsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function settings()
    {
        return view('settings.index');
    }

    public function terminals()
    {
    	$server_ps = ServerPs::orderBy('psid', 'asc')->get();
        $casinos = Casinos::select(['casinoid', 'casinoname'])->get();
        $languages = Langs::orderBy('langid', 'asc')->get();
        $clientgameids = ClientGameIds::orderBy('client_game_id', 'asc')->get();

    	return view('settings.terminals', [
            'server_ps' => $server_ps,
            'casinos' => $casinos,
            'languages' => $languages,
            'clientgameids' => $clientgameids
        ]);
    }

    public function addTerminal(Request $request)
    {
        $this->validate($request, [
            'casinoid' => 'required',
            'ps_type' => 'required',
            'psid' => 'required|unique:server_ps',
            'dallasid' => 'required|unique:server_ps',
            'seatid' => 'required',
            'psdescription' => 'required',
            'default_game' => 'required',
            'games' => 'required',
            'default_lang' => 'required'
            
        ]);
        
        // Initialize current casino
        $casino = Casinos::where('casinoid', $request->casinoid)->first();

        // Server Ps Model
        $server_ps = $casino->server_ps()->create([
            'psid'     => $request->psid,
            'dallasid' => $request->dallasid,
            'seatid'   => $request->seatid,
        ]);
        
        // Ps Settings Model
        $ps_settings = new PsSettings();
        $ps_settings->psdescription = $request['psdescription'];
        $ps_settings->ps_type = $request['ps_type'];

        $ps_settings->enable_lang = '{' . $request['langname'] . '}';
        $ps_settings->default_lang = $request['default_lang'];

        $ps_settings->setSubscribedGames($request['games']);

    	$server_ps->ps_settings()->save($ps_settings);
        $ps_settings->save();

        // Ps Counters Model
        $ps_counter = new PsCounters();
        /*
        $counters = [];
        for ($i = 0; $i <= 255; $i++) {
            $counters[] = 0;
        }
        $ps_counter->setCounters($counters);
        $server_ps->ps_counters()->save($ps_counter);
        */
        $countersStr = "[0:255]={";
        $countersFirst = 0;
        for ($i = 0; $i <= 255; $i++) {
            if ($countersFirst == 0){
                $countersFirst = 1;
            }else{
               $countersStr .= ","; 
            }
            $countersStr .= 0;
        }
        $countersStr .= "}";
        $ps_counter->psid = $request->psid;
        $ps_counter->counter = $countersStr;
        $ps_counter->save();

        // Billing Config Model
        $billing_config = $server_ps->billing_config()->create([]);

        // Ps Status Model
        $ps_status = $server_ps->ps_status()->create([]);

        event(new TerminalAdded(request()->ip(), request()->user()->name, $request->psid , 'Terminal added!', 2));

        //event(new TerminalCreated($request->psid, $request->seatid));

        $response = [
            'msg' => 'Machine added Successfully'
        ];

        return response()->json($response, 200);
    }

    public function updateMachine(Request $request)
    {
        $this->validate($request, [
            'psid' => 'required',
            'seatid' => 'required',
            'dallasid'=> 'required',
            'ps_type'=> 'required',
            'psdescription'=> 'required',
        ]);

        $server_ps = ServerPs::where('psid', '=', $request['psid'])->first();
        $server_ps->seatid = $request['seatid'];
        $server_ps->dallasid = $request['dallasid'];
        $server_ps->update();
        
        $ps_settings = PsSettings::where('psid', '=', $request['psid'])->first();
        
        $ps_settings->psdescription = $request['psdescription'];
        $ps_settings->ps_type = $request['ps_type'];

        $ps_settings->default_lang = $request['default_lang'];
        $ps_settings->enable_lang = '{' . $request['langname'] . '}';

        $ps_settings->default_game = $request['default_game'];

        $ps_settings->setSubscribedGames($request['games']);
        $ps_settings->update();

        $response = [
            'server_ps' => $server_ps,
            'msg'       => 'Machine Updated Successfully'
        ];
        event(new TerminalAdded(request()->ip(), request()->user()->name, $request->psid , 'Machine Updated Successfully!', 2));
        return response()->json($response, 200);
    }

    public function reset_ps(Request $request)
    {
        event(new TerminalAdded(request()->ip(), request()->user()->name, $request->psid , 'Machine Reseted Successfully!', 2));
        
        DB::table('reset_ps')->insert(['psid' => $request->psid]);
    }

    public function destroy_ps(Request $request)
    {
        $server_ps = ServerPs::where('psid', '=', $request['psid'])->first();

        $server_ps->billing_config()->delete();
        $server_ps->ps_settings()->delete();
        $server_ps->ps_status()->delete();
        $server_ps->ps_counters()->delete();
        $server_ps->billing_config()->delete();
        //$server_ps->ps_errors()->delete();

        $server_ps->delete();
        //roulette1
        $roulette_ps = PsConf::where('ps_id', $request->psid)->first();
        //$roulette_ps->delete();
        if ($roulette_ps){
            $roulette_ps = PsConf::where('ps_id', $request->psid)->delete();
        }
        //roulette2
        $roulette_ps2 = new PsConf();
        $roulette_ps2->setConnection('pgsql6');
        $roulette_ps2_del = $roulette_ps2->where('ps_id', $request->psid)->first();
        if ($roulette_ps2_del){
            $roulette_ps3_del = $roulette_ps2->where('ps_id',$request->psid)->delete();
            
        }
        //BJ
        $BJ_ps2 = new PsConf();
        $BJ_ps2->setConnection('pgsql5');
        $BJ2_del = $BJ_ps2->where('ps_id', $request->psid)->first();
        if ($BJ2_del){
            //$BJ3_del = $BJ_ps2->where('ps_id',$request->psid)->delete();
            
        }
        event(new TerminalAdded(request()->ip(), request()->user()->name, $request->psid , 'Machine Deleted!', 2));
        
        return back();
        //return "test-" . $BJ2_del;
    }

    public function exportTerminals()
    {
        $server_ps = ServerPs::orderBy('psid', 'asc')->get();
        $export = array();
        foreach ($server_ps as $key => $val) {
            $export[$key] = array(
                'Dallas ID' => $val->dallasid, 
                'PS ID' => $val->psid,
                'Seat ID' =>  $val->seatid, 
                'Description' => $val->ps_settings->psdescription,
                'Type' => $val->ps_settings->ps_type === 0 ? "PlayStation" : (
                                    $val->ps_settings->ps_type === 1 ? "Statistics" : (
                                    $val->ps_settings->ps_type === 2 ? "Sphere" : (
                                    $val->ps_settings->ps_type === 3 ? "Balls" : (
                                    $val->ps_settings->ps_type === 4 ? "Wheel" : (
                                    $val->ps_settings->ps_type === 5 ? "Statistic RLT" : (
                                    $val->ps_settings->ps_type === 6 ? "Jackpot Statistic" : 0 )))))),
                'Status' => $val->ps_status->bonline ? 'Online' : 'Offline',
                'IP Adress' => $val->ps_status->ip,
                'Casino' => $val->casino->casinoname
            );
        }
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

    public function export_psql_array($id = 1)
    {   
        $ps_settings = PsSettings::where('psid', '=', $id)->first();
        $postgresArray = $ps_settings->subscribed;

        $postgresStr = trim($postgresArray,'{}');
        $elmts = explode(',',$postgresStr);
        return $elmts;
    }
}