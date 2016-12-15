<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Roulette\Roulette2\PsConf;
use App\Models\Roulette\Roulette2\AccConfig;
use App\Models\Roulette\Roulette2\MainConfig;
use App\Models\Roulette\Roulette2\WheelConfig;
use App\Models\Roulette\Roulette2\WheelSettings;

class RouletteTwoController extends Controller
{
    public function wheel_settings_index()
    {
    	$wheel_settings = WheelSettings::first();
        $main_config = MainConfig::first();

        return view('settings.roulette.roulette2.wheel-settings', compact('wheel_settings', 'main_config'));
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

        $affected = \DB::connection('pgsql6')->table('mainconf')->update(['game_id' => $request->game_id]);
    }

    public function wheel_config_index()
    {
    	$wheel_config = WheelConfig::first();
    	return view('settings.roulette.roulette2.wheel-config', compact('wheel_config'));
    }

    public function wheel_config_edit(Request $request)
    {
    	WheelConfig::first()->update($request->except('_token'));;
    }

    public function ps_config_index()
    {
        $ps_conf = PsConf::orderBy('ps_id', 'asc')->get();
        return view('settings.roulette.roulette2.ps-config', ['ps_conf' => $ps_conf]);
    }

    public function ps_config_edit(Request $request)
    {
        PsConf::where('ps_id', $request->ps_id)->first()->update($request->except('_token'));
    }

    public function acc_config_index()
    {
        $acc_config = AccConfig::first();
        return view('settings.roulette.roulette2.acc-config', compact('acc_config'));
    }

    public function acc_config_edit(Request $request)
    {
        AccConfig::first()->update($request->except('_token'));
    }
}