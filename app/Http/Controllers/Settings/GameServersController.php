<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Accounting\ClientGameIds;
use App\Models\Accounting\Games;
use App\Models\Accounting\Categories;
use App\Models\Accounting\GameTypes;
use App\Events\TerminalAdded;
use Excel;

class GameServersController extends Controller
{
	public function getGameServers()
	{
            session(['last_page' => 'settings/gameservers']);
            session(['last_menu' => 'menuGameservers']);
            $game_clients = ClientGameIds::orderBy('client_game_id','asc')->get();
            $games = Games::orderBy('gameid', 'asc')->get();
            $categories = Categories::orderBy('idx', 'asc')->get();
            $game_types = GameTypes::all();

            return view('settings.gameservers', [
                'game_clients' => $game_clients,
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
        event(new TerminalAdded(request()->ip(), request()->user()->name, NULL, 'Game Client Added Successfully!', 2));

        return $request->session()->flash('alert-success', $msg);
    }

    public function updateGameClient(Request $request)
    {
    	$game_client = ClientGameIds::where('client_game_id', $request['client_game_id'])->first();
    	
    	$game_client->client_game_id = $request['client_game_id'];
    	$game_client->client_game_name = $request['client_game_name'];
    	$game_client->update();

        $msg = 'Game Client Updated Successfully!';
        event(new TerminalAdded(request()->ip(), request()->user()->name, NULL, 'Game Client Updated Successfully!', 2));

        return $request->session()->flash('alert-success', $msg);
    }

    public function exportClientGames()
    {
        //$export = ClientGameIds::all();
        $game_clients = ClientGameIds::orderBy('client_game_id','asc')->get();
        $export = array();
        foreach ($game_clients as $key => $val) {
            $export[$key] = array(
                'Game ID' => $val->client_game_id, 
                'Description' => $val->client_game_name
            );
            
        }
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
        event(new TerminalAdded(request()->ip(), request()->user()->name, NULL, 'Categorry Added Successfully!', 2));
        return $request->session()->flash('alert-success', $msg);
    }

    public function updateCategory(Request $request)
    {
        $category = Categories::where('idx', '=' ,$request['idx'])->first();
        
        $category->idx = $request['idx'];
        $category->name = $request['name'];
        $category->update();

        $msg = 'Category Updated Successfully!';
        event(new TerminalAdded(request()->ip(), request()->user()->name, NULL, 'Category Updated Successfully!', 2));
        return $request->session()->flash('alert-info', $msg);
    }

    public function exportCategories()
    {
        //$export = Categories::select(['idx', 'name'])->get();
        $categories = Categories::orderBy('idx', 'asc')->get();
        $export = array();
        foreach ($categories as $key => $val) {
            $export[$key] = array(
                'Category ID' => $val->idx, 
                'Category Name' => $val->name
            );
            
        }
        
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
        //$game->game_category = $request['game_category'];
        

        $game_client = ClientGameIds::where('client_game_id','=', $request['client_game_id'])->first();
        $game_client->games()->save($game);

        $category = Categories::where('idx', '=', $request['game_category'])->first();
        $category->game()->save($game);

        $game->save();

        $msg = 'Game Added Successfully!';
        event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Game Added Successfully!', 2));
        return $request->session()->flash('alert-info', $msg);
    }

    public function updateGame(Request $request)
    {
        $game = Games::where('gameid', $request['gameid'])->first();

        $game_client = ClientGameIds::where('client_game_id','=', $request['client_game_id'])->first();
        $game->client_game_ids()->associate($game_client);
        $game->short_name = $request['short_name'];
        $game->description = $request['description'];
        $game->db_name = $request['db_name'];
        $game->color = $request['color'];
        $game->game_type = $request['game_type'];
        $game->save();

        //$game->type->game_type = $request['game_type']; 
        //$game->push();
        

        $response = [
            'msg'  => 'Game Updated Successfully!',
        ];

        event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Game Updated Successfully!', 2));
        return response()->json($response, 200);
    }

    public function exportGames()
    {
        //$export = Games::select(['client_game_id', 'gameid', 'description', 'game_type', 'db_name', 'short_name'])->get();
        $games = Games::orderBy('gameid', 'asc')->get();
        $export = array();
        foreach ($games as $key => $val) {
            $export[$key] = array(
                'Client Game ID' => $val->client_game_id, 
                'Game ID' => $val->gameid, 
                'Description' => $val->description, 
                'Game Type' => $val->type->type, 
                'DB Name' => $val->db_name, 
                'Category' => $val->category->name, 
                'Short Name' => $val->short_name
            );
            
        }
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
