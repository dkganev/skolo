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
            return redirect()->route('index');
        }

        // Get first(default) Casino and store it in the session)
        $casino = Casinos::first();
        session(['casino' => $casino]);

        $locale = \App::setLocale(Auth::user()->lang);
        session(['locale' => $locale]);

        return redirect()->route('settings');
    }

    public function logout()
    {
        Auth::logout();
        
        return redirect('/');
    }
}
