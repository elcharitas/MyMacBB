<?php

namespace App\Http\Controllers\Cpanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('admin.login');
    }
    
    public function handleLogin(Request $request)
    {
        
    }
}
