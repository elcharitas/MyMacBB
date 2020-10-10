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

Route::get('/', 'Cpanel@dashboard')
    ->middleware(['auth'])
    ->name('index');

Route::get('/signin', 'Cpanel@showLogin')
    ->middleware(['guest'])
    ->name('login');

Route::post('/signin', 'Cpanel@handleLogin')
    ->middleware(['guest'])
    ->name('postlogin');

Route::get('/assets/{asset}', 'Cpanel@showAssets')
    ->name('assets');

Route::get('/{path}', function(){
    abort(404);
})->name('fallback');