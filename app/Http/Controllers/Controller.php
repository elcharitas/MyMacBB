<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Mail\Markdown;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index(\Request $request, $path=''){
        $path = bb_base($path);
        $code = 200;
        
        $ignore = bb_config('filesystem.ignore', []);
        
        if(is_array($ignore)){
            foreach($ignore as $index){
                if(str($path)->is($index)){
                    $doc = bb_config('filesystem.ignoreDoc');
                    return $doc ? response(gtrim(bb_env()->render($doc)), 403): abort(403);
                }
            }
        }
        
        list($source, $mime, $code) = bb_cache($path, function() use ($path, $code){
            $errorPath = bb_config('filesystem.errorDoc');
            
            $mime = bb_mime($path);
            
            if($errorPath && is_string($errorPath)){
                $source = bb_res($path, true);
                if(!$source && !bb_res("$path.twig", true) && $source = bb_res($errorPath)){
                    $path = $errorPath;
                    $code = bb_config('filesystem.errorCode', 404);
                }
            } else {
                $source = bb_res($path);
            }
            
            $ext = str($path)->afterLast('.')->lower();
            $path = $source ? $path: "$path.twig";
            
            $auto = rescue(function(){
                $twig = bb_config('twig');
                return $twig['auto_parse'] ? $twig['exts'] : [];
            }, []);
            
            switch($ext){
                case 'md':
                    $source = Markdown::parse($source);
                break;
                case 'twig':
                    if(!in_array($ext, $auto)){
                        throw new FileNotFoundException;
                    }
                break;
                default:
                    if(in_array($ext, $auto) || str($path)->afterLast('.')->is('twig')){
                        $source = bb_env()->render($path);
                    }
            }
            
            return [gtrim($source, '\t\n\s'), $mime, $code];
        }, bb_config('cache.expire', 30), 'compiled');
        
        return response($source, $code)
                ->header('Content-Type', $mime);
    }
}
