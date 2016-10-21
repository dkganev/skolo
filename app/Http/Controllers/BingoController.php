<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Bingo\MainConfig;
use App\Models\Bingo\MyBonus;
use App\Models\Bingo\JackpotSteps;

class BingoController extends Controller
{
    public function main_config()
    {
    	$bingo = MainConfig::first();

    	return view('settings.bingo.main-config', ['bingo' => $bingo]);
    }

    public function my_bonus()
    {
    	$my_bonus = MyBonus::orderBy('id', 'asc')->get();

    	return view('settings.bingo.my-bonus', ['my_bonus' => $my_bonus]);
    }

    public function max_balls()
    {
        $jackpot_steps = JackpotSteps::orderBy('id', 'asc')->paginate(6);

    	return view('settings.bingo.max-balls', ['jackpot_steps' => $jackpot_steps]);
    }
}
