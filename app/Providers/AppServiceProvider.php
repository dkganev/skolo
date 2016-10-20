<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Extensions\MongoSessionStore;
use Illuminate\Support\Facades\View;
use App\Models\Casinos;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {   //session_start();
        //$test333 =$_SESSION["Casino"];
        //var_dump($test333);
        //$casinos = Casinos::select(['casinoid', 'casinoname'])->get();
        //$currentCasinos = session()->get('Casino.casinoname');
        //$dataGet = session()->get('LoginUser.lang');
        //$dataGet = $request->session()->get('LoginUser.lang');
        //$dataGet ="test";
        //Session::put('lang2', 'en_US');
        //app()->setLocale($dataGet);
        //$test2222 =Session::all();
    //var_dump($test2222);
        //View::share('test123', Session::get("Casino")["casinoname"]);
        //View::share('test1234', "dataGet");
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
