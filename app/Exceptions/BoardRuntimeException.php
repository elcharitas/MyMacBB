<?php

namespace App\Exceptions;

use Exception;
use Twig\Error\LoaderError;

class BoardRuntimeException extends Exception
{
    protected $bag;
    
    public function __construct(LoaderError $bag){
        $this->bag = $bag;
    }
    
    public function report(){
        //
    }
    
    public function render(){
        
        $doc = bb_config('filesystem.offloadDoc');
        return $doc ? response(gtrim(bb_env()->render($doc)), 404): abort(404, $msg);
    }
}
