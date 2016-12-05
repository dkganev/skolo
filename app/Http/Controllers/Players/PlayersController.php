<?php

namespace App\Http\Controllers\Players;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\IMS\CardReader;
use App\Models\IMS\UserInfo;
use App\Models\IMS\UserInfoView;
use App\Http\Requests;

use Excel;

class PlayersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('players.index');
    }
    
    public function cards(Request $request)
    {
        if ($request['rowsPerPage']) {
            $page['rowsPerPage'] = $request['rowsPerPage'];
        
        } else {
            $page['rowsPerPage'] = 20;
        
        }
        if ($request['OrderQuery']) {
            $page['OrderQuery'] = $request['OrderQuery'];
        } else {
            $page['OrderQuery'] = 'id';
        }
        if ($request['OrderDesc']) {
            $page['OrderDesc'] = $request['OrderDesc'];
        } else {
            $page['OrderDesc'] = 'asc';
        }
        if ($request['sortMenuOpen'] == 1 ) {
            $page['sortMenuOpen'] = 1;
        } else {
            $page['sortMenuOpen'] = 0;
        }
        $SortQuery = array(); 
        if ($request['CardID']){
            array_push($SortQuery,['card_id', 'like', '%' . $request['CardID'] .'%']);
            $page['CardID'] = $request['CardID'];
        }else{
            $page['CardID'] = "";
        }
        if ($request['Name']){
            array_push($SortQuery,['name', 'like', '%' . $request['Name'] .'%']);
            $page['Name'] = $request['Name'];
        }else{
            $page['Name'] = "";
        }
        if ($request['Level']){
            array_push($SortQuery,['level', '=', $request['Level'] ]);
            $page['Level'] = $request['Level'];
        }else{
            $page['Level'] = "";
        }
        
        if ($request['FromDeposit']){
            array_push($SortQuery,['deposit', '>=', $request['FromDeposit']]);
            $page['FromDeposit'] = $request['FromDeposit'];
        }else{
            $page['FromDeposit'] = "";
        }
        if ($request['ToDeposit']){
            array_push($SortQuery,['deposit', '<=', $request['ToDeposit']]);
            $page['ToDeposit'] = $request['ToDeposit'];
        }else{
            $page['ToDeposit'] = "";
        }
        
        
        
        
        $UserInfoViews = UserInfoView::where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
        return view('players.cards', ['UserInfoViews' => $UserInfoViews, 'page' => $page]);
    }
    public function ajax_ReadNewCard(Request $request)
    {   
        if ( $request['CasinoID']) {
            $CartInfo = CardReader::where("casino_id", $request['CasinoID'])->first();
            if (count($CartInfo)){
                if (count(UserInfo::where('card_id', $CartInfo->card_id)->first())){
                    $dataArray1 = array(
                        "success" => "error",
                        "CartInfo" => $CartInfo,
                        "error" => 1
                    );
                }else{
                    $dataArray1 = array(
                        "success" => "success",
                        "CartInfo" => $CartInfo
                    );
                }
            } else {
                $dataArray1 = array(
                    "success" => "error",
                    "error" => "CasinoID missing."
                );
            }
        } else {
            $dataArray1 = array(
                "success" => "error",
                "error" => "CasinoID missing."
            );
        }    
        
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    public function ajax_SaveAddCard(Request $request)
    {   
        if ( $request['CartID'] && $request['userName']) {
            $CartID=$request['CartID'];
            //$userName=$request['userName'];
            if (!count(UserInfo::where('card_id', $CartID)->first())){
                $user_info = new UserInfo();
                $user_info->card_id = $request['CartID'];
                $user_info->name = $request['userName'];
                $user_info->address = $request['userAddress'] != "" ? $request['userAddress'] : "" ;
                $user_info->phone = $request['userPhone'] != "" ? $request['userPhone'] : "";
                $user_info->bank_credit = 0;
                $user_info->deposit = $request['deposit'] != "" ? ($request['deposit'] * 100) : 0;
                $user_info->bonus_points = 0;
                
                $test = $user_info->save();
                //$test = $games::where('id',$request['RowID'])->update($SortQuery);
                if ($test){
                    $testPage = view('players.SaveAddCard', ['user_info' => $user_info])->render();
                    $dataArray1 = array(
                        "success" => "success",
                        "CartInfo" => $user_info,
                        "html" => $testPage,
                        "error" => $test
                    );
                    
                }else{
                    $dataArray1 = array(
                        "success" => "error",
                        "error" => "The request is not saved."
                    );
                }
            }else{
                $dataArray1 = array(
                    "success" => "error",
                    "error" => "CartID Exist in Database."
                );
            }
        } else {
            $dataArray1 = array(
                "success" => "error",
                "error" => "CartID and userName missing."
            );
        }    
        
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    

}