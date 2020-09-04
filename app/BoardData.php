<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardData extends Model
{
    public function getDataAttribute($data){
        return json_decode($data ?: '[]');
    }

    public function getSchemaAttribute($data){
        return json_decode($data);
    }
    
    public function board(){
        return $this->belongsTo(Board::class);
    }
}
