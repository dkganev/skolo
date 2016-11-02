<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Blackjack\BlackjackTable;
use App\Models\Blackjack\MainConfig;

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
    	BlackjackTable::where('table_id', $request->table_id)->update($request->except('_token'));

      return response()->json(['success' => 'Success'], 200);
    }

   	public function main_config_edit(Request $request)
   	{
   	  MainConfig::first()->update($request->except('_token'));
   	}
}