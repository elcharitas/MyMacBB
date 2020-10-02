<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Controller;
use App\Http\Middleware\DeployBB;
use \Request;

class TinkerWrapper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bb:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imitate the request and response property of the app';
    
    /**
     * The App Controller instance
     * 
     * @var object
     */
    protected $controller;

    /**
     * The DeployBB Middleware instance
     * 
     * @var object
     */
    protected $middleware;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->controller = new Controller;
        
        $this->middleware = new DeployBB;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle($path='/')
    {
        $request = new Request;
        
        $this->comment('Starting Application...');
        
        $this->middleware->handle($request, function() use ($request, $path){
            //init the controller
            $response = $this->controller->index($request, $path);
            //checks if response is not empty then output content
            return $response && $this->info($response->getContent());
        });
        
        return 0;
    }
}
