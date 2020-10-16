<?php

namespace App\Exceptions;

use Exception;

class BoardNotFound extends Exception
{
    public function report(){
        //do nothing
    }
    
    public function render(){
        abort(404, __('Board not Found!'));
    }
}
