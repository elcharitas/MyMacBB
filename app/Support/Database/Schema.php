<?php
namespace App\Support\Database;

use Arr;
use Illuminate\Support\Collection;

class Schema extends Collection {
    
    /**
     * This filters and Validates Declarations
     * 
     * @return App\Support\Database\Schema
     */
    public function burp(){
        return $this->map(function($scheme){
            return Arr::wrap($scheme);
        });
    }
}