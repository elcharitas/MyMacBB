<?php
namespace App\Support\Twig\Util;

class NanoMac extends TwigObject
{
    protected $env;
    
    public function __construct($env = null)
    {
        $this->env = $env;
        
        $this->inherit([
            'bid' => bb_id(),
            'domain' => bb_domain()->domain,
            'url' => bb_url(),
            'branched' => false,
            'magbb' => bb_config('magbb.version'),
            'repo' => bb_config('magbb.repo', 'core/magbb'),
            'template_path' => bb_config('magbb.template_path','mods/magbb/_includes_')
        ]);
    }
    
    public function checkout($repo = null, $path = null, $scope = [])
    {
        $this->put('branched', true);
        $loaded = $this->loader()->load($repo ?: $this->repo, $this->magbb);
        
        if($path){
            echo $this->env->render($path);
            return $this->burst();
        }
        return $loaded;
    }
    
    public function burst()
    {
        $this->put('branched', false);
        return $this->loader()->open('/');
    }

    public function fetch($path = null)
    {
        $path && $this->burst() && $source = $this->loader()->get($path);
        return $this->checkout() ? $source: null;
    }
    
    public function include($path, $scope=[])
    {
        if(null !== $source = $this->fetch($path)){
            $this->burst();
            $this->env->createTemplate($source, $path);
            $source = $this->env->render($path, $scope?:[]);
            return $this->checkout() ? $source: null;
        }
    }
    
    public function template($name, $args=[])
    {
        $scope = bb('#.templateScope', [[]]);
        $last = collect($scope)->last();
        if(is_array($last)){
            $args = collect($last)->merge($args)->toArray();
        }
        array_push($scope, $args) && bb('#.templateScope', $scope);
        $path = str($name)->start('/')->start($this->get('template_path'))->finish('.twig');
        
        return rescue(function() use($path, $args, $scope){
            $res = $this->include($path, $args);
            return array_pop($scope) && bb('#.templateScope', $scope) ? $res: null;
        });
    }
    
    protected function loader()
    {
        return $this->env->getLoader();
    }
}


/*
$this->env = bb_env();
        
        $ob = $this->env->getGlobals()['BB'];
        
        $this->loader() = $this->env->getLoader();
        
        $this = $ob->obj('Mac', null, );
        
        $this->define('checkout', function($repo=null, $path=null, $scope=[]) use ($this, $this->loader(), $this->env){
            $this->put('branched', true);
            $loaded = $this->loader()->load($repo ?: $this->repo, $this->magbb);
            
            if($path){
                echo $this->env->render($path);
                return $this->burst();
            }
            return $loaded;
        });
        
        $this->define('fetch', function(string $path, $scope = []) use ($this, $this->loader()){
            
        });
        
        $this->define('include', function ($path, $scope=[]) use ($this, $this->loader(), $this->env){
            ($source = $this->fetch($path)) && $this->burst() && $this->env->createTemplate($source, $path) && $source = $this->env->render($path, $scope?:[]);
            return $this->checkout() ? $source: null;
        });
        
        //templates work in repo environment
        ($this->repo === 'core/magbb') && $this->define('template', function (?string $path=null, $args=[]) use ($this, $ob){
            $scope = bb('#.templateScope', function(){
                return [[]];
            });
            $last = collect($scope)->last();
            if(is_array($last)){
                $args = collect($last)->merge($args)->toArray();
            }
            array_push($scope, $args) && bb('#.templateScope', $scope);
            $path = str($path)->start('/')->start($this->get('template_path'))->finish('.twig');
            
            return rescue(function() use($this, $path, $args, $scope){
                $res = $this->include($path, $args);
                return array_pop($scope) && bb('#.templateScope', $scope) ? $res: null;
            });
        });
        
        $this->define('burst', function() use ($this, $this->loader()){
            $this->put('branched', false);
            return $this->loader()->open('/');
        });
        
        $this->env->addGlobal('Mac', $this);
        