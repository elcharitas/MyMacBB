<?php

namespace App\Http\Middleware;

use Closure;

class CustomAccessControl
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

        $ignore = bb_config('filesystem.ignore', []);
        
        foreach ($ignore as $index){
            if(str(bb_base($request->path()))->is($index)){
                $doc = bb_config('filesystem.ignoreDoc');
                return $doc ? response(gtrim(bb_env()->render($doc)), 403): abort(403);
            }
        }
        
        return $next($request);
    }
}
