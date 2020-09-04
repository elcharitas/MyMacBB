<?php

namespace App\Support;

use \Http;

class HttpRequest {
    
    protected $xhr;
    
    protected $url;
    
    protected $method;
    
    protected $data;
    
    protected $as_form;
    
    protected $auth;
    
    protected $bearer;
    
    protected $timeout = 2;
    
    protected $retry;
    
    protected $headers = [];
    
    public function __construct($url, $method='GET', $data=[]){
        $xhr = $this->setUrl($url)
                    ->setMethod($method)
                    ->setData($data);
    }
    
    public function send(){
    
        $xhr = Http::timeout($this->timeout)
                    ->withHeaders($this->headers);
                    
        if($this->retry){
            $xhr = $xhr->retry(...$this->retry);
        }
                    
        if($this->auth){
            $xhr = $xhr->withBasicAuth(...$this->auth);
        }
                    
        if($this->bearer){
            $xhr = $xhr->withToken($this->bearer);
        }
        
        if($this->as_form){
            $xhr = $xhr->asForm();
        }
        
        $method = strtolower($this->method);
        
        if(in_array($method, ['get', 'post'])){
            $this->xhr = $xhr->{$method}($this->url, $this->data);
        }
        
        return $this->xhr->successful();
    }
    
    public function toJson(){
        return $this->xhr ? $this->xhr->json(): null;
    }
    
    public function toArray(){
        return collect(json_decode($this->toJson()?:'[]'))->toArray();
    }
    
    public function headers(){
        return $this->xhr ? $this->xhr->headers(): [];
    }
    
    public function __isset($name){
        $name = str($name)->snake();
        if($name->startsWith('set_')){
            $name = trim($name->afterLast('set_'));
            if(isset($this->{$name}) || is_null($this->{$name})){
                return true;
            }
        }
        return false;
    }
    
    public function __call($name, $args){
        $name = str($name)->snake();
        if($name->startsWith('set_')){
            $name = trim($name->afterLast('set_'));
            if(isset($this->{$name}) || is_null($this->{$name})){
                $this->{$name} = $args[0];
            }
            return $this;
        } else {
            throw null;
        }
    }
}