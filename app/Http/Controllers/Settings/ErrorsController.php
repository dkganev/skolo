<?php 

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Accounting\PsErrorLevels;
use App\Models\Accounting\PsErrorsList;
use App\Events\TerminalAdded;
use Excel;

class ErrorsController extends Controller
{
    public function getErrors() {
    	$error_lvls = PsErrorLevels::orderBy('err_level', 'asc')->get();
        $error_list = PsErrorsList::orderBy('err_code', 'asc')->get();

    	return view('settings.errors', ['error_lvls' => $error_lvls, 'error_list' => $error_list]);
    }

    public function addErrorLevel(Request $request)
    {
    	$error_lvl = new PsErrorLevels();

    	$error_lvl->err_level = $request['err_level'];
    	$error_lvl->level_str = $request['level_str'];
    	
    	$error_lvl->save();

        $msg = 'Error level added successfully!';
        return $request->session()->flash('alert-success', $msg);
    }

    public function addErrorList(Request $request)
    {
        $error_list = new PsErrorsList();

        $error_list->err_code = $request['err_code'];
        $error_list->err_group = $request['err_group'];
        $error_list->err_text  = $request['err_text'];

        $error_lvl = PsErrorLevels::where('err_level', '=', $request['err_level'])->first();
        $error_lvl->error_list()->save($error_list);
        
        $error_list->save();

        $msg = 'Error List Added Successfully!';
        event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Error List Added Successfully!', 2));
        return $request->session()->flash('alert-success', $msg);
    }

    public function export_errors_level()
    {
        //$export = PsErrorLevels::orderBy('err_level', 'asc')->get();
        $error_lvls = PsErrorLevels::orderBy('err_level', 'asc')->get();
        $export = array();
        foreach ($error_lvls as $key => $val) {
            
            $export[$key] = array(
                'Error Level Int' => $val->err_level, 
                'Error Level String' => $val->level_str
            );
            
        }
        Excel::create('Errors Level Data', function($excel) use($export){
            $excel->sheet('Errors Level', function($sheet) use($export){
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

    public function export_errors_list()
    {
        //$export = PsErrorsList::orderBy('err_code', 'asc')->get();
        $error_list = PsErrorsList::orderBy('err_code', 'asc')->get();
        $export = array();
        foreach ($error_list as $key => $val) {
            
            $export[$key] = array(
                'Error Code' => $val->err_code, 
                'Error Level' => $val->err_lvl->level_str, 
                'Error Group' => $val->err_group === 1 ? "NOTE" : (
                                    $val->err_group === 2 ? "DOORS" : (
                                    $val->err_group === 4 ? "DOORSOFF" : (
                                    $val->err_group === 8 ? "ERROR" : (
                                    $val->err_group === 16 ? "CR_IN" : (
                                    $val->err_group === 32 ? "BILL" : (
                                    $val->err_group === 64 ? "HANDPAY" : (
                                    $val->err_group === 128 ? "PRGR" : (
                                    $val->err_group === 256 ? "VOUCHRIN" : (
                                    $val->err_group === 512 ? "VOUCHOUT" : (
                                    $val->err_group === 1024 ? "CASHLESSIN" : (
                                    $val->err_group === 2048 ? "CASHLESSOUT" : (
                                    $val->err_group === 4096 ? "BONUS" : (
                                    $val->err_group === 8192 ? "MONEY" : (
                                    $val->err_group === 16384 ? "SERVER" : $val->err_group )))))))))))))), 
                'Error Text' => $val->err_text
            );
            
        }
        Excel::create('Errors List Data', function($excel) use($export){
            $excel->sheet('Errors List', function($sheet) use($export){
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
