<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Casinos;
use App\Models\TerminalPreviewDB2;
use App\Models\Games;

class AjaxCasinoController extends Controller
{
   public function index(Request $request)
    {
        $dataNewCasino = $request['newCasino'];
        $casino = Casinos::select(['casinoid', 'casinoname'])->where('casinoid', $dataNewCasino)->get();
        $firstCasinos = array('casinoid' => $casino->first()->casinoid,'casinoname' => $casino->first()->casinoname );
        session(['Casino' => $firstCasinos ]);        
        $casinoid = session()->get('Casino.casinoid');
        $casinoname = session()->get('Casino.casinoname');
        $dataArray1 = array(
            "success" => "success",
            "set" => $casino->first(),
            "casinoid" => $casinoid,
            "casinoname" => $casinoname
        );
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    
    public function casinoBox(Request $request)
    {
        $TerminalPreview = new TerminalPreviewDB2();
        $TerminalPreview->terminalID = $request['targetDataID'];
        $TerminalPreview->topP = round($request['newBoxTop']);
        $TerminalPreview->leftP = round($request['newBoxLeft']);
        $terminals = TerminalPreviewDB2::where('terminalID', $TerminalPreview->terminalID)->get();
        if ( $terminals->count()){
            $TerminalPreviewU = TerminalPreviewDB2::where('id', $terminals->first()->id)->first();
            $TerminalPreviewU->topP = round($request['newBoxTop']); 
            $TerminalPreviewU->leftP = round($request['newBoxLeft']); 
            $TerminalPreviewU-> update();
        }else{
            $TerminalPreview->save();   
        }
        $dataArray1 = array(
            "success" => "success"
        );
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
<<<<<<< HEAD
    public function NewGame(Request $request)
    {
        $gameid = $request['idGame'];
       
        $curentGames = Games::where('gameid',  $gameid)->get();
            //$server_ps[$key]['current_game'] = $curentGames->first()->short_name;
            //$server_ps[$key]['current_game_color'] = $curentGames->first()->color;
                      
        $dataArray1 = array(
            "success" => "success",
            "short_name" => $curentGames->first()->short_name,
            "color" => $curentGames->first()->color
        );
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT); 
        
        
    }
}
=======
    
}
>>>>>>> eabf0de654420eed723caf95443f58b0dee44352
