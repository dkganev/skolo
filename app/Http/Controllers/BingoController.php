<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\BingoConf;

class BingoController extends Controller
{
    public function index()
    {
    	$bingo = BingoConf::first();

    	return view('settings.bingo', ['bingo' => $bingo]);
    }
}
