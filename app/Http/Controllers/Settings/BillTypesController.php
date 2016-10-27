<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Accounting\BillTypes;
use Excel;

class BillTypesController extends Controller
{
    public function getBillTypes()
    {
    	$billtypes = BillTypes::all();

        return view('settings.billtypes', ['billtypes' => $billtypes]);
    }

    public function addBillType(Request $request)
    {
    	$billType = new BillTypes();
    	$billType->idtype = $request['idtype'];
    	$billType->billname = $request['billname'];
    	$billType->save();

    	$msg = 'Language successfully added!';
        return $request->session()->flash('alert-success', $msg);
    }

    public function updateBillType(Request $request)
    {
        $billType = BillTypes::where('idtype', '=', $request['idtype'])->first();
        $billType->idtype = $request['idtype'];
        $billType->billname = $request['billname'];
        $billType->update();

        $msg = 'Bill type successfully updated!';
        return $request->session()->flash('alert-success', $msg);
    }

    public function exportBillTypes()
    {
        $export = BillTypes::all();

        Excel::create('Bill Types Data', function($excel) use($export){
            $excel->sheet('Bill Types', function($sheet) use($export){
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
