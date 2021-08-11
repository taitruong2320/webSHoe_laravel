<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\nhom;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('templates.main',function($view){
            $loai_sp = nhom::all();
            $view->with('loai_sp',$loai_sp);
        });
    }
}
