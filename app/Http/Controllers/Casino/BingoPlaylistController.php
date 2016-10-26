<?php
namespace App\Http\Controllers\Casino;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class BingoPlaylistController extends Controller
{
    public function index()
    {
        return view('casino.bingo-playlist.playlist');
    }
}