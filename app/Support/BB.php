<?php

namespace App\Support;

use Hash, Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Mail\Markdown;
use App\Support\Twig\Util\TwigObject;

class BB {
    
    public function repo($path='/'){
        return new Repo($path);
    }

    /**
     * Creates a new Twig Object Instance
     *
     * @return App\Support\Twiggy
     */
    public function obj(?string $name, $parent=null, array $default=[]){
        return bb("objects.$name", function() use ($default, $name, $parent){
            $obj = new TwigObject($default);
            if($parent){
                $parent = is_string($parent) ? $this->obj($parent): $parent;
                $obj->inherit($parent);
            }
            $obj->name($name);
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
    
    public function cookie($cookie, ...$args){
        return $cookie ? cookie($cookie, ...$args): new Cookie;
    }
    
    public function db($key=''){
        return bb_db($key);
    }

    public function hash(string $string){
        return bcrypt($string);
    }
    
    public function check(string $hash, string $check){
        return Hash::check($check, $hash);
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

    /**
     * Performs a redirect
     *
     * @return Illuminate\Support\Request
     */
    public function redirect(string $path, $sessions=[]){
        return bb_redirect($path, $sessions);
    }

    /**
     * Generates a HTTP propagator request object
     *
     * @return App\Support\HttpRequest
     */
    public function xhr(string $url, array $data=[], string $method='GET'){
        return new HttpRequest($url, $method, $data);
    }

    public function ini($key, $value=null, ?string $conf=null){
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
        
        if(!is_null($conf) && !is_null($value)){
            $ini = $this->ini($key);
            $conf = trim(str($conf)->start($value ? 'enable_': 'disable_')->camel());
            
            if(method_exists(bb_env(), $conf)){
                return bb_env()->{$conf}($value) ?: true;
            }
            
            return false;
        } else if(is_null($value)){
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
    
    public function md2html(string $mdString){
        return Markdown::parse($mdString);
    }
    
    public function code2html(string $bbcodeString){
        return $bbcodeString;
    }
    
    public function __toString(){
        return 'BB()';
    }
    
    public function __get($name){
        return method_exists($this, $name) ? $this->{$name}(null): null;
    }
    
    public function __isset($name){
        return method_exists($this, $name);
    }
}