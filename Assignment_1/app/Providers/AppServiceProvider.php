<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
    $this->app->bind('App\Contracts\Dao\StudentDaoInterface', 'App\Dao\StudentDao');
  
    $this->app->bind('App\Contracts\Services\StudentServicesInterface', 'App\Services\StudentServices');
 
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
