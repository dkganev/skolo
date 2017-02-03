<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Models\User;
use App\Http\Requests;
use App\Models\Cms\CmsLangs;
use App\Models\Cms\UserLogs;
use App\Events\UserLoggedIn;
use App\Events\UserLoggedOut;
use Illuminate\Http\Request;
use App\Events\UserFailedToLogIn;
use Spatie\Permission\Models\Role;
use App\Models\Accounting\Casinos;
use Spatie\Permission\Models\Permission;

class AuthController extends Controller
{
    //public function __construct()
    //{
    //    if(Auth::check())
    //    {
    //        return view('settings.index');
    //    }
    //}
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
            $typeE = 1;
            $messageE = 'User attempted to log in!';
            //event(new UserFailedToLogIn(request()->ip(), $request->name));
            event(new UserLoggedIn(request()->ip(), $request->name, $messageE, $typeE));
        
            return redirect('/');
        }
        
        // Get first(default) Casino and store it in the session)
        $casino = Casinos::first();
        session(['casino' => $casino]);
        
        $CmsLangs = CmsLangs::where('langid' , Auth::user()->lang_id )->first();
        
        $locale = \App::setLocale(Auth::user()->lang);
        //$locale = \App::setLocale($CmsLangs->lang_code);
        //$locale = 'test' . $locale;
        session(['locale' => $CmsLangs]);
        session(['LoginUser.lang' => $CmsLangs->lang_code]);
        $typeE = 1;
        $messageE = 'User logged in!';
        event(new UserLoggedIn(request()->ip(), $request->name, $messageE, $typeE));
        return redirect('/');
    }

    public function logout(Request $request)
    {
        /*UserLogs::create([
            'user_name' => request()->user()->name,
            'ip' => request()->ip(),
            'type' => 1,
            'message' => 'User logged out!'
        ]);*/
        
        $user_nameE = request()->user()->name;
        $typeE = 1;
        $messageE = 'User logged out';
        event(new UserLoggedIn(request()->ip(), $user_nameE, $messageE, $typeE));
        Auth::logout();
        
        return redirect('/');
        
    }

    public function ajaxCheck(Request $request)
    {
        // Configuration
        //$maxIdleBeforeLogout = 1800 * 1;
        //$maxIdleBeforeWarning = 1700 * 1;
        $maxIdleBeforeLogout = ini_get("session.gc_maxlifetime") - 100;
        
        //$maxIdleBeforeLogout = 20;
        $maxIdleBeforeWarning = $maxIdleBeforeLogout - 100;
        $warningTime = $maxIdleBeforeLogout - $maxIdleBeforeWarning;
        // Calculate the number of seconds since the use's last activity
        $idleTime = date('U') - Session::get('lastActive');
        // Warn user they will be logged out if idle for too long
        if ($idleTime > $maxIdleBeforeWarning && empty(Session::get('idleWarningDisplayed'))) {
            Session::set('idleWarningDisplayed', true);

            return 'You have ' . $warningTime . ' seconds left before you are logged out' . $maxIdleBeforeLogout;
        }

        // Log out user if idle for too long
        if ($idleTime > $maxIdleBeforeLogout ) {
            Session::set('idleWarningDisplayed', folse);
            // *** Do stuff to log out user here
            /*UserLogs::create([
                'user_name' => request()->user()->name,
                'ip' => request()->ip(),
                'type' => 1,
                'message' => 'User logged out!'
            ]);*/
            $user_nameE = request()->user()->name;
            $typeE = 1;
            $messageE = 'User logged out';
            event(new UserLoggedIn(request()->ip(), $user_nameE, $messageE, $typeE));
            Auth()->logout();
            //Session::set('logoutWarningDisplayed', true);

            return 'loggedOut';
            //return redirect('/');
        }

        return '';
    }
}
