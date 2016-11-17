<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Accounting\Casinos;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

    public function ajaxCheck()
    {
        // Configuration
        $maxIdleBeforeLogout = 600 * 1;
        $maxIdleBeforeWarning = 540 * 1;
        $warningTime = $maxIdleBeforeLogout - $maxIdleBeforeWarning;

        // Calculate the number of seconds since the use's last activity
        $idleTime = date('U') - Session::get('lastActive');
        // Warn user they will be logged out if idle for too long
        if ($idleTime > $maxIdleBeforeWarning && empty(Session::get('idleWarningDisplayed'))) {

            Session::set('idleWarningDisplayed', true);

            return 'You have ' . $warningTime . ' seconds left before you are logged out';
        }

        // Log out user if idle for too long
        if ($idleTime > $maxIdleBeforeLogout && empty(Session::get('logoutWarningDisplayed'))) {

            // *** Do stuff to log out user here
            auth()->logout();
            Session::set('logoutWarningDisplayed', true);

            return 'loggedOut';
        }

        return '';
    }
}
