<?php

namespace App\Http\Controllers\Cpanel;

use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssetController extends Controller
{

    public function show(Request $request, $asset)
    {
        $asset = "_assets/$asset";
        
        $storage = Storage::disk('cpanel');
        
        return response($storage->get($asset), 200)
                ->header('Content-Type', bb_mime($asset));
    }
}