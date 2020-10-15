<?php

namespace App\Support\Database;

use Arr;
use App\Support\Traits\MagickTrait;

class DB {
    use MagickTrait;
    /**
     * The Database Connection Instance
     * 
     * @var App\Support\Database\Connection
     */
    protected $connection;
    
    /**
     * Database API Access Token
     * 
     * @var string
     */
    protected $key;
    
    /**
     * Creates and connects to Database instance
     * 
     * @param string|null $key
     * @return void
     */
    public function __construct($key = null){
        
        $this->connect($key);
        
    }
    
    /**
     * Creates a Database Collection using an optional API Access Token
     * 
     * @param string|null $key
     * @return App\Support\Database\Connection
     */
    public function connect(string $key = null){
        
        $this->key = $key ?: bb_info()->api_key;
        
        return $this->connection = new Connection($this->key);
    }
    
    /**
     * Creates a new Table
     * 
     * @param string $name
     * @param array $schema
     * 
     * @throws
     * @return App\Support\Database\Model
     */
    public function create(string $name, array $schema){
        
        $name = str($name)->slug();
        $schema = new Schema($schema);
        
        if( false  === $this->select($name)){
            return Table::create($this->key, $name, $schema);
        }
        
        //throw some error
    }

    /**
     * Checks for/Selects a Table from Database
     * 
     * @param string $name
     * @param array|object|null $records
     * @param array $rules
     * 
     * @return App\Support\Database\Model
     */
    public function select($name, $records=null, $rules=[]){
        $name = str($name)->slug();
        //reconstruct the collection
        $this->connect($this->key);
        
        $query = $this->db()->where('table', $name)->first();
    
        $table = new Table($name, $query);
        
        return $table->build($records, $rules);
    }
    
    /**
     * Gets list of created tables
     * 
     * @return array
     */
    public function tables(){
        return $this->db()->pluck('table')->values()->toArray();
    }
    
    /**
     * Drops/Deletes a table
     * 
     * @param string $table
     * 
     * @return bool
     */
    public function drop($table){
        return collect(Arr::wrap($table))->reject(function($table){
            return $this->db()->where('table', $table)->each(function($table){
                $table->delete();
            }) && $this->connect($this->key);
        })->count() === 0;
    }
    
    public function clear(){
        return $this->drop($this->tables());
    }
    
    /**
     * Gets the Database Collection
     * 
     * @return Illuminate\Support\Collection
     */
    protected function db(){
        return $this->connection()->getData();
    }
    
    /**
     * Gets the Database Connection
     * 
     * @throws
     * @return App\Support\Database\Connections\TokenConnection
     */
    protected function connection(){

        if(! $this->connection instanceof Connection){
            //throw some error
        }
        
        return $this->connection->getConnection();
    }
}