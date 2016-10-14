<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\PsErrors;
use App\Models\ServerPs;
use App\Models\PsStatus;
use App\Models\Casinos;
use App\Models\TerminalPreviewDB2;
use App\Models\Games;
use Excel;

class CasinoController extends Controller
{
    public function casino()
    {
        //$data123 = session()->all();
        //var_dump($data123);
        $casinos = Casinos::select(['casinoid', 'casinoname'])->get();
        $currentCasinos = session()->get('Casino.casinoname');
        $dataGet = session()->get('LoginUser.lang');
        app()->setLocale($dataGet);
    return view('casino.index', ['dataGet' => $dataGet,'casinos' => $casinos, 'currentCasinos' => $currentCasinos]);
    }
    public function getCasino(){
        $currentCasinos = session()->get('Casino.casinoid');
        $games = Games::orderBy('gameid', 'asc')->get();
        $server_ps = ServerPs::where('casinoid', $currentCasinos)->orderBy('psid', 'asc')->get();
        //$PsSettingsOffline = PsStatus::where('bonline', "false")->get()->count();
        //var_dump($PsSettingsOffline) 
        if ($server_ps->count()){
            $topT = 200;
            $leftT = 200;
            $PsSettingsOffline = 0;
            $PsSettingsFree = 0;
            $PsSettingsActive = 0;
            $PsSettingsAttendant = 0;
            $PsSettingsError = 0;
            
            foreach ( $server_ps as $key => $value)
            {
                $PsStatus = PsStatus::where('psid', $value['psid'])->get();
                if ( $PsStatus->count()){
                    if ( empty($PsStatus->first()->active_errors) ){
                        //$server_ps[$key]['boxEror'] = "test";
                        if ( $PsStatus->first()->bonline == FALSE){
                            //if ( $PsStatus->first()->attendant == FALSE){
                                $PsSettingsOffline++; 
                                $server_ps[$key]['boxColor'] = '#9c9c9c';
                                $server_ps[$key]['boxStatus'] = 'Offline';
                            /*}else{
                                $PsSettingsAttendant++;
                                $server_ps[$key]['boxColor'] = '#ccb2ff';
                                $server_ps[$key]['boxStatus'] = 'Call Attend';
                            }*/
                       
                        }else{
                            if ( $PsStatus->first()->attendant == FALSE){
                                if ( $PsStatus->first()->current_credit == 0){
                                    $PsSettingsFree++;
                                    $server_ps[$key]['boxColor'] = '#5bc0de';
                                    $server_ps[$key]['boxStatus'] = 'Free';
                                }else{
                                    $PsSettingsActive++;
                                    $server_ps[$key]['boxColor'] = '#5cb85c';
                                    $server_ps[$key]['boxStatus'] = 'Active';
                                }
                            }else{
                                $PsSettingsAttendant++;
                                $server_ps[$key]['boxColor'] = '#ccb2ff';
                                $server_ps[$key]['boxStatus'] = 'Call Attend';
                            }
                       
                        }
                    
                    
                        if ( $PsStatus->first()->current_game_i == 0){
                            $server_ps[$key]['current_game'] = "";
                            $server_ps[$key]['current_game_color'] ="transperant";
                        }else{
                            $curentGames = Games::where('gameid',  $PsStatus->first()->current_game_i)->get();
                            $server_ps[$key]['current_game'] = $curentGames->first()->short_name;
                            $server_ps[$key]['current_game_color'] = $curentGames->first()->color;
                        
                        }
                    }else{
                        $PsSettingsError++; 
                        $server_ps[$key]['boxColor'] = '#d9534f';
                        $server_ps[$key]['boxStatus'] = 'Error';  
                         
                        
                        
                    }
                }else{
                   $server_ps[$key]['boxColor'] = '#ff0000'; 
                }
                
                
                
                $terminals = TerminalPreviewDB2::where('terminalID', $value['psid'])->get();
                if ( $terminals->count()){
            
                    $server_ps[$key]['topP'] = $terminals->first()->topP;
                    $server_ps[$key]['leftP'] = $terminals->first()->leftP;
                }else {
                    $server_ps[$key]['topP'] = $topT;
                    $server_ps[$key]['leftP'] = $leftT;
                    $topT = $topT + 50;
                    $leftT= $leftT + 50;
            
                }
            
                $server_ps[$key]['color'] = "#"."23b498"  ;
            };
            //var_dump($server_ps);
            //$errors = PsErrors::orderBy('time','asc')->paginate(300);
            //var_dump($server_ps); 
            return view('casino.casino', ['terminals' => $terminals, 'PsSettingsError' => $PsSettingsError, 'PsSettingsAttendant' => $PsSettingsAttendant, 'PsSettingsFree' => $PsSettingsFree, 'PsSettingsActive' => $PsSettingsActive, 'PsSettingsOffline' => $PsSettingsOffline, 'server_ps' => $server_ps, 'games' => $games]);
        } else {
            return view('casino.casinoErrors');
        }
    }
    public function getEvents(){
    	$errors = PsErrors::orderBy('time','asc')->paginate(300);
        //var_dump($errors); 
    	return view('casino.events', ['errors' => $errors]);
    }
}
