<?php

namespace App\Http\Controllers\Casino;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Accounting\PsErrors;
use App\Models\Accounting\ServerPs;
use App\Models\Accounting\PsStatus;
use App\Models\Accounting\Casinos;
use App\Models\TerminalPreviewDB2;
use App\Models\Accounting\Games;
use Excel;

class CasinoController extends Controller
{
    public function index()
    {
        return view('casino.index');
    }

    // public function getCasino()
    // {
    //     // get current casino and display its terminals
    //     $casino = session()->get('casino');
    //     $games = Games::orderBy('gameid', 'asc')->get();

    //     // Fetch Terminals For current Casino
    //     $server_ps = ServerPs::where('casinoid', $casino->casinoid)->orderBy('psid', 'asc')->get();

    //     if ($server_ps->count())
    //     {
    //         $topT = 200;
    //         $leftT = 200;
    //         $PsSettingsOffline = 0;
    //         $PsSettingsFree = 0;
    //         $PsSettingsActive = 0;
    //         $PsSettingsAttendant = 0;
    //         $PsSettingsError = 0;
            
    //         //foreach($server_ps as $key => $value)
    //         foreach($server_ps as $ps)
    //         {

    //         if($PsStatus->count())

    //             if($ps->ps_status()->bonline == false) {

    //                 $PsSettingsOffline++; 
    //                 $server_ps['boxColor'] = '#9c9c9c';
    //                 $server_ps['boxStatus'] = 'Offline';

    //             } else {
    //                 if($ps->ps_status()->attendant == false) {
    //                     if($ps->ps_status()->current_credit == 0) {

    //                         $PsSettingsFree++;
    //                         $server_ps['boxColor'] = '#5bc0de';
    //                         $server_ps['boxStatus'] = 'Free';
    //                     } else {
    //                         $PsSettingsActive++;
    //                         $server_ps['boxColor'] = '#5cb85c';
    //                         $server_ps['boxStatus'] = 'Active';
    //                     }
    //                 } else {
    //                     $PsSettingsAttendant++;
    //                     $server_ps['boxColor'] = '#ccb2ff';
    //                     $server_ps['boxStatus'] = 'Call Attend';
    //                 }
    //             }

    //             if($ps->ps_status()->current_game_i == 0) {

    //                 $server_ps['current_game'] = "";
    //                 $server_ps['current_game_color'] ="transperant";

    //             } else {

    //                 // ONLY ONE GAME AT A TIME CAN BE PLAYED // TO BE REFACTORED LATER
    //                 $curentGames = Games::where('gameid', $ps->ps_status()->current_game_i)->first();
    //                 $server_ps['current_game'] = $curentGames->short_name;
    //                 $server_ps['current_game_color'] = $curentGames->color;

    //             }   else {
    //                     $PsSettingsError++; 
    //                     $server_ps['boxColor'] = '#d9534f';
    //                     $server_ps['boxStatus'] = 'Error';    
    //                 }
    //             } else {
    //                $server_ps['boxColor'] = '#ff0000'; 
    //             }

    //             $terminals = TerminalPreviewDB2::where('terminalID', $value['psid'])->get();
    //             if ($terminals->count()) {
    //                 $server_ps[$key]['topP'] = $terminals->first()->topP;
    //                 $server_ps[$key]['leftP'] = $terminals->first()->leftP;
    //             } else {
    //                 $server_ps[$key]['topP'] = $topT;
    //                 $server_ps[$key]['leftP'] = $leftT;
    //                 $topT = $topT + 50;
    //                 $leftT= $leftT + 50;
            
    //             }
            
    //             $server_ps[$key]['color'] = "#"."23b498"  ;
    //         };

    //         return view('casino.casino', ['terminals' => $terminals, 'PsSettingsError' => $PsSettingsError, 'PsSettingsAttendant' => $PsSettingsAttendant, 'PsSettingsFree' => $PsSettingsFree, 'PsSettingsActive' => $PsSettingsActive, 'PsSettingsOffline' => $PsSettingsOffline, 'server_ps' => $server_ps, 'games' => $games]);
    //     } else {
    //         return view('casino.casinoErrors');
    //     }
    // }

    public function getEvents()
    {
    	$errors = PsErrors::orderBy('time','asc')->paginate(300);

    	return view('casino.events', ['errors' => $errors]);
    }

    public function getCasino()
    {
        // get current casino and display its terminals
        $casino = session()->get('casino');
        $games = Games::orderBy('gameid', 'asc')->get();

        // Fetch Terminals For current Casino
        $server_ps = ServerPs::where('casinoid', $casino->casinoid)->orderBy('psid', 'asc')->get();

        if ($server_ps->count())
        {
            $topT = 200;
            $leftT = 200;
            $PsSettingsOffline = 0;
            $PsSettingsFree = 0;
            $PsSettingsActive = 0;
            $PsSettingsAttendant = 0;
            $PsSettingsError = 0;
            
            foreach($server_ps as $key => $value)
            {
                $PsStatus = PsStatus::where('psid', $value['psid'])->get();
                if($PsStatus->count())
                {
                    if($PsStatus->first()->active_errors == '{}')
                    {
                        if($PsStatus->first()->bonline == FALSE)
                        {
                                $PsSettingsOffline++; 
                                $server_ps[$key]['boxColor'] = '#9c9c9c';
                                $server_ps[$key]['boxStatus'] = 'Offline';
                       
                        } else {
                            if($PsStatus->first()->attendant == FALSE)
                            {
                                if ($PsStatus->first()->current_credit == 0) {
                                    $PsSettingsFree++;
                                    $server_ps[$key]['boxColor'] = '#5bc0de';
                                    $server_ps[$key]['boxStatus'] = 'Free';
                                } else {
                                    $PsSettingsActive++;
                                    $server_ps[$key]['boxColor'] = '#5cb85c';
                                    $server_ps[$key]['boxStatus'] = 'Active';
                                }
                            } else {
                                $PsSettingsAttendant++;
                                $server_ps[$key]['boxColor'] = '#ccb2ff';
                                $server_ps[$key]['boxStatus'] = 'Call Attend';
                            }
                        }
                    
                        if ($PsStatus->first()->current_game_i == 0){
                            $server_ps[$key]['current_game'] = "";
                            $server_ps[$key]['current_game_color'] ="transperant";
                        } else {
                            $curentGames = Games::where('gameid',  $PsStatus->first()->current_game_i)->get();
                            if ( $curentGames->count() ){
                                $server_ps[$key]['current_game'] = $curentGames->first()->short_name;
                                $server_ps[$key]['current_game_color'] = $curentGames->first()->color;
                            }
                        }
                    } else {
                        $PsSettingsError++; 
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

            return view('casino.casino', ['terminals' => $terminals, 'PsSettingsError' => $PsSettingsError, 'PsSettingsAttendant' => $PsSettingsAttendant, 'PsSettingsFree' => $PsSettingsFree, 'PsSettingsActive' => $PsSettingsActive, 'PsSettingsOffline' => $PsSettingsOffline, 'server_ps' => $server_ps, 'games' => $games]);
        } else {
            return view('casino.casinoErrors');
        }
    }
}
