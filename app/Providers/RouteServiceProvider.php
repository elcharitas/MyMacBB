<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::pattern('path', '.*');
        Route::pattern('asset', '.+');
        Route::pattern('id', '[0-9]+');

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        // api routes
        $this->mapApiRoutes();
        // control panel routes
        $this->mapControlRoutes();
        // basic app routes
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware(['deploy', 'access', 'error', 'web'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::middleware('api')
            ->domain(env('API_URL', 'api.localhost'))
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
    
    /**
     * Define "control" routes for the application
     * 
     * These routes are very similar to "web" routes
     * 
     * @return void
     */
    protected function mapControlRoutes()
    {
        Route::middleware(['web'])
            ->name('cpanel')
            ->domain(env('ADMIN_URL', 'cpanel.localhost'))
            ->namespace($this->namespace.'\Cpanel')
            ->group(base_path('routes/control.php'));
    }
}
