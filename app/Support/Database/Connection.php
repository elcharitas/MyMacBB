<?php

namespace App\Support\Database;

use Str;
use App\Support\Traits\MagickTrait;
use App\Support\Database\Connections\TokenConnection;

class Connection {
    use MagickTrait;
    
    /**
     * The Comnection Instance
     * 
     * @var App\Support\Database\Connections\TokenConnection|null
     */
    protected $connection;
    
    /**
     * Connects to Database using Connection Types
     * 
     * @param string $key
     * @return App\Support\Database\Connections\TokenConnection
     */
    public function __construct(string $key){
        
        if(! Str::isUuid($key)){
            //throw some error
        }
        
        $this->connection = new TokenConnection($key);
    }
    
    public function getConnection(){
        return $this->connection;
    }
}