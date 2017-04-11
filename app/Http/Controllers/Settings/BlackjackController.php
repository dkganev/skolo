<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Excel;
use App\Http\Requests;
use App\Models\Blackjack\BlackjackTable;
use App\Models\Blackjack\MainConfig;
use App\Models\Blackjack\AccConfig;
use App\Models\Blackjack\PsConf;
use App\Models\Blackjack\EnabledTables;
use App\Events\TerminalAdded;


class BlackjackController extends Controller
{
    public function main_config_index()
    {
        session(['last_page' => 'settings/blackjack/mainconfig']);
        session(['last_menu' => 'menuBlackjack']);
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
        session(['last_page' => 'settings/blackjack/tables']);
        session(['last_menu' => 'menuBlackjack']);
        $tables = BlackjackTable::orderBy('table_id', 'asc')->get();
        $enabled = EnabledTables::first();

        $enabled_color_ids = [];

        $enabled_color_ids[] = $enabled->t1_enabled == true ? 1 : '';
        $enabled_color_ids[] = $enabled->t2_enabled == true ? 2 : '';
        $enabled_color_ids[] = $enabled->t3_enabled == true ? 3 : '';
        $enabled_color_ids[] = $enabled->t4_enabled == true ? 4 : '';
        $enabled_color_ids[] = $enabled->t5_enabled == true ? 5 : '';
        $enabled_color_ids[] = $enabled->t6_enabled == true ? 6 : '';
        $enabled_color_ids[] = $enabled->t7_enabled == true ? 7 : '';
        $enabled_color_ids[] = $enabled->t8_enabled == true ? 8 : '';

        return view('settings.blackjack.tables', compact('tables', 'enabled', 'enabled_color_ids'));
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
        event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Blackjack Tables Updated. Something Wrong Happend!', 2));
        return response()->json(['response' => $msg], 400);
        }

        event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Blackjack Tables Updated', 2));
        return response()->json(['response' => $table], 200);
    }

    public function enabled_tables(Request $request) 
    {
        if ($request->radio == 1) {
            event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Blackjack  One Table Updated', 2));
            EnabledTables::first()->update([
                't1_enabled' => true,
                't2_enabled' => false,
                't3_enabled' => false,
                't4_enabled' => false,
                't5_enabled' => false,
                't6_enabled' => false,
                't7_enabled' => false,
                't8_enabled' => false,
            ]);
        } elseif ($request->radio == 2) {
            event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Blackjack 2 Tables Updated', 2));
            EnabledTables::first()->update([
                't1_enabled' => true,
                't2_enabled' => true,
                't3_enabled' => false,
                't4_enabled' => false,
                't5_enabled' => false,
                't6_enabled' => false,
                't7_enabled' => false,
                't8_enabled' => false,
            ]);
        } elseif ($request->radio == 4) {
            event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Blackjack 4 Tables Updated', 2));
            EnabledTables::first()->update([
                't1_enabled' => true,
                't2_enabled' => true,
                't3_enabled' => true,
                't4_enabled' => true,
                't5_enabled' => false,
                't6_enabled' => false,
                't7_enabled' => false,
                't8_enabled' => false,
            ]);
        } elseif ($request->radio == 8) {
            event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Blackjack 8 Tables Updated', 2));
            EnabledTables::first()->update([
                't1_enabled' => true,
                't2_enabled' => true,
                't3_enabled' => true,
                't4_enabled' => true,
                't5_enabled' => true,
                't6_enabled' => true,
                't7_enabled' => true,
                't8_enabled' => true,
            ]);
        }
    }

    public function tables_export()
    {
        //$export = BlackjackTable::orderBy('table_id', 'asc')->get();
        $tables = BlackjackTable::orderBy('table_id', 'asc')->get();
        $export = array();
            foreach ($tables as $key => $val) {
            
                $export[$key] = array(
                    'Table' => $val->table_id + 1, 
                    'Min Bet' => $val->bet_min, 
                    'Max Bet' => $val->bet_max, 
                    'Chip 1' => $val->chip1, 
                    'Chip 2' => $val->chip2, 
                    'Chip 3' => $val->chip3, 
                    'Chip 4' => $val->chip4, 
                    'Chip 5' => $val->chip5
                );
            
            }
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
        event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Blackjack Main Config Updated.', 2));
        MainConfig::first()->update($request->except('_token'));
    }

    public function ps_config_index(Request $request)
    {
        session(['last_page' => 'settings/blackjack/psconfig']);
        session(['last_menu' => 'menuBlackjack']);
        if ($request['pageID']) {
            $page['pageID'] = $request['pageID'];
        
        } else {
            $page['pageID'] = 0;
        
        }
        $ps_conf = PsConf::orderBy('ps_id', 'asc')->get();
        return view('settings.blackjack.ps-config', ['ps_conf' => $ps_conf, 'page' => $page ]);
    }        
    
    public function ps_config_edit(Request $request)
    {
        event(new TerminalAdded(request()->ip(), request()->user()->name, $request->ps_id , 'BJ Terminals Config Updated', 2));
        PsConf::where('ps_id', $request->ps_id)->first()->update($request->except('_token'));  
    }
    
    public function ps_config_editAll(Request $request)
    {
        event(new TerminalAdded(request()->ip(), request()->user()->name, $request->ps_id , 'BJ Terminals Config Updated All', 2));
        $psidArray = PsConf::get();
        foreach ($psidArray as $val){
            PsConf::where('ps_id', $val->ps_id)->first()->update($request->except(['_token', 'ps_id'])); 
        }
        //PsConf::where('ps_id', $request->ps_id)->first()->update($request->except('_token'));  
    } 
    
    public function acc_config_index(Request $request)
    {
        session(['last_page' => 'settings/blackjack/accconfig']);
        session(['last_menu' => 'menuBlackjack']);
        $acc_config = AccConfig::first();
        return view('settings.blackjack.acc-config', compact('acc_config'));
    }

    public function acc_config_edit(Request $request)
    {
        event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Blackjack Accounting Config Updated', 2));
        AccConfig::first()->update($request->except('_token'));
    }
}