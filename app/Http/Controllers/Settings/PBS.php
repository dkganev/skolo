<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;


class PBS extends Controller  
{
    public function BonusPoints2Money()
    {
    	//$wheel_settings = WheelSettings::first();
        //return view('settings.roulette.roulette2.wheel-settings', ['wheel_settings' => $wheel_settings]);
        $wheel_settings = 1;
        return view('settings.PBS.BonusPoints2Money', ['wheel_settings' => $wheel_settings]);
    }
    
    public function Bet2BonusPoints()
    {
    	//$wheel_settings = WheelSettings::first();
        //return view('settings.roulette.roulette2.wheel-settings', ['wheel_settings' => $wheel_settings]);
        $wheel_settings = 1;
        return view('settings.PBS.Bet2BonusPoints', ['wheel_settings' => $wheel_settings]);
    }
    
    public function CardTypeBonusPeriod()
    {
    	//$wheel_settings = WheelSettings::first();
        //return view('settings.roulette.roulette2.wheel-settings', ['wheel_settings' => $wheel_settings]);
        $wheel_settings = 1;
        return view('settings.PBS.CardTypeBonusPeriod', ['wheel_settings' => $wheel_settings]);
    }
    
    
}    