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
        $playlist = Playlist::orderBy('idx', 'asc')->first();
        $playlistIDX = $playlist->idx;
        $playlist = Playlist::where('idx', $request['idx'])->first();
        //$playlistC = Playlist::count() + 100;
        $playlist->idx = $playlistIDX - 1;

        if($playlist->update()) {
            $response = [
                'msg' => 'Template Moved : Top',
                'idx'  => $request['idx'],
                'idxNew'  => $playlistIDX - 1,
                //'idxC'  => $playlistIDX,
            ];
        }

        return response()->json($response);
    }

    public function playlist_up(Request $request)
    {   
        $playlist = Playlist::orderBy('idx', 'desc')->first();
        $playlistC = $playlist->idx + 1;
        $playlist = Playlist::where('idx', $request['idx'])->first();
        //$playlistC = Playlist::count() + 100;
        $playlist->idx = $playlistC;
        $playlist->update();
        $playlist = Playlist::where('idx', "<", $request['idx'])->orderBy('idx', 'desc')->first();
        $idxNew = $playlist->idx;
        $playlist->idx = $request['idx'];
        $playlist->update();
        $playlist = Playlist::where('idx', $playlistC)->first();
        $playlist->idx = $idxNew;
        if($playlist->update()) {
            $response = [
                'msg' => 'Template Moved : Up',
                'idx'  => $request['idx'],
                'idxNew'  => $idxNew,
                'idxC'  => $playlistC,
            ];
        }
        return response()->json($response);

    }

    public function playlist_down(Request $request)
    {
        $playlist = Playlist::orderBy('idx', 'desc')->first();
        $playlistC = $playlist->idx + 1;
        $playlist = Playlist::where('idx', $request['idx'])->first();
        $playlist->idx = $playlistC;
        $playlist->update();
        $playlist = Playlist::where('idx', ">", $request['idx'])->first();
        $idxNew = $playlist->idx;
        $playlist->idx = $request['idx'];
        $playlist->update();
        $playlist = Playlist::where('idx', $playlistC)->first();
        $playlist->idx = $idxNew;
        if($playlist->update()) {
            $response = [
                'msg' => 'Template Moved : Down',
                'idx'  => $request['idx'],
                'idxNew'  => $idxNew,
                'idxC'  => $playlistC,
            ];
        }
        return response()->json($response);
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
        $playlist = Playlist::orderBy('idx', 'desc')->first();
        if ( $playlist){ //Playlist::count()
            $playlistIDX = $playlist->idx;
        }else{
            $playlistIDX = 1;
        }

        foreach($template->template_games as $games) {
            $data = [
                'bingo_ticket_cost' => $games->bingo_ticket_cost,
                'bingo_cost_bingo' => $games->bingo_cost_bingo,
                'bingo_cost_line1' => $games->bingo_cost_line1,

                'bingo_cost_line1_fixed' => $games->bingo_cost_line1_fixed,
                'bingo_cost_bingo_fixed' => $games->bingo_cost_bingo_fixed,
                'idx' => $games->idx + $playlistIDX
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

        $saved = $template->save();

        if(!$saved) {
            $reponse = [
                'message' => 'Something went wrong!'
            ];
            
            return response()->json($response, 501);
        }

        $response = [
            'message' => 'Template stored successfully!'
        ];
        return response()->json($response, 200);

    }

    public function template_down(Request $request)
    {
        $playlist2 = TemplateGames::where('template_id', $request->template_id)->where('idx', ">", $request['idx'])->orderBy('idx', 'asc')->first();
        if ($playlist2){
            $playlist = TemplateGames::where('template_id', $request->template_id)->orderBy('idx', 'desc')->first();
            $playlistC = $playlist->idx + 1;
            $playlist = TemplateGames::where('template_id', $request->template_id)->where('idx', $request['idx'])->first();
            //$playlistC = Playlist::count() + 100;
            $playlist->idx = $playlistC;
            $playlist->where('idx', $request['idx'] )->where('template_id', $request->template_id)->update(['idx' => $playlistC]);
            //$playlist2 = TemplateGames::where('template_id', $request->template_id)->where('idx', ">", $request['idx'])->first();
            $idxNew = $playlist2->idx;
            $playlist2->idx = $request['idx'];
            $playlist2->where('idx', $idxNew )->where('template_id', $request->template_id)->update(['idx' => $request['idx']]);
            $playlist = TemplateGames::where('template_id', $request->template_id)->where('idx', $playlistC)->first();
            $playlist->idx = $idxNew;
            if($playlist->where('idx', $playlistC )->where('template_id', $request->template_id)->update(['idx' => $idxNew])) {
                $response = [
                    'success' => 'success',
                    'msg' => 'Template Moved : down',
                    'idx'  => $request['idx'],
                    'idxNew'  => $idxNew,
                    'idxC'  => $playlistC,
                ];
            }else {
                $response = [
                    'success' => 'error',
                    'msg' => 'Template Moved : down',
                ];
            }
        } else {
                $response = [
                    'success' => 'error',
                    'msg' => 'Template Moved : down',
                ];
        }
        return response()->json($response);
    }
    
    
    public function template_up(Request $request)
    {
        $playlist2 = TemplateGames::where('template_id', $request->template_id)->where('idx', "<", $request['idx'])->orderBy('idx', 'desc')->first();
        if ($playlist2){
            $playlist = TemplateGames::where('template_id', $request->template_id)->orderBy('idx', 'desc')->first();
            $playlistC = $playlist->idx + 1;
            $playlist = TemplateGames::where('template_id', $request->template_id)->where('idx', $request['idx'])->first();
            //$playlistC = Playlist::count() + 100;
            $playlist->idx = $playlistC;
            $playlist->where('idx', $request['idx'] )->where('template_id', $request->template_id)->update(['idx' => $playlistC]);
            //$playlist2 = TemplateGames::where('template_id', $request->template_id)->where('idx', "<", $request['idx'])->orderBy('idx', 'desc')->first();
            $idxNew = $playlist2->idx;
            $playlist2->idx = $request['idx'];
            $playlist2->where('idx', $idxNew )->where('template_id', $request->template_id)->update(['idx' => $request['idx']]);
            $playlist = TemplateGames::where('template_id', $request->template_id)->where('idx', $playlistC)->first();
            $playlist->idx = $idxNew;
            if($playlist->where('idx', $playlistC )->where('template_id', $request->template_id)->update(['idx' => $idxNew])) {
                $response = [
                    'success' => 'success',
                    'msg' => 'Template Moved : Up',
                    'idx'  => $request['idx'],
                    'idxNew'  => $idxNew,
                    'idxC'  => $playlistC,
                ];
            }else {
                $response = [
                    'success' => 'error',
                    'msg' => 'Template Moved : Up',
                ];
            }
        } else {
                $response = [
                    'success' => 'error',
                    'msg' => 'Template Moved : Up',
                ];
        }
        return response()->json($response);
    }
    
    public function template_top(Request $request)
    {
        $playlist3 = TemplateGames::where('template_id', $request->template_id)->orderBy('idx', 'desc')->get();
        $idxArray = array();
        foreach ($playlist3 as $key => $val){
            $playlist4 = TemplateGames::where('idx', $val->idx)->where('template_id', $request->template_id)->first();
            $playlist4->where('idx', $val->idx)->where('template_id', $request->template_id)->update(['idx' => ($val->idx + 1)]);
            $idxArray[$val->idx] = $val->idx + 1; 
        }
        $playlist = TemplateGames::where('template_id', $request->template_id)->orderBy('idx', 'asc')->first();
        $playlistIDX = $playlist->idx;
        $idx = $request->idx + 1;
        $playlist2 = TemplateGames::where('idx', $idx)->where('template_id', $request->template_id)->first();
        //$playlistC = Playlist::count() + 100;
        $playlist2->idx = $playlistIDX - 1;
        
        if($playlist2->where('idx', $idx )->where('template_id', $request->template_id)->update(['idx' => ($playlistIDX - 1)])) {
            $response = [
                'msg' => 'Template Moved : Top',
                'idx'  => $request['idx'],
                'idxNew'  => $playlistIDX - 1,
                'idxC'  => $playlist,
                'idxArray' => $idxArray
            ];
        }

        return response()->json($response);
    }
    
    public function template_destroy(Request $request)
    {
    	$template = TemplateGames::where('idx', $request->idx)->where('template_id', $request->template_id)->delete();
    	//$template->delete();
        $response = [
                'msg' => 'Template Moved : Down',
                'idx'  => $request['idx'],
                'idxNew'  => $request['template_id'],
                'idxC'  => $template
            ];

    	return response()->json($response);
    }

    public function template_game_store(Request $request)
    {
        $template = Templates::where('template_id', $request->template_id)->first();

        $playlist = new TemplateGames();

        $playlist->idx = $template->template_games->count() + 1;
        $playlist->bingo_ticket_cost = $request->ticket_cost;

        $playlist->bingo_cost_line1_fixed = false;
        $playlist->bingo_cost_bingo_fixed = false;

        if($request->game_type == 1) {
            $playlist->bingo_cost_line1 = $request->line_cost;
            $playlist->bingo_cost_bingo = $request->bingo_cost;

            $playlist->bingo_cost_line1_fixed = true;
            $playlist->bingo_cost_bingo_fixed = true;
        }

        $template->template_games()->save($playlist);
        $playlist->save();

        return response()->json($playlist->load('template'), 200);
    }

    public function template_game_destroy(Request $request)
    {
        $template = Templates::where('template_id', $request->template_id)->first();
        $template_game = $template->template_games()->where('idx', $request->idx)->first();
        $deleted = $template_game->delete();

        return response()->json([], 200);
    }

}