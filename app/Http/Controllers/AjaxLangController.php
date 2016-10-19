<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AjaxLangController extends Controller
{
   public function index(Request $request)
    {
    	$dataLang = $request['lang'];
        $dataSet = session(['LoginUser.lang' => $dataLang]); 
        $dataGet = session()->get('LoginUser.lang');
        $dataArray1 = array(
            "success" => "success",
            "set" => $dataGet,
            "lang" => $dataLang
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
}
