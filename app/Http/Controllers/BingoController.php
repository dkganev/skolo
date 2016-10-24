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

    public function edit(Request $request)
    {
        $bingo_config = MainConfig::first();

        // Settings
        $bingo_config->bingo_ticket_cost = $request->bingo_ticket_cost;



        $bingo_config->bingo_win_pr = $request->bingo_win_pr;
        $bingo_config->bingo_line_pr = $request->bingo_line_pr;

        // Visible
        $bingo_config->mybonus_pr_visible = $request->mybonus_pr_visible;
        $bingo_config->bonus_line_pr_visible = $request->bonus_line_pr_visible;
        $bingo_config->bonus_bingo_pr_visible = $request->bonus_bingo_pr_visible;
        $bingo_config->jackpot_line_pr_visible = $request->jackpot_line_pr_visible;
        $bingo_config->jackpot_bingo_pr_visible = $request->jackpot_bingo_pr_visible;

        // Hidden
        $bingo_config->mybonus_pr_hidden = $request->mybonus_pr_hidden;
        $bingo_config->bonus_line_pr_hidden = $request->bonus_line_pr_hidden;
        $bingo_config->bonus_bingo_pr_hidden = $request->bonus_bingo_pr_hidden;
        $bingo_config->jackpot_line_pr_hidden = $request->jackpot_line_pr_hidden;
        $bingo_config->jackpot_bingo_pr_hidden = $request->jackpot_bingo_pr_hidden;


        $bingo_config->save();

        return redirect()->back();
    }

    public function my_bonus()
    {
    	$my_bonus = MyBonus::orderBy('id', 'asc')->get();

    	return view('settings.bingo.my-bonus', ['my_bonus' => $my_bonus]);
    }

    public function max_balls()
    {
        $jackpot_steps = JackpotSteps::orderBy('id', 'asc')->get();

    	return view('settings.bingo.max-balls', ['jackpot_steps' => $jackpot_steps]);
    }

    public function max_balls_edit(Request $request)
    {
        $jackpot_step = JackpotSteps::where('id', $id)->first();

        $jackpot_step->bingo_ticket_cost = $request->bingo_ticket_cost;
        $jackpot_step->jackpot_bingo_max_ball = $request->jackpot_bingo_max_ball;
        $jackpot_step->jackpot_line_max_ball = $request->jackpot_line_max_ball;
        $jackpot_step->bonus_line_max_ball = $request->bonus_line_max_ball;
        $jackpot_step->bonus_bingo_max_ball = $request->bonus_bingo_max_ball;
        $jackpot_step->jackpo_line_ticket_cnt = $request->jackpo_line_ticket_cnt;
        $jackpot_step->jackpo_bingo_ticket_cnt = $request->jackpo_bingo_ticket_cnt;
        $jackpot_step->bonus_line_ticket_cnt = $request->bonus_line_ticket_cnt;
        $jackpot_step->bonus_bingo_ticket_cnt = $request->bonus_bingo_ticket_cnt;
  
        $jackpot_step->save();

        return redirect()->back();
    }
}
