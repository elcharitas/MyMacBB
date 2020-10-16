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
            'template_path' => bb_config('magbb.template_path','mods/magbb/_includes_')
        ]);
        
        $bb->define('checkout', function($repo=null, $path=null, $scope=[]) use ($bb, $loader, $env){
            $bb->put('branched', true);
            $loaded = $loader->load($repo ?: $bb->repo, $bb->magbb);
            
            if($path){
                echo $env->render($path);
                return $bb->burst();
            }
            return $loaded;
        });
        
        $bb->define('fetch', function(string $path, $scope = []) use ($bb, $loader){
            $path && $bb->burst() && $source = $loader->get($path);
            return $bb->checkout() ? $source: null;
        });
        
        $bb->define('include', function ($path, $scope=[]) use ($bb, $loader, $env){
            ($source = $bb->fetch($path)) && $bb->burst() && $env->createTemplate($source, $path) && $source = $env->render($path, $scope?:[]);
            return $bb->checkout() ? $source: null;
        });
        
        //templates work in repo environment
        ($bb->repo === 'core/magbb') && $bb->define('template', function (?string $path=null, $args=[]) use ($bb, $ob){
            $scope = bb('#.templateScope', function(){
                return [[]];
            });
            $last = collect($scope)->last();
            if(is_array($last)){
                $args = collect($last)->merge($args)->toArray();
            }
            array_push($scope, $args) && bb('#.templateScope', $scope);
            $path = str($path)->start('/')->start($bb->get('template_path'))->finish('.twig');
            
            return rescue(function() use($bb, $path, $args, $scope){
                $res = $bb->include($path, $args);
                return array_pop($scope) && bb('#.templateScope', $scope) ? $res: null;
            });
        });
        
        $bb->define('burst', function() use ($bb, $loader){
            $bb->put('branched', false);
            return $loader->open('/');
        });
        
        $env->addGlobal('Mac', $bb);
        
        config($configs);
        
        //enforce the root url
        \URL::forceRootUrl(bb_config('app.url'));
        
        return $next($request);
    }
    
    public function terminate($request){
        //initiate the garbage collectors
    }
}