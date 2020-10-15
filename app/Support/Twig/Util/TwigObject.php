<?php
namespace App\Support\Twig\Util;

use App\Support\Traits\MagickTrait;

class TwigObject {
    use MagickTrait;

    public function __construct($fillable=null){
        if(!is_null($fillable)){
            $this->inherit($fillable);
        }
    }
    public function put($key, $value){
        return $this->get($key) !== $value && data_set($this->fillable, $key, $value);
    }
    
    public function get($key, $default=null){
        return data_get($this->fillable, $key, $default);
    }
    
    public function isNull($key){
        return is_null($this->get($key));
    }
    
    public function count(){
        return count($this->fillable);
    }
    
    public static function create(...$args){
        return new static(...$args);
    }
    
    public function inherit($collect, $prefix=''){
        
        if($collect instanceof static){
            $collect = $collect->all();
        }

        foreach($collect as $key => $fill){
            data_set($this->fillable, $prefix.$key, $fill);
        }
        return true;
    }
    
    public function config($config, $data=null){
        return bb_config($config, $data, ($name = $this->__name) && $name != 'magbb' ? $name : $this->basePath);
    }

    public function name(?string $name=null){
        return $name ? $this->__name = $name: $this->__name;
    }
}