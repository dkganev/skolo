<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Blackjack\BlackjackTable;
use App\Models\Blackjack\MainConfig;

class BlackjackController extends Controller
{
    public function main_config()
    {
        $tables = BlackjackTable::orderBy('table_id', 'asc')->get();
        $config = MainConfig::first();

    	return view('settings.blackjack.main-config', ['tables' => $tables, 'config' => $config]);
    }

    public function table_edit(Request $request)
    {
    	BlackjackTable::where('table_id', $request->table_id)->update($request->except('_token'));
    }

   	public function main_config_edit(Request $request)
   	{
   		MainConfig::first()->update($request->except('_token'));
   	}
}