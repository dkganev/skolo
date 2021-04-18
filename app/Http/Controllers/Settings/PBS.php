<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;  
use App\Models\IMS\Settings;
use App\Models\IMS\IMSGames;
use App\Models\Accounting\Games;
use Excel;


class PBS extends Controller  
{
    public function BonusPoints2Money()
    {
    	$settings = Settings::first();
        return view('settings.PBS.BonusPoints2Money', ['settings' => $settings]);
    }
    public function ajax_BonusPoints2Money(Request $request)
    {
    	if ($request['BonusPoints2Money']) {
            $settings = Settings::first();
            $settings->points_to_money = $request['BonusPoints2Money'];
            $test = $settings::where('casino_name', $settings->casino_name)->update(['points_to_money' => $request['BonusPoints2Money']]);
            if ($test == 1){
                $dataArray1 = array(
                    "success" => "success",
                );
            }else{
                $dataArray1 = array(
                    "success" => "error",
                );
            }
        } else {
            $dataArray1 = array(
                "success" => "error",
            );
        }    
        
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    public function export2excelBonusPoints2Money()
    {
    	$settings = Settings::first();
        $export = array();
            $export[1] = array(
                //'Casino Name' => $settings->casino_name, 
                'Points to Money' => $settings->points_to_money, 
                'Bonus Period' => $settings->bonus_period, 
                'Bronze Gold Boundery' => $settings->bronze_gold_boundery, 
                'Gold Platinum Boundery' => $settings->gold_platinum_boundery, 
            );
            
        
        Excel::create('Ruolette Data', function($excel) use($export){
            $excel->sheet('Ruolette', function($sheet) use($export){
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
    
    public function Bet2BonusPoints()
    {
    	//$wheel_settings = WheelSettings::first();
        //return view('settings.roulette.roulette2.wheel-settings', ['wheel_settings' => $wheel_settings]);
        $games = IMSGames::orderBy('id')->get();
        $AccountingGames = Games::orderBy('gameid', 'asc')->get();
        return view('settings.PBS.Bet2BonusPoints', ['games' => $games, 'AccountingGames' => $AccountingGames]);
    }
    public function EditBet2BonusPoints(Request $request)
    {
    	$SortQuery = array();
    	//if ($request['name']) {
        //    $SortQuery['name'] = $request['name'];
        //}
        if ($request['bronze_money_for_bonus_point']) {
            $SortQuery['bronze_money_for_bonus_point'] = $request['bronze_money_for_bonus_point'];
        }
        if ($request['gold_money_for_bonus_point']) {
            $SortQuery['gold_money_for_bonus_point'] = $request['gold_money_for_bonus_point'];
        }
        if ($request['platinum_money_for_bonus_point']) {
            $SortQuery['platinum_money_for_bonus_point'] = $request['platinum_money_for_bonus_point'];
        }
        
        
        if ($request['RowID']) {
            $games =IMSGames::where('id',$request['RowID'])->first();
            $test = $games::where('id',$request['RowID'])->update($SortQuery);
            if ($test == 1){
                $dataArray1 = array(
                    "success" => "success",
                );
            }else{
                $dataArray1 = array(
                    "success" => "error",
                );
            }
        } else {
            $dataArray1 = array(
                "success" => "error",
            );
        }    
        
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    public function RemoveBet2BonusPoints(Request $request)
    {
    	if ($request['RowID']) {
            $games =IMSGames::where('id',$request['RowID'])->first();
            $test = $games->delete();
            if ($test == 1){
                $dataArray1 = array(
                    "success" => "success",
                    "error" => $test,
                );
            }else{
                $dataArray1 = array(
                    "success" => "error",
                );
            }
        } else {
            $dataArray1 = array(
                "success" => "error",
            );
        }    
        
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
     public function SaveAddBet2BonusPoints(Request $request)
    {
    	/*$SortQuery = array();
    	if ($request['name']) {
            $SortQuery['name'] = $request['name'];
        }
        if ($request['bronze_money_for_bonus_point']) {
            $SortQuery['bronze_money_for_bonus_point'] = $request['bronze_money_for_bonus_point'];
        }
        if ($request['gold_money_for_bonus_point']) {
            $SortQuery['gold_money_for_bonus_point'] = $request['gold_money_for_bonus_point'];
        }
        if ($request['platinum_money_for_bonus_point']) {
            $SortQuery['platinum_money_for_bonus_point'] = $request['platinum_money_for_bonus_point'];
        }
        */
        
        if ($request['id']) {
            //$SortQuery['id'] = $request['id'];
            if ($games =IMSGames::where('id',$request['id'])->count()){
                $dataArray1 = array(
                "success" => "error",
                "error" => "The game exist. You can edit it.",
            );
            }else{
                $game = new IMSGames();
                $game->id = $request['id'];
                $game->name = $request['name'];
                $game->bronze_money_for_bonus_point = $request['bronze_money_for_bonus_point'];
                $game->gold_money_for_bonus_point = $request['gold_money_for_bonus_point'];
                $game->platinum_money_for_bonus_point = $request['platinum_money_for_bonus_point'];
                
                $test = $game->save();
                //$test = $games::where('id',$request['RowID'])->update($SortQuery);
                if ($test){
                    $testPage = view('settings.SaveAddBet2BonusPoints', ['game' => $game])->render();
        
                    
                    
                    $dataArray1 = array(
                        "success" => "success",
                        "error" => $test,
                        "html" => $testPage
                    );
                }else{
                    $dataArray1 = array(
                        "success" => "error",
                        "error" => "The game is not saved.",
                    );
                }
            }
        } else {
            $dataArray1 = array(
                "success" => "error",
                "error" => "The game ID missing.",
                
            );
        }    
        
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    public function export2excelBet2BonusPoints()
    {
    	$games = IMSGames::orderBy('id')->get();
        $export = array();
        foreach ($games as $key => $val){
            $export[$key] = array(
                'Game ID' => $val->id, 
                'Game Name' => $val->name, 
                'Bronze Money for Bonus Point' => $val->bronze_money_for_bonus_point, 
                'Bronze Gold Boundery' => $val->bronze_gold_boundery,
                'Gold Money for Bonus Point' => $val->gold_money_for_bonus_point, 
                'Platinum Money for Bonus Point' => $val->platinum_money_for_bonus_point, 
            );
        };    
        
        Excel::create('Ruolette Data', function($excel) use($export){
            $excel->sheet('Ruolette', function($sheet) use($export){
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
    
    public function CardTypeBonusPeriod()
    {
    	$settings = Settings::first();
        return view('settings.PBS.CardTypeBonusPeriod', ['settings' => $settings]);
    }
    
    
    public function ajax_CardTypeBonusPeriod(Request $request)
    {
        $SortQuery = array();
    	if ($request['bonus_period']) {
            $SortQuery['bonus_period'] = $request['bonus_period'];
        }
        if ($request['bronze_gold_boundery']) {
            $SortQuery['bronze_gold_boundery'] = $request['bronze_gold_boundery'];
        }
        if ($request['gold_platinum_boundery']) {
            $SortQuery['gold_platinum_boundery'] = $request['gold_platinum_boundery'];
        }
               
        if ( !empty($SortQuery)) {
            $settings = Settings::first();
            //$settings->points_to_money = $request['BonusPoints2Money'];
            $test = $settings::where('casino_name', $settings->casino_name)->update($SortQuery);
            if ($test == 1){
                $dataArray1 = array(
                    "success" => "success",
                );
            }else{
                $dataArray1 = array(
                    "success" => "error",
                );
            }
        } else {
            $dataArray1 = array(
                "success" => "error",
            );
        }    
        
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    
    
}    