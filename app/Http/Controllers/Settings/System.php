<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;  
use Excel;


class System extends Controller  
{
     public function System()
    {
    	//$settings = Settings::first();
        return view('settings.System.System');
    }
    
    
    
}