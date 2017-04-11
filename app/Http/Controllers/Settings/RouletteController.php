<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Roulette\WheelSettings;
use App\Models\Roulette\WheelConfig;
use App\Models\Roulette\PsConf;
use App\Models\Roulette\AccConfig;
use App\Models\Roulette\MainConfig;
use App\Events\TerminalAdded;


class RouletteController extends Controller
{
    public function wheel_settings_index() {
    	session(['last_page' => 'settings/roulette1/wheelsettings']);
        session(['last_menu' => 'menuRoulette1']);
        $wheel_settings = WheelSettings::first();
        $main_config = MainConfig::first();

        return view('settings.roulette.roulette1.wheel-settings', compact('wheel_settings', 'main_config'));
    }

    public function wheel_settings_edit(Request $request)
    {
		// WheelSettings::first()->update($request->except('_token'));
        WheelSettings::first()->update([
            'wheel_label' => $request->wheel_label,
            'interface' => $request->interface,
            'current_ip_address' => ip2long($request->current_ip_address),
            'new_ip_addres' => ip2long($request->new_ip_addres),
            'subnet_mask' => ip2long($request->subnet_mask),
            'default_gateway' => ip2long($request->default_gateway),

            'volume_center' => $request->volume_center,
            'stream_url' => $request->stream_url,
            'heartbeat' => $request->heartbeat,
            'bet_time' => $request->bet_time,
            'idle_launch' => $request->idle_launch,
            'games' => $request->games,

            'statistics_orientation' => $request->statistics_orientation,
            'blow_speed' => $request->blow_speed,
            'rotor_speed' => $request->rotor_speed,
            'rlt_type' => $request->rlt_type,
            'auto_max_video' => $request->auto_max_video,
            'video_on_statistic' => $request->video_on_statistic,
        ]);

        // MainConfig::all()->update(['game_id' => $request->game_id]); $main_config->url = ($request->stream_url);
        event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Roulette 1 Wheel Settings Updated', 2));
        //$affected = \DB::connection('pgsql4')->table('mainconf')->update(['game_id' => $request->game_id]);
        $affected = \DB::connection('pgsql4')->table('mainconf')->update(['url' => $request->stream_url]);
    }

    public function wheel_config_index()
    {
    	session(['last_page' => 'settings/roulette1/wheelconfig']);
        session(['last_menu' => 'menuRoulette1']);
        $wheel_config = WheelConfig::first();
    	return view('settings.roulette.roulette1.wheel-config', compact('wheel_config'));
    }

    public function wheel_config_edit(Request $request)
    {
    	event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Roulette 1 Game Config Updated', 2));
        WheelConfig::first()->update($request->except('_token'));
        //$main_config = MainConfig::first();
        //$main_config->url = ($request->stream_url);
    }

    public function ps_config_index(Request $request)
    {
        session(['last_page' => 'settings/roulette1/psconfig']);
        session(['last_menu' => 'menuRoulette1']);
        if ($request['pageID']) {
            $page['pageID'] = $request['pageID'];
        
        } else {
            $page['pageID'] = 0;
        
        }
        $ps_conf = PsConf::orderBy('ps_id', 'asc')->get();
        return view('settings.roulette.roulette1.ps-config', ['ps_conf' => $ps_conf, 'page' => $page ]);
    }

    public function ps_config_edit(Request $request)
    {
        event(new TerminalAdded(request()->ip(), request()->user()->name, $request->ps_id , 'Roulette 1 Terminals Config Updated', 2));
        PsConf::where('ps_id', $request->ps_id)->first()->update($request->except('_token'));
    }

    public function ps_config_editAll(Request $request)
    {
        event(new TerminalAdded(request()->ip(), request()->user()->name, $request->ps_id , 'Roulette 1 Terminals Config Updated All', 2));
        $psidArray = PsConf::get();
        foreach ($psidArray as $val){
            PsConf::where('ps_id', $val->ps_id)->first()->update($request->except(['_token', 'ps_id'])); 
        }
    }

    public function acc_config_index()
    {
        session(['last_page' => 'settings/roulette1/accconfig']);
        session(['last_menu' => 'menuRoulette1']);
        $acc_config = AccConfig::first();
        return view('settings.roulette.roulette1.acc-config', compact('acc_config'));
    }

    public function acc_config_edit(Request $request)
    {
        event(new TerminalAdded(request()->ip(), request()->user()->name, $request->ps_id , 'Roulette 1 Accounting Config Updated', 2));
        AccConfig::first()->update($request->except('_token'));
    }
}