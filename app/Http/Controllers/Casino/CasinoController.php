<?php

namespace App\Http\Controllers\Casino;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models\Accounting\PsErrors;
use App\Models\Accounting\ServerPs;
use App\Models\Accounting\PsStatus;
use App\Models\Accounting\Casinos;
use App\Models\Cms\TerminalPreviewDB2;
use App\Models\Accounting\Games;
use App\Models\Bingo\MainConfig;
use App\Models\Bingo\GameState;
use Excel;

class CasinoController extends Controller
{
    public function index()
    {
        return view('casino.index');
    }

    public function getEvents(Request $request)
    {
        session(['last_page' => 'casino/events']);
        session(['last_menu' => 'menuEvents']);
        if ($request['rowsPerPage']) {
            $page['rowsPerPage'] = $request['rowsPerPage'];
        
        } else {
            $page['rowsPerPage'] = 20;
        
        }
        if ($request['OrderQuery']) {
            $page['OrderQuery'] = $request['OrderQuery'];
        } else {
            $page['OrderQuery'] = 'time';
        }
        if ($request['OrderDesc']) {
            $page['OrderDesc'] = $request['OrderDesc'];
        } else {
            $page['OrderDesc'] = 'desc';
        }
        if ($request['sortMenuOpen'] == 1 ) {
            $page['sortMenuOpen'] = 1;
        } else {
            $page['sortMenuOpen'] = 0;
        }
        $SortQuery = array();
        if ($request['FromGameTs']){
            array_push($SortQuery,['time', '>=', $request['FromGameTs']]);
            $page['FromGameTs'] = $request['FromGameTs'];
        }else{
            $page['FromGameTs'] = "";
        }
        if ($request['ToGameTs']){
             array_push($SortQuery,['time', '<=', $request['ToGameTs']]);
            $page['ToGameTs'] = $request['ToGameTs'];
        }else{
            $page['ToGameTs'] = "";
        }
        if ($request['PSID']) {
            array_push($SortQuery,['psid', '=', $request['PSID']]);
            $page['PSID'] = $request['PSID'];
        } else {
            $page['PSID'] = "";
        }
        if ($request['ErrorCode']) {
            array_push($SortQuery,['err_code', '=',$request['ErrorCode']]);
            $page['ErrorCode'] = $request['ErrorCode'];
        } else {
            $page['ErrorCode'] = "";
        }
        if ($request['ErrorText']) {
            array_push($SortQuery,['error','like', '%' .  $request['ErrorText'] . '%' ]);
            $page['ErrorText'] = $request['ErrorText'];
        } else {
            $page['ErrorText'] = "";
        }
        
        $historys = PsErrors::where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage'] );
        
        return view('casino.events', ['historys' => $historys, 'page' => $page]); 
    }
    
    public function export2excelEvents(Request $request)
    {
        if ($request['rowsPerPage']) {
            $page['rowsPerPage'] = $request['rowsPerPage'];
        
        } else {
            $page['rowsPerPage'] = 20;
        
        }
        if ($request['OrderQuery']) {
            $page['OrderQuery'] = $request['OrderQuery'];
        } else {
            $page['OrderQuery'] = 'time';
        }
        if ($request['OrderDesc']) {
            $page['OrderDesc'] = $request['OrderDesc'];
        } else {
            $page['OrderDesc'] = 'desc';
        }
        if ($request['sortMenuOpen'] == 1 ) {
            $page['sortMenuOpen'] = 1;
        } else {
            $page['sortMenuOpen'] = 0;
        }
        $SortQuery = array();
        if ($request['FromGameTs']){
            array_push($SortQuery,['time', '>=', $request['FromGameTs']]);
            $page['FromGameTs'] = $request['FromGameTs'];
        }else{
            $page['FromGameTs'] = "";
        }
        if ($request['ToGameTs']){
             array_push($SortQuery,['time', '<=', $request['ToGameTs']]);
            $page['ToGameTs'] = $request['ToGameTs'];
        }else{
            $page['ToGameTs'] = "";
        }
        if ($request['PSID']){
            array_push($SortQuery,['psid', '=', $request['PSID']]);
            $page['PSID'] = $request['PSID'];
        }else{
            $page['PSID'] = "";
        }
        if ($request['ErrorCode']){
            array_push($SortQuery,['err_code', '=',$request['ErrorCode']]);
            $page['ErrorCode'] = $request['ErrorCode'];
        }else{
            $page['ErrorCode'] = "";
        }
        if ($request['ErrorText']){
            array_push($SortQuery,['error','like', '%' .  $request['ErrorText'] . '%' ]);
            $page['ErrorText'] = $request['ErrorText'];
        }else{
            $page['ErrorText'] = "";
        }
        
        
        
        
        $historys = PsErrors::where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage'] );

        //return view('casino.events', ['historys' => $historys, 'page' => $page]);
        $export = array();
        foreach ($historys as $key => $history) {
            $export[$key] = array(
                'PS ID' => $history->psid, 
                'Error Code' => $history->err_code,
                'Error Text' =>  $history->error, 
                'Time' => $history->time
            );
            
        }
        //$export = $historys = BingoHistory::orderBy('tstamp', 'desc')->get();

        Excel::create('Events Data', function($excel) use($export){
            $excel->sheet('Events', function($sheet) use($export){
                $sheet->fromArray($export);
                $sheet->freezeFirstRow();
                $sheet->setFontFamily('Liberation Sans');
                $sheet->setFontSize(10);
                $sheet->row(1, function ($row) {
                    $row->setFontWeight('bold');
                });
                $sheet->setBorder('A1', 'thin');
                $sheet->setHeight(1, 20);
            });
        })->export('xls');
    }
    
    public function getList()
    {
        Session::put('product_search', Input::has('ok') ? Input::get('search') : (Session::has('product_search') ? Session::get('product_search') : ''));
        Session::put('product_field', Input::has('field') ? Input::get('field') : (Session::has('product_field') ? Session::get('product_field') : 'name'));
        Session::put('product_sort', Input::has('sort') ? Input::get('sort') : (Session::has('product_sort') ? Session::get('product_sort') : 'asc'));

        $products = Product::where('name', 'like', '%' . Session::get('product_search') . '%')
            ->orderBy(Session::get('product_field'), Session::get('product_sort'))->paginate(8);
            
        return view('product.list', ['products' => $products]);
    }

    public function getCasino()
    {
        session(['last_page' => 'casino/casino']);
        session(['last_menu' => 'menuCasino']);
        // get current casino and display its terminals
        $casino = session()->get('casino');
        $games = Games::orderBy('gameid', 'asc')->get();
        $MainConfig = MainConfig::first();
        $GameState = GameState::first();

        
        // Fetch Terminals For current Casino '
        $server_ps = ServerPs::where('casinoid', $casino->casinoid)->orderBy('psid', 'asc')->get();

        if(!$server_ps) {
            return view('casino.casinoErrors');
        }

        $topT = 200;
        $leftT = 200;
        $offline = 0;
        $free = 0;
        $active = 0;
        $attendant = 0;
        $error = 0;
 
        foreach ($server_ps as $key => $value) {
            $PsStatus = PsStatus::where('psid', $value['psid'])->get();
            if ($PsStatus->count()) {
                if ($PsStatus->first()->active_errors == '{}') {
                    if ($PsStatus->first()->bonline == false) {
                        $offline++;
                        $server_ps[$key]['boxColor'] = '#9c9c9c';
                        $server_ps[$key]['boxStatus'] = 'Offline';
                    } else {
                        if ($PsStatus->first()->attendant == false) {
                            if ($PsStatus->first()->current_credit == 0) {
                                $free++;
                                $server_ps[$key]['boxColor'] = '#5bc0de';
                                $server_ps[$key]['boxStatus'] = 'Free';
                            } else {
                                $active++;
                                $server_ps[$key]['boxColor'] = '#5cb85c';
                                $server_ps[$key]['boxStatus'] = 'Active';
                            }
                        } else {
                            $attendant++;
                            $server_ps[$key]['boxColor'] = '#ccb2ff';
                            $server_ps[$key]['boxStatus'] = 'Call Attend';
                        }
                    }
                
                    if ($PsStatus->first()->current_game_i == 0) {
                        $server_ps[$key]['current_game'] = "";
                        $server_ps[$key]['current_game_color'] ="transperant";
                    } else {
                        $curentGames = Games::where('gameid',  $PsStatus->first()->current_game_i)->get();
                        if ($curentGames->count()) {
                            $server_ps[$key]['current_game'] = $curentGames->first()->short_name;
                            $server_ps[$key]['current_game_color'] = $curentGames->first()->color;
                        } else {
                            // var_dump($PsStatus->first()->current_game_i);
                        }
                    }
                } else {
                    $error++;
                    $server_ps[$key]['boxColor'] = '#d9534f';
                    $server_ps[$key]['boxStatus'] = 'Error';
                }
            } else {
                $server_ps[$key]['boxColor'] = '#ff0000';
            }
            
            $terminals = TerminalPreviewDB2::where('terminalID', $value['psid'])->get();
            if ($terminals->count()) {
                $server_ps[$key]['topP'] = $terminals->first()->topP;
                $server_ps[$key]['leftP'] = $terminals->first()->leftP;
            } else {
                $server_ps[$key]['topP'] = $topT;
                $server_ps[$key]['leftP'] = $leftT;
                $topT = $topT + 50;
                $leftT= $leftT + 50;
            }
        
            $server_ps[$key]['color'] = "#"."23b498"  ;
        };

            $statuses = [
                'offline' => $offline,
                'free' => $free,
                'active' => $active,
                'attendant' => $attendant,
                'error' => $error
            ];

            return view('casino.casino', [
                'terminals' => $terminals,
                'server_ps' => $server_ps,
                'statuses' => $statuses,
                'games' => $games,
                'MainConfig' => $MainConfig,
                'GameState' => $GameState
            ]);
        }
}
