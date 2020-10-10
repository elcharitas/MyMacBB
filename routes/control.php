<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Control Panel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

Route::get('/', 'IndexController@dashboard')
    ->middleware(['auth'])
    ->name('index');

Route::get('/signin', 'AuthController@showLogin')
    ->middleware(['guest'])
    ->name('login');

Route::post('/signin', 'AuthController@handleLogin')
    ->middleware(['guest'])
    ->name('postlogin');

Route::get('/assets/{asset}', 'AssetController@showAssets')
    ->name('assets');

Route::get('/{path}', function(){
    abort(404);
})->name('fallback');