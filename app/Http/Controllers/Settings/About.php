<?php


namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Events\TerminalAdded;
use Illuminate\Support\Facades\DB;
//use DB;
use Excel;
//use App\Models\Accounting\Games;
//use App\Models\Accounting\ServerPs;
//use App\Models\Slots\PsConf;
//use App\Models\Slots\AccConf;


class About extends Controller
{
     public function index(Request $request){
        session(['last_page' => '/settings/About']);
        session(['last_menu' => 'menuAbout']);
        $shellOutput = [];
        exec('git log -n1 HEAD', $shellOutput);
        $arrayS = explode(" ", $shellOutput[2]);
        $aboutArray['commitDate'] = $arrayS[3] .' '. $arrayS[4] .' '. $arrayS[5] .' '. $arrayS[6] .' '. $arrayS[7] .' '. $arrayS[8];
        
        $shellOutput = [];
        exec('git log --pretty="%H" -n1 HEAD', $shellOutput);
        $arrayS = explode(" ", $shellOutput[0]);
        $aboutArray['commit'] = $arrayS[0];  
        
        $shellOutput = [];
        exec('git log --pretty="%d" -n1 HEAD', $shellOutput);
        $arrayS = explode(",", $shellOutput[0]);
        foreach ($arrayS as $key => $val){
            if (strpos($val, 'tag:') !== false) {
                $arrayS2 = explode("tag: ", $val);
                $arrayS3 = explode("-", $arrayS2[1]);
                $aboutArray['version'] = $arrayS3[0];
                $aboutArray['update'] = $arrayS3[1];
            }
        }
        
        $shellOutput = [];
        exec('git status --porcelain', $shellOutput);
        
        $shellOutput2 = [];
        exec('git log --pretty="%d" -n1 HEAD', $shellOutput2);
        //$aboutArray['version'] = $arrayS[1];  git diff-index --quiet HEAD --
        //$aboutArray['update'] = $arrayS[2];
        //var_dump($shellOutput);
        /*foreach ($shellOutput as $line) {
            if (strpos($line, '* ') !== false) {
                return trim(strtolower(str_replace('* ', '', $line)));
            }
        }*/
        
        
        return view('settings.about', ['shellOutput' => $shellOutput, 'aboutArray' => $aboutArray, 'shellOutput2' => $shellOutput2 ]);
    }
}
