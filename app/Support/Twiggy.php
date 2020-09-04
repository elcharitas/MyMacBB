<?php

namespace App\Support;

class Twiggy {
    
    public $__name;
    
    protected $data = [];
    
    protected $fillable = [];
    
    public function __construct($fill=[]){
        
        foreach($fill as $key => $fill){
            data_set($this->data, $key, $fill);
        }
    }
    
    public function __get($key){
        return $this->get($key);
    }
    
    public function __call($key, $arg){
        $twig = bb_env();
        $key = $this->fillable[$key] ?? null;
        $args = json_encode($arg);
        return is_string($key) && $twig->envParser->hasMacro($key) ? $twig->compileString("{% do $key($args) %}"): (!is_string($key) && is_callable($key) ? $key(...$arg): null);
    }
    
    public function put($key, $value, bool $fillable=false){
        $count = $this->count($fillable);
        $write = $this->get($key) !== $value;
        
        if(!$fillable){
            data_set($this->data, $key, $value);
        } else {
            data_set($this->fillable, $key, $value);
        }
        
        return $this->count($fillable) > $count || $write;
    }
    
    public function get($key, $default=null){
        return data_get($this->data, $key, $default);
    }
    
    public function isNull($key){
        return is_null($this->get($key));
    }
    
    public function isset(string $key){
        $key = str($key);
        $base = $key->contains('.') ? $key->beforeLast('.'): null;
        $key = trim($key->afterLast('.'));
        
        $data = $base ? $this->get($base): $this->data;
        return is_object($data) ? isset($data->{$key}): isset($data[$key]);
    }
    
    public function __isset($key){
        return true;
    }
    
    public function count(bool $fillable=false){
        if(!$fillable){
            return count($this->data);
        } else {
            return count($this->fillable);
        }
    }
    
    public static function create(...$args){
        return new static(...$args);
    }
    
    public function inherit($collect){
        $parent = collect($collect);
        list($data, $fillable) = $parent->keys();
        foreach($parent->get($data) as $key => $value){
            $this->put($key, $value);
        }
    }
    
    public function config($config, $data=null){
        return bb_config($config, $data, ($name = $this->__name) && $name != 'magbb' ? $name : $this->basePath);
    }
}