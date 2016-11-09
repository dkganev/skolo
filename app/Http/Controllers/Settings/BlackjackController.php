<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Blackjack\BlackjackTable;
use App\Models\Blackjack\MainConfig;
use App\Models\Blackjack\AccConfig;

class BlackjackController extends Controller
{
    public function main_config_index()
    {
        $config = MainConfig::first();

        return view('settings.blackjack.main-config', ['config' => $config]);
    }

    public function tables_index()
    {
        $tables = BlackjackTable::orderBy('table_id', 'asc')->get();

        return view('settings.blackjack.tables', ['tables' => $tables]);
    }

    public function table_edit(Request $request)
    {
        $table = BlackjackTable::where('table_id', $request->table_id)->first();

        $status = $table->update($request->except('_token', 'enabled'));
        $table->game_state->enabled = $request->enabled;
        $table->push();

        if (!$status) {
            $msg = 'Something Wrong Happend!';
            return response()->json(['response' => $msg], 400);
        }

        return response()->json(['response' => $table], 200);
    }
    
    public function main_config_edit(Request $request)
    {
        MainConfig::first()->update($request->except('_token'));
    }

    public function acc_config_index()
    {
        $acc_config = AccConfig::first();
        return view('settings.blackjack.acc-config', compact('acc_config'));
    }

    public function acc_config_edit(Request $request)
    {
        AccConfig::first()->update($request->except('_token'));
    }
}