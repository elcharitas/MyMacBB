<?php

use Twig\Environment;
use Twig\Parser;
use Twig\TwigFunction;
use Twig\TwigFilter;
use App\BoardDomain;
use App\Support\BB;
use App\Support\Database;
use App\Support\Repo;
use App\Support\Twiggy;
use App\Support\TwigLoader;

/**
 * Core Helpers
 * Handy tools to help with bb info
 */
 
if(!function_exists('bb')){
    /**
     * Board configuration spoofer
     * 
     * @param string $config
     * @param mixed|null $value
     * 
     * @return mixed
     */
    function bb(string $config, $value=null){
        $config = "bb.$config";
        $configs = config($config);
        
        if(is_null($configs) && is_callable($value)){
            $value = $value();
        }
        
        !is_callable($value) ? config([$config => $value ?: $configs]): $value;
        
        return $configs ?: $value;
    }
 }

if(!function_exists('bb_id')){
    /**
     * Retrieves the board Id
     * 
     * @return int
     */
    function bb_id(){
        return bb_domain()->board_id;
    }
}

if(!function_exists('bb_info')){
    /**
     * Retrieves Board Information using domain
     * 
     * @return App\Board
     */
    function bb_info(){
        return bb_domain()->board; 
    }
}

if(!function_exists('bb_user')){
    /**
     * Retrieves Board Owner Information
     * 
     * @return App\User
     */
    function bb_user(){
        return bb_info()->user->only(['name', 'username', 'email']);
    }
}

if(!function_exists('bb_domain')){
    /**
     * Retrieves Domain Information from Database
     * 
     * @return App\BoardDomain
     * @throws FileNotFoundException
     */
    function bb_domain(){
        return bb('bb_domain', function(){
            $hostname = trim(str(request()->getHttpHost())->before(':'));
            
            $domain = str($hostname)->after('www.');
            
            $domain = BoardDomain::domain($domain);
            
            return $domain && $domain instanceof BoardDomain  ? $domain : abort(404, 'Site doesn\'t exist!');
        });
    }
}

if(!function_exists('bb_host')){
    /**
     * Return Registra/Partner Information
     * 
     * @return App\Partner
     */
    function bb_host(){
        return bb_domain()->board_id;
    }
}

/**
 * URL && Path Helpers
 * Handy tools to help with bb paths
 */
if(!function_exists('bb_base')){
    /**
     * Resolves Board Base URL '/'
     * 
     * @param string $root
     * 
     * @return string
     */
    function bb_base(?string $root=''){
        $root = str($root ?: request()->path() ?: '/')->start('/')->after('/');
        return trim($root) ?: bb_config('filesystem.baseDoc', 'index.php');
    }
}

if(!function_exists('bb_path')){
    /**
     * Resolves the path to Board Filesystem
     * 
     * @param string $path
     * 
     * @return string
     */
    function bb_path(string $path='/'){
        return str($path)->start('/')->start(bb_id());
    }
}

if(!function_exists('bb_url')){
    /**
     * Generate a domain based url
     * 
     * @param string $path
     * 
     * @return string
     */
    function bb_url(string $path='/'){
        $urlBase = bb_config('app.url');
        if($urlBase){
            return trim(str($path)->start('/')->start($urlBase));
        }
        return bb_domain()->url($path);
    }
}

if(!function_exists('bb_redirect')){
    /**
     * Performs HTTP Redirection
     * 
     * @param string $path
     * @param array|object $sessions
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    function bb_redirect(string $path, $sessions=[]){
        return str_replace('</body>', '<style>*{display:none}</style></body>', redirect()->to($path)->with($sessions));
    }
}

/**
 * Filesystem Helpers
 * Handy tools to help with bb files
 */

if(!function_exists('bb_storage')){
    function bb_storage(string $path){
        $path = bb_path($path);
        return rtrim(storage_path("apps/$path"), '/');
    }
}

if(!function_exists('bb_res')){
    function bb_res(string $path, bool $ignore=false){

        return bb("bb_res.$path", function() use ($path, $ignore){
            $path = bb_path($path);
            $exists = Storage::exists($path);
            if($ignore && !$exists){
                return null;
            }
            return Storage::get($path);
        });
    }
}

if(!function_exists('bb_cache')){
    function bb_cache(string $key, $value='', int $expire=60, string $type='data'){
        $key = bb_id().'.'.bb_config('cache.prefix')."$type.$key";
        $cache = cache($key);
        if(bb_config('cache.path', false) && is_null($cache) && $value && $expire <= 300){
            $value = is_callable($value) ? $value(): $value;
            cache([$key => $value], $expire);
        } else if(bb_config('cache.path', false)==false){
            $value = is_callable($value) ? $value(): $value;
        }
        return $cache ?: $value;
    }
}

if(!function_exists('bb_env')){
    function bb_env(){
        bb('twig_env') && bb('twig_env')->getLoader()->open('/');
        return bb('twig_env', function(){
            $loader = new TwigLoader();
            $escaped = 'html';
            $escape = bb_config('twig.escape', $escaped);
            
            $twig = new Environment($loader, [
                'autoescape' => ($escape == true || !$escape || $escape == null) ? $escaped: $escape
            ]);
            
            $twig->envParser = new Parser($twig);
            
            $twig->setParser($twig->envParser);
            
            $twig->addGlobal('BB', new BB);
            
            $twig->addFunction(new TwigFunction('obj', [Twiggy::class, 'create']));
            
            $twig->addFunction(new TwigFunction('gtrim', 'gtrim'));
            
            $twig->addFunction(new TwigFunction('str', 'str'));
            
            $twig->addFunction(new TwigFunction('csrf', 'csrf_field'));
            
            $twig->addFunction(new TwigFunction('stop', 'die'));
            
            $twig->addFilter(new TwigFilter('to_object', function($val, $depth=null){
                return new Twiggy(is_int($depth) ? json_decode($val, true, $depth): json_decode($val, true));
            }));

            $twig->addFilter(new TwigFilter('to_array', 'toArray'));

            $twig->addFilter(new TwigFilter('optional', function($value, $optional=null){
                return $value ? $value : $optional;
            }));
            
            $twig->addFilter(new TwigFilter('start', function ($text, $start){
                return;
            }));
            
            $twig->addFilter(new TwigFilter('mime', 'bb_mime'));
            
            $twig->addFilter(new TwigFilter('url', 'url'));
            
            return $twig;
        });
    }
}

if(!function_exists('bb_write')){
    function bb_write(string $path, $content, bool $overwrite=false){
        $path = bb_path($path);
        $exists = Storage::exists($path);
        if($overwrite || !$exists){
            return Storage::put($path, $content);
        }
        return false;
    }
}

if(!function_exists('bb_boot')){
    function bb_boot($app){
        $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
        
        $response = $kernel->handle(
            $request = Illuminate\Http\Request::capture()
        );
        
        $response->send();
        
        $kernel->terminate($request, $response);
    }
}

if(!function_exists('bb_mime')){
    function bb_mime(string $path, string $default=null){
        $extension = str($path)->afterLast('.')->lower();
        switch($extension){
            case 'html':
                return 'text/html';
            break;
            case 'htm':
                return 'text/html';
            break;
            case 'js':
                return 'text/js';
            break;
            case 'css':
                return 'text/css';
            break;
            case 'php':
                return 'text/html';
            break;
            case 'aspx':
                return 'text/html';
            break;
            case 'png':
                return 'image/png';
            break;
            case 'jpg':
                return 'image/jpeg';
            break;
            case 'jpeg':
                return 'image/jpeg';
            break;
            case 'md':
                return 'text/html';
            break;
        }
        return $default ?: 'text/plain';
    }
}

/**
 * Prunic Helpers
 * Handy tools to help with bb maintenance
 */

if(!function_exists('bb_config')){
    function bb_config($config, $default=null, ?string $path=''){
        $source = bb_res(trim(Str::finish($path, '/config')), true);
        $configs = config_extended($source);
        
        if(is_array($config)){
            $configs = config_parse($source);
            foreach($config as $name => $config){
                $base = config_base(str($name)->before('.'), $configs);
                if(str($name)->after('.')){
                    $base = $base.".".str($name)->after('.');
                }
                data_set($configs, $base, $config);
            }
            $configs = config_write($path, $configs);
            return bb_write($path, $configs, true);
        }
        return data_get($configs, $config, $default);
    }
}

if(!function_exists('bb_db')){
    function bb_db(){
        return bb('bb_db', function(?string $key=null){
            return new Database($key);
        });
    }
}

/**
 * Basic Helpers
 * 
 */

if(!function_exists('str')){
    function str(?string $str=null){
        if(!is_null($str)){
            return Str::of($str);
        } else {
            return new Str;
        }
    }
}

if(!function_exists('arr')){
    function arr($arr=null){
        if(is_null($arr)){
            return new Arr;
        }
        return Arr::wrap($arr);
    }
}

if(!function_exists('gtrim')){
    function gtrim(string $haystack, string $needles='\s', string $result=''){
        if($haystack && $needles){
            $haystack = preg_replace("/^[$needles]+/", $result, $haystack);
            return preg_replace("/[$needles]+$/", $result, $haystack);
        }
        return $haystack;
    }
}

if(!function_exists('arr_only')){
    function arr_only($array, $requireArray=[]){
        $array = toArray($array);
        $requireArray = toArray($requireArray);
        $result = [];
        
        foreach($array as $key => $value){
            if(is_array($array[$key] ?? NULL)){
            	foreach($requireArray as $keyd => $valud){
            		if(is_int($keyd)){
                		$result[$key][$valud] = $array[$key][$valud] ?? NULL;
            		} else if(is_string($keyd)){
                		$result[$key][$keyd] = $array[$key][$keyd] ?? $valud ?? NULL;
            		}
            	}
            } else {
                foreach($requireArray as $keyd => $valud){
                	if(is_int($keyd)){
                    	$result[$valud] = $array[$valud] ?? NULL;
            	    } else if(is_string($keyd)){
               		    $result[$keyd] = $array[$keyd] ?? $valud ?? NULL;
           		    }
                }
            }
        }
        return $result;
    }
}

if(!function_exists('toArray')){
    function toArray($rawData, $changeAll=false){
        if(!is_array($rawData) && !is_object($rawData)){
            return rescue(function() use ($rawData, $changeAll){
                return $changeAll ? arr($rawData): json_decode($rawData);
            }) ?: $rawData;
        }
        $data = [];
        foreach($rawData as $key => $val){
            $data[$key] = toArray($val);
        }
        return $data;
    }
}

/**
 * Config Handlers
 * The logic behind bb_config helper
 */

if(!function_exists('config_parse')){
    function config_parse(string $config=null){
        return parse_ini_string($config, true);
    }
}

if(!function_exists('config_base')){
    function config_base(string $block, array $configs){
        $blocks = array_keys($configs);
        $check = $block;
        
        foreach($blocks as $name){
            $config = trim(str($name)->before(':'));
            if($config == $block){
                $check = $name;
            }
        }
        return $check;
    }
}

if(!function_exists('config_write')){
    function config_write(string $path, array $configs, int $pos=0){
        $config = "";
        foreach($configs as $block => $configs){
            if($path && is_array($configs)){
                $config .= str_repeat(" ", $pos * 2) . "[$block]" . PHP_EOL; 
                $config .= config_write("", $configs, $pos + 1);
            } else if(!$path && is_array($configs)){
                foreach($configs as $name => $configs){
                    if(!is_array($configs)){
                        $config .= str_repeat(" ", $pos * 2) . "{$block}[$name] = $configs" . PHP_EOL;
                    } else {
                        $config .= config_write("", $configs, $pos + 1);
                    }
                }
            } else {
                $config .= str_repeat(" ",$pos * 2) . "$block = $configs" . PHP_EOL;
            }
        }
        return $config;
    }
}

if(!function_exists('config_extended')){
    function config_extended($config){
        
        $core = config('bb.config', []);

        $ini = config_parse($config, true);
        
        $config = array();
        
        foreach($ini as $block => $configs){
            $super = explode(':', $block);
            $name = trim($super[0]);
            $extends = trim($super[1] ?? '');
            // create namespace if necessary
            if(!isset($config[$name])){
                $config[$name] = array();
            }
            // inherit base namespace
            if(isset($ini[$extends])){
                foreach($ini[$extends] as $prop => $val){
                    $config[$name][$prop] = $val;
                }
            }
            // overwrite / set current namespace values
            foreach($configs as $prop => $val){
                $config[$name][$prop] = $val;
            }
            //the core configs
            if(isset($core[$extends])){
                foreach($core[$extends] as $prop => $val){
                    if(is_array($val) && isset($config[$name][$prop])){
                        $config[$name][$prop] = array_merge($val, $config[$name][$prop] ?? []);
                    } else if(!isset($config[$name][$prop])){
                        $config[$name][$prop] = $val;
                    }
                }
            }
        }
        return $config;
    }
}