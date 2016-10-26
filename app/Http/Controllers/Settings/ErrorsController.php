<?php 

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\PsErrorLevels;
use App\Models\PsErrorsList;

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
        return $request->session()->flash('alert-success', $msg);
    }
}
