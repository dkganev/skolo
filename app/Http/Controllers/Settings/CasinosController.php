<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Accounting\Casinos;
use Excel;
use Ajax;

class CasinosController extends Controller
{
	public function getCasinos()
	{
		$casinos = Casinos::all();
		return view('settings.casinos', compact('casinos'));
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
		return redirect()->back()->with('alert-success', $msg);
	}

	public function updateCasino(Request $request)
	{
		$casino = Casinos::where('casinoid', $request['casinoid'])->first();

		$casino->casinoname = $request['casinoname'];
		$casino->casinoaddr = $request['casinoaddr'];
		$casino->casinogsm = $request['casinogsm'];
		$status = $casino->update();

		if(!$status) {
			$reponse = [ $msg => 'Query Failed!' ];
			return response()->json($reponse, 403);
		}

		$reponse = [ $msg => 'Casino updated successfully' ];
		return reponse()->json($reponse, 200);
	}

	public function exportCasinos()
	{
		$export = Casinos::all();

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
