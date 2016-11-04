<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Roulette\WheelSettings;
use App\Models\Roulette\WheelConfig;

class RouletteController extends Controller
{
    public function wheel_settings_index()
    {
    	$wheel_settings = WheelSettings::first();
        return view('settings.roulette.wheel-settings', ['wheel_settings' => $wheel_settings]);
    }

    public function wheel_settings_edit(Request $request)
    {
		WheelSettings::first()->update($request->except('_token'));
    }

    public function wheel_config_index()
    {
    	$wheel_config = WheelConfig::first();
    	return view('settings.roulette.wheel-config', compact('wheel_config'));
    }

    public function wheel_config_edit(Request $request)
    {
    	WheelConfig::first()->update($request->except('_token'));;
    }
}