<?php
namespace App\Support\Traits;

trait MagickTrait {
    /**
     * Name of Current Object
     * @var string
     */
    protected $__name;
    
    /**
     * Data driven variables collection
     * @var array
     */
    protected $fillable = [];
    
    /**
     * Methods/Callable Closure Collectiom
     * @var array
     */
    protected $callable = [];
    
    /**
     * Gets Non abstract Vatiables by key names
     * 
     * @param string $key
     * @return mixed|null
     */
    public function __get($key){
        $property = str($key)->studly()->start('get')->finish('Attribute');
        return $this->__call($property) ?:
                $this->__call($key) ?:
                $this->fillable[$key] ??
                $this->get($key);
    }
    
    /**
     * Calls Closures defined as callables
     * 
     * @param string $key
     * @param array $args
     * 
     * @return mixed|null
     */
    public function __call($key, $args=[]){
        if(array_key_exists(trim($key), $this->callable)){
            return $this->callable[$key](...$args);
        }
    }
    
    /**
     * Checks if a variable or method is set
     * 
     * @param string $key
     * @return bool
     */
    public function __isset($key){
        return array_key_exists($key, $this->fillable) || array_key_exists($key, $this->callable);
    }
    
    /**
     * Returns string representation of Object
     * 
     * @return Illuminate\Support\Stringable
     */
    public function __toString(){
        
        return str(__CLASS__)
                ->afterLast('\\')
                ->start('BB.')
                ->finish('()')
                ->upper();
    }

    /**
     * Gets all fillable properties
     * 
     * @return array
     */
    public function all(){
        return $this->fillable;
    }
    
    /**
     * Gets a fillable
     * 
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    public function get($key, $default=null){
        return $this->fillable[$key] ?? $default;
    }
    
    /**
     * Defines source dependent Callable Closure
     * 
     * @param srring $key
     * @param string $ref
     * @param string|null $path
     * 
     * @return Closure
     */
    public function define($key, $ref, $path = null){
        $base = bb('objects.Mac');
        $branch = $base->branched;
        $path = $path ?: $base->baseFile ?: '/';
        
        return $this->callable[$key] = is_callable($ref)? $ref: (function(...$args) use ($base, $ref, $path, $branch){
            $name = $ref.str()->random(5);
            $args = json_encode($args);
            $branch = $branch == true && $base->branched == false;
            
            if($branch == true){
                $base->checkout();
            }
            
            $result = bb_env()->createTemplate(sprintf('{%% from "%s" import %s %%}{%% return %s(self, %s) %%}', $path, $ref, $ref, gtrim($args, '\[\]')), $name)->render(['self' => $this]);
            
            if($branch == true){
                $base->burst();
            }
            
            return $result;
        });
    }
}