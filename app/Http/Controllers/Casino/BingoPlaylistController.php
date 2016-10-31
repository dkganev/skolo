<?php
namespace App\Http\Controllers\Casino;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Bingo\Templates;
use App\Models\Bingo\Playlist;

class BingoPlaylistController extends Controller
{
    public function index_playlist()
    {
    	$playlists = Playlist::orderBy('idx', 'asc')->get();
		$templates = Templates::orderBy('template_id', 'asc')->get();

        return view('casino.bingo-playlist.playlist', ['playlists' => $playlists, 'templates' => $templates]);
    }

    public function playlist_store(Request $request)
    {
    	$playlist = new Playlist();

    	$playlist->bingo_ticket_cost = $request->ticket_cost;

    	$playlist->bingo_cost_line1_fixed = false;
    	$playlist->bingo_cost_bingo_fixed = false;

    	if($request->game_type == 1)
    	{
    		$playlist->bingo_cost_line1 = $request->line_cost;
    		$playlist->bingo_cost_bingo = $request->bingo_cost;

    		$playlist->bingo_cost_line1_fixed = true;
    		$playlist->bingo_cost_bingo_fixed = true;
    	}

    	$playlist->save();

    	return back();

    }

    public function load_template(Request $request)
    {
    	// 
    }

    public function index_templates()
    {
    	$templates = Templates::orderBy('template_id', 'asc')->get();

        return view('casino.bingo-playlist.templates', compact('templates'));
    }

    public function template_store(Request $request)
    {
    	$template = new Templates();
    	$template->name = $request->name;
    	$template->save();

    	//return redirect()->back();
    }

    public function template_destroy(Request $request)
    {
    	$template = Templates::where('template_id', $request->template_id)->first();
    	$template->delete();

    	return redirect()->back();
    }

}