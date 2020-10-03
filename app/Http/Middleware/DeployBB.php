<?php

namespace App\Http\Middleware;

use Closure;

class DeployBB
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $path = bb_config('cache.path', '_cache');
        
        $configs = [
            'app.name' => bb_config('app.name'),
            'app.url' => bb_config('app.url'),
            'app.key' => bb_config('app.hash'),
            'cache.stores.file.path' => bb_storage($path)
        ];
        
        $env = bb_env();
        
        $ob = $env->getGlobals()['BB'];
        
        $loader = $env->getLoader();
        
        $bb = $ob->obj('Mac', null, [
            'bid' => bb_id(),
            'domain' => bb_domain()->domain,
            'url' => bb_url(),
            'branched' => false,
            'magbb' => bb_config('magbb.version'),
            'repo' => trim(bb_config('magbb.repo', 'core/magbb')),
            'template' => bb_config('magbb.template','magbb')
        ]);
        
        $bb->put('branch', function($path=null, $scope=[]) use ($bb, $loader, $env){
            $bb->put('branched', true);
            $loaded = $loader->load($bb->repo, $bb->magbb);
            if($path){
                echo $env->render($path);
                return $bb->burst();
            }
            return $loaded;
        }, true);
        
        $bb->put('fetch', function(string $path, $scope = []) use ($bb, $loader){
            $path && $bb->burst() && $source = $loader->get($path);
            return $bb->branch() ? $source: null;
        }, true);
        
        $bb->put('include', function ($path, $scope=[]) use ($bb, $loader, $env){
            ($source = $bb->fetch($path)) && $bb->burst() && $env->createTemplate($source, $path) && $source = $env->render($path, $scope?:[]);
            return $bb->branch() ? $source: null;
        }, true);
        
        ($bb->repo === 'core/magbb') && $bb->put('template', function (?string $part=null, $args=[]) use ($bb, $ob){
            $path = str($part)->start('/')->start($ob->obj($bb->template)->basePath)->finish('.twig');
            //return rescue(function() use($bb, $path, $args){
                return $bb->include($path, $args);
            //});
        }, true);
        
        $bb->put('burst', function() use ($bb, $loader){
            $bb->put('branched', false);
            return $loader->open('/');
        }, true);
        
        $env->addGlobal('Mac', $bb);
        
        config($configs);
        
        \URL::forceRootUrl(bb_config('app.url'));
        
        return $next($request);
    }
    
    public function terminate($request){
        //initiate the garbage collector
    }
}