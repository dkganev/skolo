<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Blackjack\BlackjackTable;

class BlackjackController extends Controller
{
    public function main_config()
    {
        $tables = BlackjackTable::orderBy('table_id', 'asc')->get();

    	return view('settings.blackjack.main-config', ['tables' => $tables]);
    }
}