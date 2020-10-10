<?php

namespace App\Http\Middleware;

use Closure;
use App\Support\Repo;

class CustomErrorControl
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
        $repo = new Repo;
        $path = bb_base($request->path());
        $errorPath = bb_config('filesystem.errorDoc');
        
        if(!$repo->exists($path) && !$repo->exists($path.'.twig')){
            if($errorPath && is_string($errorPath)){
                $doc = gtrim(bb_env()->render($errorPath));
                return response($doc, 404);
            } else {
                abort(404);
            }
        }
        
        return $next($request);
    }
}
