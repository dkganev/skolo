<?php 

namespace App\Http\Controllers\Statistics;

use Excel;
use App\Http\Requests;
use App\Models\Cms\UserLogs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserLogsController extends Controller
{
    public function index(Request $request)
    {
        if ($request['rowsPerPage']) {
            $page['rowsPerPage'] = $request['rowsPerPage'];
        
        } else {
            $page['rowsPerPage'] = 20;
        
        }
        if ($request['OrderQuery']) {
            $page['OrderQuery'] = $request['OrderQuery'];
        } else {
            $page['OrderQuery'] = 'created_at';
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
            array_push($SortQuery,['created_at', '>=', $request['FromGameTs']]);
            $page['FromGameTs'] = $request['FromGameTs'];
        }else{
            $page['FromGameTs'] = "";
        }
        if ($request['ToGameTs']){
             array_push($SortQuery,['created_at', '<=', $request['ToGameTs']]);
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
        if ($request['Message']) {
            array_push($SortQuery,['message','like', '%' .  $request['Message'] . '%' ]);
            $page['Message'] = $request['Message'];
        } else {
            $page['Message'] = "";
        }
        if ($request['UserName']) {
            array_push($SortQuery,['user_name','like', '%' .  $request['UserName'] . '%' ]);
            $page['UserName'] = $request['UserName'];
        } else {
            $page['UserName'] = "";
        }
        if ($request['ip']) {
            array_push($SortQuery,['ip', $request['ip']]);
            $page['ip'] = $request['ip'];
        } else {
            $page['ip'] = "";
        }
        $historys = UserLogs::where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
        //$logs = UserLogs::orderBy('created_at', 'asc')->get();
        //return view('statistics.user-logs', compact('logs'));
        return view('statistics.user-logs', ['historys' => $historys, 'page' => $page ]);
    }
    
    public function export2excelAll(Request $request)
    {
        if ($request['rowsPerPage']) {
            $page['rowsPerPage'] = $request['rowsPerPage'];
        
        } else {
            $page['rowsPerPage'] = 20;
        
        }
        if ($request['OrderQuery']) {
            $page['OrderQuery'] = $request['OrderQuery'];
        } else {
            $page['OrderQuery'] = 'created_at';
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
            array_push($SortQuery,['created_at', '>=', $request['FromGameTs']]);
            $page['FromGameTs'] = $request['FromGameTs'];
        }else{
            $page['FromGameTs'] = "";
        }
        if ($request['ToGameTs']){
             array_push($SortQuery,['created_at', '<=', $request['ToGameTs']]);
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
        if ($request['Message']) {
            array_push($SortQuery,['message','like', '%' .  $request['Message'] . '%' ]);
            $page['Message'] = $request['Message'];
        } else {
            $page['Message'] = "";
        }
        if ($request['UserName']) {
            array_push($SortQuery,['user_name','like', '%' .  $request['UserName'] . '%' ]);
            $page['UserName'] = $request['UserName'];
        } else {
            $page['UserName'] = "";
        }
        if ($request['ip']) {
            array_push($SortQuery,['ip', $request['ip']]);
            $page['ip'] = $request['ip'];
        } else {
            $page['ip'] = "";
        }
        $historys = UserLogs::where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
        //$logs = UserLogs::orderBy('created_at', 'asc')->get();
        //return view('statistics.user-logs', compact('logs'));
        //return view('statistics.user-logs', ['historys' => $historys, 'page' => $page ]);
        $export = array();
        foreach ($historys as $key => $history) {
            $export[$key] = array(
                'Time' => $history->created_at, 
                'PS ID' =>  $history->psid, 
                'Description' => $history->message,
                'Username' => $history->user_name,
                'IP Adress' => $history->ip,
            );
            
        }
        //$export = $historys = BingoHistory::orderBy('tstamp', 'desc')->get();

        Excel::create('All User-Logs Data', function($excel) use($export){
            $excel->sheet('All User-Logs', function($sheet) use($export){
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
    
    
}