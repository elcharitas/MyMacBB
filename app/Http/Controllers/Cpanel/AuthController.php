<?php

namespace App\Http\Controllers\Cpanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function show()
    {
        return view('cpanel.login');
    }
    
    public function handle(Request $request)
    {
        
    }
}
