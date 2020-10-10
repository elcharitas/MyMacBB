<?php

namespace App\Http\Controllers;

use App\Support\Repo;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class BoardController extends Controller
{

    public function index($path=''){
        
        $path = bb_base($path);
        $mime = bb_mime($path);
        
        $source = bb_cache($path, function() use ($path){
            $repo = new Repo;
            $ext = str($path)->afterLast('.')->lower();
            $path = $repo->exists($path) ? $path: "$path.twig";
            
            $auto = rescue(function(){
                $twig = bb_config('twig');
                return $twig['auto_parse'] ? $twig['exts'] : [];
            }, []);
            
            switch($ext){
                case 'md':
                    $source = Markdown::parse(bb_res($path));
                break;
                case 'twig':
                    if(!in_array($ext, $auto)){
                        throw new FileNotFoundException;
                    }
                break;
                default:
                    if(in_array($ext, $auto) || str($path)->afterLast('.')->is('twig')){
                        $source = bb_env()->render($path);
                    } else {
                        $source = bb_res($path);
                    }
            }
            
            return gtrim($source, '\t\n\s');
        }, bb_config('cache.expire', 30), 'compiled');
        
        return response($source, 200)
                ->header('Content-Type', $mime);
    }
}
