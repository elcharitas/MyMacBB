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

$methods = ['get', 'post'];

Route::get('/', 'Cpanel@dashboard');
Route::get('/signin', 'Cpanel@showLogin');
Route::post('/signin', 'Cpanel@handleLogin');
Route::get('/assets/{asset}', 'Cpanel@showAssets');

Route::get('/{path}', function(){
    abort(404);
});