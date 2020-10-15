<?php
namespace App\Support\Database;

use App\Board;
use App\BoardData;

class Table {
    /**
     * Name of Database
     * @var string
     */
    protected $name;
    
    /**
     * Database Query Object
     * @var App\BoardData
     */
    protected $query;
    
    /**
     * Create new instance of Table
     * 
     * @param string $name
     * @param App\BoardData|null $query
     * @return void
     */
    public function __construct($name, $query=null){
        
        if($query instanceof BoardData) {
            $query->relationship = [];
        } else {
            //throw error
        }
        
        $this->name = $name;
        $this->query = $query;
    }

    /**
     * Builds a Table's Model
     * 
     * @param array|object|null $records
     * @param array|object|null $rules
     * @return App\Support\Database\Model
     */
    public function build($records = null, $rules = []){
        
        if(is_null($this->query)){
            return false;
        }
        
        collect($rules)->each(function ($item, $key){
            $this->query->relationship = array_merge($this->query->relationship, array($key => $item));
        });
        
        return new Model($this->name, $this->query, $records);
    }
    
    /**
     * Creates the table first before building it
     * 
     * @param string $key
     * @param string $name
     * @param array|object $schema
     * @return App\Support\Database\Model
     */
    public static function create($key, $name, $schema){
        $table = new static($name, BoardData::create([
                    'table' => $name,
                    'schema' => $schema->burp()->toJson(),
                    'board_id' => Board::Token($key)->id,
                ]));
        return $table->build();
    }
}