<?php

namespace App\Http\Controllers\Cpanel;

use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssetController extends Controller
{

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
}
