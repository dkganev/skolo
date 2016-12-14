<?php
namespace App\Http\Controllers\Casino;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Bingo\Templates;
use App\Models\Bingo\TemplateGames;
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

        $playlist->idx = Playlist::count() + 1;

    	$playlist->save();

    	return back();

    }

    public function playlist_top(Request $request)
    {
        $playlist = Playlist::where('idx', $request['idx'])->first();
        $playlist->idx = Playlist::count() + 10;

        if($playlist->update()) {
            $response = [
                'msg' => 'Template Moved : Top',
                'idx'  => $request['idx']
            ];
        }

        return response()->json($response);
    }

    public function playlist_up(Request $request)
    {
        //
    }

    public function playlist_down(Request $request)
    {
        //
    }

    public function playlist_destroy(Request $request)
    {
        $playlist = Playlist::where('idx', $request['idx'])->first();
        
        if($playlist->delete()) {
            $response = [
                'msg' => 'Template Removed',
                'idx'  => $request['idx']
            ];
        }

        return response()->json($response);
    }

    public function load_template(Request $request)
    {
        $template = Templates::where('template_id', $request->template_id)->first();

        foreach($template->template_games as $games)
        {
            $data = [
                'bingo_ticket_cost' => $games->bingo_ticket_cost,
                'bingo_cost_bingo' => $games->bingo_cost_bingo,
                'bingo_cost_line1' => $games->bingo_cost_line1,

                'bingo_cost_line1_fixed' => $games->bingo_cost_line1_fixed,
                'bingo_cost_bingo_fixed' => $games->bingo_cost_bingo_fixed,
                'idx' => Playlist::count() + 1
            ];

            Playlist::create($data);
            
        }

        return response()->json(['msg' => 'success'], 200);
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
    	$status = $template->save();

        if(!$status)
        {
            $msg = 'Something went wrong!';
            return response()->json(['message' => $msg], 501);
        }
    }

    public function template_destroy(Request $request)
    {
    	$template = Templates::where('template_id', $request->template_id)->first();
    	$template->delete();

    	return redirect()->back();
    }


    public function template_game_store(Request $request)
    {
        $template = Templates::where('template_id', $request->template_id)->first();

        $playlist = new TemplateGames();

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

        $template->template_games()->save($playlist);
        $playlist->save();

        return response()->json($playlist->load('template'), 200);
    }

}