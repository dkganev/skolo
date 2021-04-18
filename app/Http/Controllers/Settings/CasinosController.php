<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Accounting\Casinos;
use App\Events\TerminalAdded;
use Excel;
use Ajax;

class CasinosController extends Controller
{
	public function getCasinos()
	{
		session(['last_page' => 'settings/casinos']);
                session(['last_menu' => 'menuCasinos']);
                $casinos = Casinos::orderBy('casinoid', 'asc')->get();
                return view('settings.casinos', ['casinos' => $casinos]);
	}

	public function addCasino(Request $request)
	{
		$casino = new Casinos();
		$casino->casinoid = $request['casinoid'];
		$casino->casinoname = $request['casinoname'];
		$casino->casinoaddr = $request['casinoaddr'];
		$casino->casinogsm = $request['casinogsm'];
		$casino->save();

		$msg = 'Casino successfully added!';
		event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Casino successfully added!', 2));
                return redirect()->back()->with('alert-success', $msg);
	}

	public function updateCasino(Request $request)
	{
		$casino = Casinos::where('casinoid', $request['casinoid'])->first();
		$status = $casino->update($request->except('_token'));

		if(!$status) {
			$response = [ 'msg' => 'Query Failed!' ];
			return response()->json($response, 403);
		}

		$response = [
			'casino' => $casino,
			'msg' => 'Casino updated successfully'
		];
		event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'Casino updated successfully', 2));
                return response()->json($response, 200);
	}

	public function exportCasinos()
	{
		//$export = Casinos::all();
            $casinos = Casinos::orderBy('casinoid', 'asc')->get();
            $export = array();
            foreach ($casinos as $key => $val) {
            
                $export[$key] = array(
                    'ID' => $val->casinoid, 
                    'Casino Name' => $val->casinoname, 
                    'Casino Address' => $val->casinoaddr, 
                    'Casino GSM' => $val->casinogsm
                );
            
            }

		Excel::create('Casinos Data', function($excel) use($export) {
			$excel->sheet('Casinos', function($sheet) use($export) {
                
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
