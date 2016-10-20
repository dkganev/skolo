<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\PsCounters;
use App\Models\Casinos;
use App\Models\Games;


class StatisticsController extends Controller
{
	// public function index()
 //    {
 //    	return view('statistics.index');
 //    }

 //    public function terminals_statistics()
 //    {
 //    	$counters = PsCounters::orderBy('psid', 'asc')->get();

 //    	return view('statistics.terminals', ['counters' => $counters]);
 //    }

 //    public function games_statistics()
 //    {
 //    	$games = Games::orderBy('gameid', 'asc')->get();

 //    	return view('statistics.games',['games' => $games]);
 //    }

    public function index()
    {
        $casinos = Casinos::select(['casinoid', 'casinoname'])->get();
        $currentCasinos = session()->get('Casino.casinoname');
        $dataGet = session()->get('LoginUser.lang');
        app()->setLocale($dataGet);

        return view('statistics.index', ['dataGet' => $dataGet,'casinos' => $casinos, 'currentCasinos' => $currentCasinos,]);
    }

    public function terminals_statistics()
    {
        $casinos = Casinos::select(['casinoid', 'casinoname'])->get();
        $currentCasinos = session()->get('Casino.casinoname');
        $dataGet = session()->get('LoginUser.lang');
        app()->setLocale($dataGet);

        $counters = PsCounters::orderBy('psid', 'asc')->get();

        return view('statistics.terminals', ['dataGet' => $dataGet,'casinos' => $casinos, 'currentCasinos' => $currentCasinos, 'counters' => $counters]);
    }

    public function games_statistics()
    {
        $casinos = Casinos::select(['casinoid', 'casinoname'])->get();
        $currentCasinos = session()->get('Casino.casinoname');
        $dataGet = session()->get('LoginUser.lang');
        app()->setLocale($dataGet);

        $games = Games::orderBy('gameid', 'asc')->get();

        return view('statistics.games', ['dataGet' => $dataGet,'casinos' => $casinos, 'currentCasinos' => $currentCasinos, 'games' => $games]);
    }
    public function history_statistics()
    {
        $casinos = Casinos::select(['casinoid', 'casinoname'])->get();
        $currentCasinos = session()->get('Casino.casinoname');
        $dataGet = session()->get('LoginUser.lang');
        app()->setLocale($dataGet);

        $games = Games::orderBy('gameid', 'asc')->get();

        return view('statistics.history', ['data2' => 'test11', dataGet' => $dataGet,'casinos' => $casinos, 'currentCasinos' => $currentCasinos, 'games' => $games]);
    }
}
