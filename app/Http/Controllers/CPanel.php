<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;

class Cpanel extends Controller
{
    public function dashboard(Request $request)
    {
        return view('admin.index');
    }
    
    public function showLogin()
    {
        return view('admin.login');
    }
    
    public function showAssets(Request $request, $asset)
    {
        $asset = "_assets/$asset";
        
        $storage = Storage::disk('cpanel');
        
        if($storage->exists($asset)){
            return response($storage->get($asset), 200)
                    ->header('Content-Type', bb_mime($asset));
        } else {
            abort(404);
        }
    }
    
    public function handleLogin(Request $request)
    {
        
    }
}

