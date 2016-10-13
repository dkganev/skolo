<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\PsCounters;
use App\Models\Casinos;
class StatisticsController extends Controller
{
    public function index()
    {
        $casinos = Casinos::select(['casinoid', 'casinoname'])->get();
        $currentCasinos = session()->get('Casino.casinoname');
        $dataGet = session()->get('LoginUser.lang');
        app()->setLocale($dataGet);
    	$counters = PsCounters::orderBy('psid', 'asc')->get();

    	return view('statistics.index', ['dataGet' => $dataGet,'casinos' => $casinos, 'currentCasinos' => $currentCasinos, 'counters' => $counters]);
    }
}
