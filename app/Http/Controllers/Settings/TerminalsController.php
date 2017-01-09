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
            'psid' => 'required|unique:server_ps',
            'dallasid' => 'required|unique:server_ps',
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

        $counters = [];
        for ($i = 0; $i <= 255; $i++) {
            $counters[] = 0;
        }

        $ps_counter->setCounters($counters);
        $server_ps->ps_counters()->save($ps_counter);
        $ps_counter->save();

        // Billing Config Model
        $billing_config = $server_ps->billing_config()->create([]);

        // Ps Status Model
        $ps_status = $server_ps->ps_status()->create([]);

        event(new TerminalAdded(request()->ip(), request()->user()->name, $request->psid));

        event(new TerminalCreated($request->psid, $request->seatid));

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
        return response()->json($response, 200);
    }

    public function reset_ps(Request $request)
    {
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

        $roulette_ps = PsConf::where('ps_id', $request->psid)->first();
        $roulette_ps->delete();
        return back();
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