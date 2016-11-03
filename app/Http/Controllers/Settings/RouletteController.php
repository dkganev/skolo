<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;


class RouletteController extends Controller
{
    public function wheel_settings_index()
    {
        return view('settings.roulette.wheel-settings');
    }
}