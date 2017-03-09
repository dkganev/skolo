<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Accounting\Langs;
use App\Events\TerminalAdded;
use Excel;

class LangsController extends Controller
{
    public function getLangs()
    {
    	session(['last_page' => 'settings/langs']);
        session(['last_menu' => 'menuLangs']);
        $languages = Langs::orderBy('langid', 'asc')->get();

    	return view('settings.langs',['languages' => $languages]);
    }

    public function addLanguage(Request $request)
    {
    	$language = new Langs();
    	$language->langid = $request['langid'];
    	$language->langname = $request['langname'];
    	$language->save();

    	$msg = 'Language successfully added!';
        event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Language successfully added!', 2));
        return $request->session()->flash('alert-success', $msg);
    }

    public function updateLanguage(Request $request)
    {
        $language = Langs::where('langid', $request['langid'])->first();
        $language->langid = $request['langid'];
        $language->langname = $request['langname'];
        $language->update();

        $msg = 'Language successfully updated!';
        event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Language successfully updated!', 2));
        return $request->session()->flash('alert-success', $msg);
    }

    public function destroy(Request $request)
    {
        $language = Langs::where('langid', $request->id)->first();
        $deleted = $language->delete();

        if(!$deleted) {
            event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Cannot Delete Language!', 2));
        
            return response()->json(['message' => 'Cannot Delete Language!'], 401);
        }

        event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Language Deleted!', 2));
        return response()->json(['message' => 'Language Deleted!'], 200);
    }

    public function exportLangs()
    {
        //$export = Langs::all();
        $languages = Langs::orderBy('langid', 'asc')->get();
        $export = array();
        foreach ($languages as $key => $val) {
            
            $export[$key] = array(
                'ID' => $val->langid, 
                'Language Name' => $val->langname
            );
            
        }
        Excel::create('Langs Data', function($excel) use($export){
            $excel->sheet('Langs', function($sheet) use($export){
                
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

