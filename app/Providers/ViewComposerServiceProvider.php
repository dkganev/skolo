<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Accounting\Casinos;
use App\Models\Cms\CmsLangs;
//use Illuminate\Support\Facades\Auth;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //view()->composer('*', function($view) {
        //if (session())
        //if( Auth::check() )
        //{
            //Auth::logout();
            //return redirect('/');
        //}
        //    $dataGet = session()->all();
        //    var_dump($dataGet);
        //});
        view()->composer('*', function($view) {
            $dataGet = session()->get('LoginUser.lang');
            app()->setLocale($dataGet);

            $view->with('dataGet', $dataGet);
        });

        view()->composer('*', function($view) {
            $casinos = Casinos::all();
            $view->with('casinos', $casinos);
            $CmsLangs = CmsLangs::orderBy("langid", "asc")->get();
            $view->with('CmsLangs', $CmsLangs);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
