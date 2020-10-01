<?php

namespace App\Support;
use Illuminate\Support\Facades\Http;

class BB {
    
    public function repo($path='/'){
        return new Repo($path);
    }
    
    public function obj(?string $name, ?string $parent=null, array $default=[]){
        return bb("objects.$name", function() use ($default, $name, $parent){
            $obj = new Twiggy($default);
            $obj->name($name);
            if($parent){
                $parent = $this->obj($parent);
                $obj->inherit(collect($parent));
            }
            return $obj;
        });
    }
    
    public function url($path=null){
        return bb_url($path);
    }
    
    public function id(){
        return bb_id();
    }

    public function user(){
        return bb_user();
    }

    public function base($path=null){
        return bb_base($path);
    }

    public function config($config, $default=null){
        return bb_config($config, $default);
    }

    public function cache(...$args){
        return bb_cache(...$args);
    }
    
    public function session($session, ...$args){
        return $session ? session($session, ...$args): session()->all();
    }
    
    public function cookie(...$args){
        return cookie(...$args);
    }
    
    public function db($key=''){
        return bb_db($key);
    }
    
    public function post(?string $param=null){
        return request()->post($param);
    }
    
    public function path(?string $param=null){
        return trim(str(request()->path())->finish($param?:'/'));
    }
    
    public function query(?string $param=null){
        return request()->query($param);
    }
    
    public function previousUrl(){
        return url()->previous();
    }
    
    public function redirect(string $path, $sessions=[]){
        echo bb_redirect($path, $sessions);
        return true;
    }
    
    public function xhr(string $url, array $data=[], string $method='GET'){
        return new HttpRequest($url, $method, $data);
    }

    public function ini($key, $value=null){
        $conf = ' ';
        switch($key){
            case 'escape':
                $conf = 'autoescape';
            break;
            case 'strict_mode':
                $conf = 'strict_variables';
            break;
            case 'debug_mode':
                $conf = 'debug';
            break;
            case 'charset':
                $conf = $key;
            break;
            case 'auto_reload':
                $conf = $key;
            break;
        }
        
        if($conf != ' ' && $value){
            $ini = $this->ini($key);
            $conf = trim(str($conf)->start($value ? 'enable_': 'disable_')->camel());
            
            if(method_exists(bb_env(), $conf)){
                return bb_env()->{$conf}($value) ?: true;
            }
            
            return false;
        } else if($conf != ' '){
            $value = trim(str($conf)->start('get_')->camel());
            $conf = trim(str($conf)->start('is_')->camel());
            
            if(method_exists(bb_env(), $conf)){
                return bb_env()->{$conf}($value) ?: false;
            }
            
            if(method_exists(bb_env(), $value)){
                return bb_env()->{$value}() ?: null;
            }
        }
        return false;
    }
    
    public function __toString(){
        return 'BB{}';
    }
}