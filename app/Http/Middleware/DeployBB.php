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

        config($configs);
        
        //enforce the root url
        \URL::forceRootUrl(bb_config('app.url'));
        
        return $next($request);
    }
    
    public function terminate($request)
    {
        //initiate the garbage collectors
    }
}