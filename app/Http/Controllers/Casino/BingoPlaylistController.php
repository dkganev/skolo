<?php
namespace App\Http\Controllers\Casino;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class BingoPlaylistController extends Controller
{
    public function index_playlist()
    {
        return view('casino.bingo-playlist.playlist');
    }

    public function index_templates()
    {
        return view('casino.bingo-playlist.templates');
    }

}