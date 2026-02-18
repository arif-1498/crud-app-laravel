<?php

namespace App\Providers;

use App\facade\SearchManager;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\facade\SearchUser;
use App\Models\User;
use Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('SearchUser', function () {
            return new SearchManager();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       
    }
}
