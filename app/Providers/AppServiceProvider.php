<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\{User, Board};
use App\Observers\User as UserObserver;
use App\Observers\Board as BoardObserver;
use \Validator;

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
        /**1
         * Extend Validator to:
         * integer, smallint, bigint, float, cast,
         * default, distinct
         */
        Validator::extend('default', function(){
            return true;
        });

        Validator::extend('float', function($attr, $val){
            return is_float($val);
        });
        
        Validator::extend('unmatched', function($attr, $val, $param, $validator){
            return true;
        });
        
        Validator::extend('cast', function($attr, $val){
            return !is_null($val);
        });
        
        Validator::extend('number', function($attr, $val){
            return is_numeric($val);
        });

        Validator::extend('primary', function($attr, $val){
            return is_numeric($val);
        });

        Validator::extend('only', function($attr, $val){
            $val &= 5;
            return 5;//is_numeric($val);
        });
        
        Validator::extend('text', function($attr, $val){
            return is_string($val);
        });
    }
}
