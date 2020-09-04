<?php

namespace App\Support;

use App\{Board, BoardData};

class Database {
    
    protected $db;
    
    protected $dbh;
    
    protected $id;
    
    protected $key;
    
    public function __construct($key=null){
        $this->connect($key);
    }
    
    public function connect(string $key=null){
        
        if($key){
            $db = Board::where('api_key', $key)->first();
        } else {
            $db = bb_info();
            $key = $db->api_key;
        }
        
        $this->db = $db ? $db->data : collect([]);
        $this->id = $db->id;
        return ($this->key !== $key ? $this->key = $key: true) && $this->dbh = new BoardData;
    }
    
    public function create(string $table, array $schema){
        $table = trim(str($table)->slug());
        $schema = collect($schema)->map(function($scheme, $col){
            if(!is_array($scheme)){
                return ['nullable'];
            } else {
                return collect($scheme)->reject(function($rule){
                    return !is_string($rule) || str($rule)->contains('unique') || str($rule)->contains('exists');
                })->toArray();
            }
        })->toJson();
        return !$this->table($table) ? $this->dbh->insert([
            'table' => $table,
            'schema' => $schema,
            'board_id' => $this->id,
        ]) && $this->connect($this->key): false;
    }
    
    public function select($table, $records=null){
        return $this->table(trim(str($table)->slug()), $records);
    }
    
    public function drop($table){
        if($this->table($table)){
            return $this->db->where('table', $table)->each(function($table){
                $table->delete();
            }) && $this->connect($this->key);
        }
        return false;
    }
    
    public function dropMany(array $tables){
        foreach($tables as $table){
            $res = ($res ?? true) && $this->drop($table);
        }
        return $res ?? false;
    }
    
    public function clear(){
        return $this->dropMany($this->tables());
    }
    
    public function tables(){
        return $this->db->pluck('table')->values()->toArray();
    }
    
    protected function table($table, $records=null, $ignore=true){
        //reconstruct the collection
        $this->connect($this->key);
        
        $query = $this->db->where('table', $table)->first();
        
        if(!$ignore && !$query){
            abort(419);
        }
        
        return $this->build($table, $query, $records);
    }
    
    protected function build($table, ?BoardData $query=null, $records=null){
        return $query ? new Model($table, $query, $records): false;
    }
}