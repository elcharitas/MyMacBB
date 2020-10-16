<?php
namespace App\Support\Twig\Util;

use App\Support\Traits\MagickTrait;

class TwigObject {
    use MagickTrait;
    
    /**
     * Creates a new instance and optionally inherits variables
     * 
     * @param App\Support\Twig\Util\TwigObject|array $fillable
     * @return void
     */
    public function __construct($fillable=null){
        if(!is_null($fillable)){
            $this->inherit($fillable);
        }
    }
    
    /**
     * Sets a variable using a key and value
     * 
     * @param string $key
     * @param mixed $value
     * 
     * @return bool
     */
    public function put(string $key, $value){
        return $this->get($key) !== $value && data_set($this->fillable, $key, $value);
    }
    
    /**
     * Gets the value of a variable or return default
     * 
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    public function get($key, $default=null){
        return data_get($this->fillable, $key, $default);
    }
    
    /**
     * Checks if Key variable is null
     * 
     * @param string $key
     * @return bool
     */
    public function isNull($key){
        return is_null($this->get($key));
    }
    
    /**
     * Gets count of all variables
     * 
     * @return int
     */
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

        foreach(collect($collect)->toArray() as $key => $fill){
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