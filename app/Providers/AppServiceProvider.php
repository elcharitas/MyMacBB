<?php

namespace App\Providers;

use App\User;
use App\Board;
use App\Observers\User as UserObserver;
use App\Observers\Board as BoardObserver;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        
        Board::observe(BoardObserver::class);
        
    }
}
