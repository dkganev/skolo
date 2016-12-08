<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Excel;
use App\Http\Requests;
use App\Models\Blackjack\BlackjackTable;
use App\Models\Blackjack\MainConfig;
use App\Models\Blackjack\AccConfig;
use App\Models\Blackjack\EnabledTables;


class BlackjackController extends Controller
{
    public function main_config_index()
    {
        $config = MainConfig::first();

        return view('settings.blackjack.main-config', ['config' => $config]);
    }

    public function main_config_export()
    {
        $export = MainConfig::first();
        Excel::create('Blackjack Main Confg Data', function($excel) use($export){
            $excel->sheet('Main Config', function($sheet) use($export){
                $sheet->FromArray($export);
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

    public function tables_index()
    {
        $tables = BlackjackTable::orderBy('table_id', 'asc')->get();
        $enabled = EnabledTables::first();

        return view('settings.blackjack.tables', compact('tables', 'enabled'));
    }

    public function table_edit(Request $request)
    {
        $table = BlackjackTable::where('table_id', $request->table_id)->first();

        $bet_min = 0;
        if($request->bet_min < $request->chip1) {
            $bet_min = $request->chip1;
        } else {
            $bet_min = $request->bet_min;
        }

        $status = $table->update([
            'bet_min' => $bet_min,
            'bet_max' => $request->bet_max,
            'chip1' => $request->chip1,
            'chip2' => $request->chip2,
            'chip3' => $request->chip3,
            'chip4' => $request->chip4,
            'chip5' => $request->chip5
        ]);

        if (!$table->update()) {
            $msg = 'Something Wrong Happend!';
            return response()->json(['response' => $msg], 400);
        }

        return response()->json(['response' => $table], 200);
    }

    public function enabled_tables(Request $request) 
    {
        EnabledTables::first()->update($request->except('_token'));
    }

    public function tables_export()
    {
        $export = BlackjackTable::orderBy('table_id', 'asc')->get();
        Excel::create('Blackjack Tables Data', function($excel) use($export){
            $excel->sheet('Tables', function($sheet) use($export){
                $sheet->FromArray($export);
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
    
    public function main_config_edit(Request $request)
    {
        MainConfig::first()->update($request->except('_token'));
    }

    public function acc_config_index()
    {
        $acc_config = AccConfig::first();
        return view('settings.blackjack.acc-config', compact('acc_config'));
    }

    public function acc_config_edit(Request $request)
    {
        AccConfig::first()->update($request->except('_token'));
    }
}