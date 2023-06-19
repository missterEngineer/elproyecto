<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\Goods;
use App\Assigned_goods;

use App\Observers\UserObserver;
use App\Observers\GoodObserver;


class AppServiceProvider extends ServiceProvider{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){

        User::observe(UserObserver::class);
        Goods::observe(GoodObserver::class);
        
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
