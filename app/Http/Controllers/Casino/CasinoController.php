<?php

namespace App\Http\Controllers\Casino;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Accounting\PsErrors;
use App\Models\Accounting\ServerPs;
use App\Models\Accounting\PsStatus;
use App\Models\Accounting\Casinos;
use App\Models\Cms\TerminalPreviewDB2;
use App\Models\Accounting\Games;
use Excel;

class CasinoController extends Controller
{
    public function index()
    {
        return view('casino.index');
    }

    public function getEvents()
    {
        $errors = PsErrors::orderBy('time', 'asc')->paginate(300);

        return view('casino.events', ['errors' => $errors]);
    }

    public function events_index()
    {
        $errors = PsErrors::orderBy('time', 'asc')->paginate(10);
        return $errors;
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
        // get current casino and display its terminals
        $casino = session()->get('casino');
        $games = Games::orderBy('gameid', 'asc')->get();

        // Fetch Terminals For current Casino
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
                            var_dump($PsStatus->first()->current_game_i);
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
                'games' => $games
            ]);
        }
}
