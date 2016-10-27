<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Accounting\Casinos;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.navbar', function($view) {
            $dataGet = session()->get('LoginUser.lang');
            app()->setLocale($dataGet);

            $view->with('dataGet', $dataGet);
        });

        view()->composer('layouts.navbar', function($view) {
            $casinos = Casinos::all();
            $view->with('casinos', $casinos);
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
