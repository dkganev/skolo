<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Casinos;

class AuthController extends Controller
{

    public function index()
    {
        if(Auth::check())
        {
            return view('settings.index');
        }

    	return view('index');
    }

    public function postLogin(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'password' => 'required'
    	]);

    	if(!Auth::attempt(['name' => $request['name'], 'password' => $request['password']]))
    	{
                
    		return redirect()->back();
    	}
            $casinos = Casinos::select(['casinoid', 'casinoname'])->get();
            $firstCasinos = array('casinoid' => $casinos->first()->casinoid,'casinoname' => $casinos->first()->casinoname );
            session(['Casino' => $firstCasinos ]);        
            $UserLog = User::where('name', $request['name'])->get();
            $loginUser = array('name' => $UserLog->first()->name, 'email' => $UserLog->first()->email, 'lang' => $UserLog->first()->lang, 'type' => $UserLog->first()->type , 'firstname' => $UserLog->first()->firstname , 'lastname' => $UserLog->first()->lastname);
            session(['LoginUser' => $loginUser ]);//
            $UserMenu = array('menu' => "casino", 'subMenu' => "casino");
            session(['UserMenu' => $UserMenu ]);//
    	       return redirect()->route('settings');
    }

    public function logout()
    {
    	Auth::logout();
        
    	return redirect('/');
    }

}
