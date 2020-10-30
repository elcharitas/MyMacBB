<?php

namespace App\Support\Database\Connections;

use App\Board;
use App\Support\Traits\MagickTrait;
use Illuminate\Support\Collection;

class TokenConnection {
    use MagickTrait;
    
    /**
     * Database Board ID
     * 
     * @var int
     */
    protected $bid;
    
    /**
     * Database Collection
     * 
     * @var Illuminate\Support\Collection
     */
    protected $database;
    
    /**
     * Creates a Collection of Database Tables
     * 
     * @param string $key
     * @return void
     */
    public function __construct($key)
    {
        if(false === $board = Board::Token($key)){
            //throw some error
        }
        
        $this->database = $board->data;
        $this->bid = $board->id;
    }
    
    /**
     * Gets the Database Collection
     * 
     * @return Illuminate\Support\Collection
     */
    public function getData(){
        return $this->database;
    }
    
    /**
     * Gets the Board Id
     * 
     * @return int
     */
    public function id(){
        return $this->bid;
    }
}