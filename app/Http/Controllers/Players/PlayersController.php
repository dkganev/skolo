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
    
    //start Cards functions
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
        if ($request['FromBankCredit']){
            array_push($SortQuery,['bank_credit', '>=', $request['FromBankCredit']]);
            $page['FromBankCredit'] = $request['FromBankCredit'];
        }else{
            $page['FromBankCredit'] = "";
        }
        if ($request['ToBankCredit']){
            array_push($SortQuery,['bank_credit', '<=', $request['ToBankCredit']]);
            $page['ToBankCredit'] = $request['ToBankCredit'];
        }else{
            $page['ToBankCredit'] = "";
        }
        if ($request['FromBonusPoints']){
            array_push($SortQuery,['bonus_points', '>=', $request['FromBonusPoints']]);
            $page['FromBonusPoints'] = $request['FromBonusPoints'];
        }else{
            $page['FromBonusPoints'] = "";
        }
        if ($request['ToBonusPoints']){
            array_push($SortQuery,['bonus_points', '<=', $request['ToBonusPoints']]);
            $page['ToBonusPoints'] = $request['ToBonusPoints'];
        }else{
            $page['ToBonusPoints'] = "";
        }
        
        
        
        
        $UserInfoViews = UserInfoView::where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
        return view('players.cards', ['UserInfoViews' => $UserInfoViews, 'page' => $page]);
    }
    public function export2excelCards(Request $request)
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
        if ($request['FromBankCredit']){
            array_push($SortQuery,['bank_credit', '>=', $request['FromBankCredit']]);
            $page['FromBankCredit'] = $request['FromBankCredit'];
        }else{
            $page['FromBankCredit'] = "";
        }
        if ($request['ToBankCredit']){
            array_push($SortQuery,['bank_credit', '<=', $request['ToBankCredit']]);
            $page['ToBankCredit'] = $request['ToBankCredit'];
        }else{
            $page['ToBankCredit'] = "";
        }
        if ($request['FromBonusPoints']){
            array_push($SortQuery,['bonus_points', '>=', $request['FromBonusPoints']]);
            $page['FromBonusPoints'] = $request['FromBonusPoints'];
        }else{
            $page['FromBonusPoints'] = "";
        }
        if ($request['ToBonusPoints']){
            array_push($SortQuery,['bonus_points', '<=', $request['ToBonusPoints']]);
            $page['ToBonusPoints'] = $request['ToBonusPoints'];
        }else{
            $page['ToBonusPoints'] = "";
        }
        
        
        
        
        $UserInfoViews = UserInfoView::where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
        //return view('players.cards', ['UserInfoViews' => $UserInfoViews, 'page' => $page]);
        $export = array();
        foreach ($UserInfoViews as $key => $val) {
            $export[$key] = array(
                'ID' => $val->id, 
                'Card ID' => $val->card_id,
                'Name' =>  $val->name, 
                'Type' => $val->level,
                'Deposit' => $val->deposit / 100,
                'Bank Credit' => $val->bank_credit / 100 ,
                'Bonus Points' => $val->bonus_points 
            );
            
        }
        
        Excel::create('Cards Data', function($excel) use($export){
            $excel->sheet('Cards', function($sheet) use($export){
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
    public function ajax_ReadNewCard(Request $request)
    {   
        if ( $request['CasinoID']) {
            $CartInfo = CardReader::where("casino_id", $request['CasinoID'])->first();
            if (count($CartInfo)){
                $userInfo = UserInfo::where('card_id', $CartInfo->card_id)->first();
                if (count($userInfo) && $CartInfo->reader_status == 1){
                    $dataArray1 = array(
                        "success" => "error",
                        "CartInfo" => $CartInfo,
                        "userInfo" => $userInfo,
                        "error" => 1
                    );
                }else{
                    $dataArray1 = array(
                        "success" => "success",
                        "CartInfo" => $CartInfo,
                        "userInfo" => $userInfo   
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
                $user_info->deposit = $request['deposit'] != "" ? (round($request['deposit']) ) : 0;
                $user_info->bonus_points = 0;
                
                $test = $user_info->save();
                //$test = $games::where('id',$request['RowID'])->update($SortQuery);
                if ($test){
                    $testPage = view('players.SaveAddCard', ['val' => $user_info])->render();
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
    public function ajax_SaveEditCart(Request $request)
    {   
        if ( $request['CartID'] && $request['userName']) {
            $ID=$request['ID'];
            $CartID=$request['CartID'];
            $user_info = UserInfo::where('card_id', $CartID)->first();
            
            if (count($user_info) and $user_info->id == $ID ){
                $user_info->name = $request['userName'];
                $user_info->address = $request['userAddress'] != "" ? $request['userAddress'] : "" ;
                $user_info->phone = $request['userPhone'] != "" ? $request['userPhone'] : "";
                $user_info->deposit = $request['deposit'] != "" ? (round($request['deposit'])) : 0;
                
                $test = $user_info->update();
                if ($test){
                    $dataArray1 = array(
                        "success" => "success",
                        "CartInfo" => $user_info,
                        "error" => $test
                    );
                    
                }else{
                    $dataArray1 = array(
                        "success" => "error",
                        "error" => "The request is not saved."
                    );
                }
            }else if (!count($user_info)){
                $user_info = UserInfo::where('id', $ID)->first();
                $user_info->card_id = $request['CartID'];
                $user_info->name = $request['userName'];
                $user_info->address = $request['userAddress'] != "" ? $request['userAddress'] : "" ;
                $user_info->phone = $request['userPhone'] != "" ? $request['userPhone'] : "";
                $user_info->deposit = $request['deposit'] != "" ? (round($request['deposit'])) : 0;
                
                $test = $user_info->update();
                if ($test){
                        $dataArray1 = array(
                        "success" => "success",
                        "CartInfo" => $user_info,
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
    public function ajax_AddBankCreditCard(Request $request)
    {   
        if ($request['CartID'] and $request['AddWithdraw']) {
            //$ID=$request['ID'];
            $CartID=$request['CartID'];
            $user_info = UserInfo::where('card_id', $CartID)->first();
            
            if (count($user_info)){
                //$user_info->name = $request['userName'];
                //$user_info->address = $request['userAddress'] != "" ? $request['userAddress'] : "" ;
                //$user_info->phone = $request['userPhone'] != "" ? $request['userPhone'] : "";
                //$BankCreditWithdraw = $request['BankCreditWithdraw'] != "" ? (round($request['BankCreditWithdraw'])) : 0;
                if ($request['AddWithdraw'] == 1){
                    $user_info->bank_credit += $request['BankCreditWithdraw'] != "" ? (round($request['BankCreditWithdraw'])) : 0;
                }else{
                    $user_info->bank_credit -= $request['BankCreditWithdraw'] != "" ? (round($request['BankCreditWithdraw'])) : 0;
                }
                
                $test = $user_info->update();
                if ($test){
                    $dataArray1 = array(
                        "success" => "success",
                        "CartInfo" => $user_info,
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
                    "error" => "CartID missing in Database."
                );
            }
        } else {
            $dataArray1 = array(
                "success" => "error",
                "error" => "CartID missing."
            );
        }    
        
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    public function ajax_TransactionsCard(Request $request)
    {   
        if ($request['id'] ) {
            $userID = $request['id'];
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
        if ($request['FromBankCredit']){
            array_push($SortQuery,['bank_credit', '>=', $request['FromBankCredit']]);
            $page['FromBankCredit'] = $request['FromBankCredit'];
        }else{
            $page['FromBankCredit'] = "";
        }
        if ($request['ToBankCredit']){
            array_push($SortQuery,['bank_credit', '<=', $request['ToBankCredit']]);
            $page['ToBankCredit'] = $request['ToBankCredit'];
        }else{
            $page['ToBankCredit'] = "";
        }
        if ($request['FromBonusPoints']){
            array_push($SortQuery,['bonus_points', '>=', $request['FromBonusPoints']]);
            $page['FromBonusPoints'] = $request['FromBonusPoints'];
        }else{
            $page['FromBonusPoints'] = "";
        }
        if ($request['ToBonusPoints']){
            array_push($SortQuery,['bonus_points', '<=', $request['ToBonusPoints']]);
            $page['ToBonusPoints'] = $request['ToBonusPoints'];
        }else{
            $page['ToBonusPoints'] = "";
        }
        
        
        
        
        $UserInfoViews = UserInfoView::where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
            
            
            $testPage = view('players.ajax_TransactionsCard', ['userID' => $userID,'UserInfoViews' => $UserInfoViews, 'page' => $page])->render();
            
            
                $dataArray1 = array(
                    "success" => "success",
                    "testPage" => $testPage,
                    "error" => "CartID missing in Database."
                );
           
        } else {
            $dataArray1 = array(
                "success" => "error",
                "error" => "id missing."
            );
        }    
        
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    
    //stop Cards functions  ajax_TransactionsCard

}