<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\PsCounters;

class StatisticsController extends Controller
{
    public function index()
    {
    	$counters = PsCounters::orderBy('psid', 'asc')->get();

    	return view('statistics.index', ['counters' => $counters]);
    }
}
