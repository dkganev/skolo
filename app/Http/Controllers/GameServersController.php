<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\ClientGameIds;
use App\Models\Games;
use App\Models\Categories;
use App\Models\GameTypes;
use Excel;

class GameServersController extends Controller
{
    /**
     * Game Servers Home View
     * @return [view]
     */
	public function getGameServers()
	{
		$game_clients = ClientGameIds::orderBy('client_game_id','asc')->get();
        $games = Games::orderBy('gameid', 'asc')->get();
        $categories = Categories::orderBy('idx', 'asc')->get();
        $game_types = GameTypes::all();

    	return view('settings.gameservers', [ 'game_clients' => $game_clients,
                                              'games'        => $games,
                                              'categories'   => $categories,
                                              'game_types'   => $game_types
                                            ]);
	}

    public function addGameClient(Request $request)
    {
        $game_server = new ClientGameIds();
        $game_server->client_game_id = $request['client_game_id'];
        $game_server->client_game_name = $request['client_game_name'];
        $game_server->save();

        $msg = 'Game Client Added Successfully!';
        return $request->session()->flash('alert-success', $msg);
    }

    public function updateGameClient(Request $request)
    {
    	$game_client = ClientGameIds::where('client_game_id', $request['client_game_id'])->first();
    	
    	$game_client->client_game_id = $request['client_game_id'];
    	$game_client->client_game_name = $request['client_game_name'];
    	$game_client->update();

        $msg = 'Game Client Updated Successfully!';
        return $request->session()->flash('alert-success', $msg);
    }

    public function exportClientGames()
    {
        $export = ClientGameIds::all();

        Excel::create('Client Games Data', function($excel) use($export){

            $excel->sheet('Client Games', function($sheet) use($export){
                $sheet->fromArray($export);

                $sheet->setFontFamily('Verdana');
                $sheet->setFontSize(10);
                $sheet->row(1, function ($row) {
                    $row->setFontWeight('bold');
                });
                $sheet->setBorder('A1', 'thin');
                $sheet->setHeight(1, 20);
                
            });
        })->export('xls');
    }


    /**
     *  CATEGORIES : Add, Update, Excel
     * @param Request
     */
    
    public function addCategory(Request $request)
    {
        $category = new Categories();
        $category->idx = $request['idx'];
        $category->name = $request['name'];
        $category->save();

        $msg = 'Categorry Added Successfully!';
        return $request->session()->flash('alert-success', $msg);
    }

    public function updateCategory(Request $request)
    {
        $category = Categories::where('idx', '=' ,$request['idx'])->first();
        
        $category->idx = $request['idx'];
        $category->name = $request['name'];
        $category->update();

        $msg = 'Category Updated Successfully!';
        return $request->session()->flash('alert-info', $msg);
    }

    public function exportCategories()
    {
        $export = Categories::select(['idx', 'name'])->get();

        Excel::create('Categoris Data', function($excel) use($export){

            $excel->sheet('Categories', function($sheet) use($export){
                $sheet->fromArray($export);

                $sheet->setFontFamily('Verdana');
                $sheet->setFontSize(10);
                $sheet->row(1, function ($row) {
                    $row->setFontWeight('bold');
                });
                $sheet->setBorder('A1', 'thin');
                $sheet->setHeight(1, 20);

            });
        })->export('xls');
    }

    /**
     *  GAME : Add, Update, Excel
     * @param Request
     */
    public function addGame(Request $request)
    {
    	$game = new Games();
        
        $game->gameid = $request['gameid'];
        $game->short_name = $request['short_name'];
        $game->game_type = $request['game_type']; 
        $game->description = $request['description'];
        $game->db_name = $request['db_name'];

        $game_client = ClientGameIds::where('client_game_id','=', $request['client_game_id'])->first();
        $game_client->games()->save($game);

        $category = Categories::where('idx', '=', $request['game_category'])->first();
        $category->game()->save($game);

        $game->save();

        $msg = 'Game Added Successfully!';
        return $request->session()->flash('alert-info', $msg);
    }

    public function updateGame(Request $request)
    {
        //$id = $request['client_game_id'];

        $game = Games::where('gameid', $request['gameid'])->first();

        $game_client = ClientGameIds::where('client_game_id','=', $request['client_game_id'])->first();
        $game->client_game_ids()->associate($game_client);
        $game->save();

        //$game->gameid = $request['gameid'];

        //$game->game_type = $request['game_type'];
        $game->short_name = $request['short_name'];
        $game->description = $request['description'];
        $game->db_name = $request['db_name'];
        $game->update();

        $msg = 'Game Updated Successfully!';
        return $request->session()->flash('alert-info', $msg);
    }

    public function exportGames()
    {
        $export = Games::select(['client_game_id', 'gameid', 'description', 'game_type', 'db_name', 'short_name'])->get();

        Excel::create('Games Data', function($excel) use($export){

            $excel->sheet('Games', function($sheet) use($export){
                $sheet->fromArray($export);

                $sheet->setFontFamily('Verdana');
                $sheet->setFontSize(10);
                $sheet->row(1, function ($row) {
                    $row->setFontWeight('bold');
                });
                $sheet->setBorder('A1', 'thin');
                $sheet->setHeight(1, 20);

            });
        })->export('xls');
    }
}
