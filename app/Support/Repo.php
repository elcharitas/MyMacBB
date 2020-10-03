<?php

namespace App\Support;

use Illuminate\Filesystem\Filesystem;

class Repo {
    
    protected $storage;
    
    protected $disk;
    
    protected $path;
        
    protected $basePath;
    
    
    public function __construct(string $path='/')
    {
        $this->open($path);
    }

    public function getCacheKey(string $name): string
    {
        return $name;
    }

    public function isFresh(string $name, int $time=0): bool
    {
        if (false === $lastModified = $this->getValue('last_modified', $name)) {
            return false;
        }
        
        $time = ($time == 0 ? time() - 180 : $time);

        return $lastModified <= $time;
    }
    
    public function open(string $path='/'){
        
        $disk = bb_id().str()->random(5);

        config([
            "filesystems.disks.$disk" => [
                'driver' => 'local',
                'root' => bb_storage($path),
            ]
        ]);
        
        $this->storage = \Storage::disk($disk);
        
        $this->disk = $disk;
        
        $this->path = $path;
        
        $this->basePath = $path;
        
        return ($this->disk == $disk);
    }
    
    public function put($name, $contents, $visible=false){
        if($this->size('/') > -1){
            return $this->storage->put($name, $contents, $visible);
        }
    }
    
    public function path($path){
        return trim(str($path)->start('/')->start($this->path));
    }
    
    public function size($path=''){
        if(!$this->exists($path) || is_dir($this->storage->path($path))){
            $size = 0;
            foreach($this->storage->allFiles($path) as $file){
                if(is_string($file)){
                    $size += $this->storage->size($file);
                }
            }
            return $size;
        } else {
            return $this->storage->size($path);
        }
    }
    
    public function directories($path='/'){
        return $this->storage->allDirectories($path);
    }

    public function exists($name){
        return $this->storage->exists($name);
    }
    
    public function files($path='/'){
        return $this->storage->allFiles($path);
    }
    
    public function __get($name){
        //nothing
    }
    
    public function __call($name, $value, ...$opts){
        $opts = array_merge($value, $opts);
        return $this->getValue($name, ...$opts);
    }

    protected function getValue($column, ...$opts)
    {
        $column = trim(str($column)->camel());
        
        if(method_exists($this->storage, $column)){
            return $this->storage->{$column}(...$opts);
        }
        
        return null;
    }

    public static function create(...$args){
        return new static(...$args);
    }

    public function __toString(){
        return 'BB.Repo{}';
    }
}