<?php

namespace App\Support;

use Twig\Source;
use Twig\Error\LoaderError;
use Twig\Loader\LoaderInterface as Twig;

class TwigLoader extends Repo implements Twig {
    
    protected $basePath = '/';

    public function getPath(){
        return $this->path;
    }

    public function getSourceContext(string $name): Source
    {
        if (!$this->exists($name) || (false === $source = $this->fetchSource($name))) {
            throw new LoaderError(sprintf('The template "%s" does not exist at "%s".', $name, $this->basePath));
        }

        return new Source($this->includeSources($source, bb_config('includes', [])), $name);
    }
    
    public function load(string $repo=null, string $version=null){
        if($repo){
            $disk = trim(str($repo)->afterLast('/').str()->random(5));
            if($version){
                $repo .= "/stable/$version";
            }
            
            $path = storage_path("apps/repo/engines/$repo");
            
            config([
                "filesystems.disks.$disk" => [
                    'driver' => 'local',
                    'root' => $path,
                ]
            ]);
            $this->storage = \Storage::disk($disk);
            $this->disk = $disk;
            $this->path = $repo;
            $this->basePath = $repo;
            
            return $this->disk == $disk;
        }
        return null;
    }
    
    protected function includeSources($source, $tree){
        $this->basePath = str($tree['base_path'] ?? '/')->start('/')->start($this->basePath);

        $sources = '';
        foreach(($tree['include']??[]) as $include){
            list($mod, $base) = $this->sourceConfig($include);
            foreach($mod as $path){
                $bpath = "$base/$path";
                $sources .= ($this->exists($bpath)?"{% set _file_ = '$bpath' %}\n{% do Mac.put('base', str('$bpath').beforeLast('/')) %}\n{% do Mac.put('baseFile','$bpath') %}\n".$this->get("$base/$path")."\n":($this->exists($path)?"{% set _file_ = '$path' %}\n{% do Mac.put('base', '".trim(str($path)->beforeLast('/'))."') %}\n".$this->get($path)."\n":''));
            }
        }
        return $sources.$source;
    }
    
    protected function sourceConfig($name){
        $base = str($name)->start('/')->start($this->basePath);
        return [bb_config('includes.include', ["$name.twig"], $base), $base];
    }
    
    protected function fetchSource($path){
        $dot = str($path)->replace('.', '/');
        $dotPath = trim($dot);
        $dot = trim($dot->replaceLast('/', '.'));
        $source = ($this->exists($path) ? $this->get($path) : ( $this->exists($dot) ? $this->get($dot) : ($this->exists($dotPath) ? $this->get($dotPath): false)));
        
        return $source ? "{% set _file_ = '$path' %}\n".$source: null;
    }
}