<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Bingo\MainConfig;
use App\Models\Bingo\MyBonus;
use App\Models\Bingo\JackpotSteps;
use DB;

class BingoController extends Controller
{
    public function main_config()
    {
    	$bingo = MainConfig::first();

    	return view('settings.bingo.main-config', ['bingo' => $bingo]);
    }

    public function main_config_edit(Request $request)
    {
        DB::connection('pgsql3')
                        ->table('mainconf')
                        ->where('casino_id', 1)
                        ->update($request->except('_token'));

        return response()->json(['msg' => 'success']);
    }

    public function my_bonus()
    {
    	$my_bonus = MyBonus::orderBy('id', 'asc')->get();

    	return view('settings.bingo.my-bonus', ['my_bonus' => $my_bonus]);
    }

    public function my_bonus_edit(Request $request)
    {
        DB::connection('pgsql3')->table('my_bonus')->where('id', $request->id)->update([
            // Settings
            'ticket_cnt' => $request->ticket_cnt,
            'max_ball_idx' => $request->max_ball_idx
        ]);

        return redirect('/settings');
    }

    public function max_balls_index()
    {
        $jackpot_steps = JackpotSteps::orderBy('id', 'asc')->get();

    	return view('settings.bingo.max-balls', ['jackpot_steps' => $jackpot_steps]);
    }

    public function max_balls_store(Request $request)
    {
        DB::connection('pgsql3')->table('jackpot_steps')->insert([

            'bingo_ticket_cost' => $request->bingo_ticket_cost,
            'jackpot_bingo_max_ball' => $request->jackpot_bingo_max_ball,
            'jackpot_line_max_ball' => $request->jackpot_line_max_ball,
            'bonus_line_max_ball' => $request->bonus_line_max_ball,
            'bonus_bingo_max_ball' => $request->bonus_bingo_max_ball,
            'jackpo_line_ticket_cnt' => $request->jackpo_line_ticket_cnt,
            'jackpo_bingo_ticket_cnt' => $request->jackpo_bingo_ticket_cnt,
            'bonus_line_ticket_cnt' => $request->bonus_line_ticket_cnt,
            'bonus_bingo_ticket_cnt' => $request->bonus_bingo_ticket_cnt,
            'bingo_cost_fixed' => isset($request->bingo_cost_fixed) ? true : false

        ]);

        return redirect('/settings');
    }

    public function max_balls_edit(Request $request)
    {
        $jackpot_step = JackpotSteps::where('id', $request->id)->update($request->except('_token'));
    }

    public function max_balls_destroy(Request $request)
    {
        DB::connection('pgsql3')->table('jackpot_steps')->where('id', $request->id)->delete();
    }
}