<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Langs;
use Excel;

class LangsController extends Controller
{
    public function getLangs()
    {
    	$languages = Langs::all();

    	return view('settings.langs',['languages' => $languages]);
    }

    public function addLanguage(Request $request)
    {
    	$language = new Langs();
    	$language->langid = $request['langid'];
    	$language->langname = $request['langname'];
    	$language->save();

    	$msg = 'Language successfully added!';
        return $request->session()->flash('alert-success', $msg);
    }

    public function updateLanguage(Request $request)
    {
        $language = Langs::where('langid', $request['langid'])->first();
        $language->langid = $request['langid'];
        $language->langname = $request['langname'];
        $language->update();

        $msg = 'Language successfully updated!';
        return $request->session()->flash('alert-success', $msg);
    }

    public function exportLangs()
    {
        $export = Langs::all();

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

