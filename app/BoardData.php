<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardData extends Model
{
    /**
     * Attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = ['table', 'schema', 'board_id'];
    
    /**
     * Getter for Data stored in a table
     * 
     * @return array|object
     */
    public function getDataAttribute($data){
        return json_decode($data ?: '[]');
    }
    
    /**
     * Getter for Table's Schema
     * 
     * @return array|object
     */
    public function getSchemaAttribute($data){
        return json_decode($data);
    }
    
    /**
     * Eloquent Relationship to fish out Board
     */
    public function board(){
        return $this->belongsTo(Board::class);
    }
}
