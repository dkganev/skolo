<?php
namespace App\Http\Controllers\Shkolo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Models\Shkolo\Links;
use App\Models\Shkolo\Colors;



class Shkolo extends Controller
{
 
    public function __construct() {
        
    }
    
    public function Index() {
        $dataLinks = DB::table('Links')->select('Links.ID','Links.Name','Links.URL','Links.Color_ID','colors.color')->
            join('colors', function ($join) {$join->on('colors.ID', '=', 'Links.Color_ID');})->orderBy('Links.ID')->take(9)->get();
        $data = array();
        foreach ($dataLinks as $dataLink){
            $datall[$dataLink->ID] = [
                'ID' => $dataLink->ID,
                'Name'=>$dataLink->Name, 
                'URL'=>$dataLink->URL,
                'Color_ID'=>$dataLink->Color_ID,
                'color'=> $dataLink->color,
                'title' => $dataLink->Name
            ];
        }
        for ($i=1; $i <= 9; $i++) {
            if (!isset($datall[$i])){
                $data[$i] = [
                    'ID' => $i,'Name'=>'', 
                    'URL'=>'/shkolo/public/modal/'.$i,
                    'Color_ID'=>0,
                    'color'=> '#000000', 
                    'title' => 'Този бутон няма Линк'
                ];
            }
            else {
                $data[$i] = $datall[$i];
            }
        }
	return view('main',['mainDatas'=>$data]); 
    }
	
    public function Modal(Request $request, $id) {
        $dataLinks = Links::where('ID', $id)->first();
        if (!isset($dataLinks)){
            $dataLinks = ['Name'=>'', 'URL'=>'','Color_ID'=>0];
        }
        
        $dataColors = Colors::where('active', 1)->orderBy('color')->get();
        return view('modal',['ID'=>$id, 'linksData'=>$dataLinks, 'dataColors'=>$dataColors ]); 
    }
        
    public function Update(Request $request) {
        
        if (null !== $request->input('ID') ){
            $id = $request->input('ID');
            if (!is_int($id) && (1>$id || $id>9)) {
                return ['success'=>0,'error'=>"Missing Data."];
            } 
        }
        else{
            return ['success'=>0,'error'=>"Missing Data."];
        }
        
        if (null !== $request->input('color_id') ){
            $color = intval($request->input('color_id'));
            if (!is_int($color)) {
                return ['success'=>0,'error'=>"$color Missing Color22."];
            } 
            if ($color == 0) {
                $update = Links::where('ID', $id)->delete();
                return ['success'=>1,'error'=>"$color Missing Color22."];
            } 
        }
        else{
            return ['success'=>0,'error'=>"Missing Color11."];
        }
        

        if (null !== $request->input('name') ){
            $name = $request->input('name');
        }
        else{
            return ['success'=>0,'error'=>"Missing Title."];
        }

        if (null !== $request->input('url') ){
            $url = $request->input('url');
            if (!filter_var($url, FILTER_VALIDATE_URL)) {
                return ['success'=>0,'error'=>"Link is not a valid URL"];
            } 
        }
        else{
            return ['success'=>0,'error'=>"Missing Link"];
        }
        
        
        
        $update = 'test';
        $ifUpdate = Links::where('ID', $id)->first();
        if (isset($ifUpdate)){
            $updateDta = [
                'Name'=>$name,
                'URL'=>$url,
                'Color_ID'=>$color
            ]; 
            $update = Links::where('ID', $id)->update($updateDta);
        }
        else{
            $updateDta = [
                'ID'=>$id,
                'Name'=>$name,
                'URL'=>$url,
                'Color_ID'=>$color
            ]; 
            $update = Links::create($updateDta);
        }
        return [ 'success'=>1,'data'=>$update];
    }
    
}




