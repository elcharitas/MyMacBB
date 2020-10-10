<?php

namespace App\Http\Controllers\Cpanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('admin.index');
    }
}

