<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardDomain extends Model
{
    
    protected $fillable = ['board_id', 'domain', 'default'];
    
    public function board(){
        return $this->belongsTo(Board::class);
    }
    
    public function scopeDomain($query, $domain){
        return $query->where('domain', 'LIKE', $domain)->first() ?: false;
    }

    public function url(string $path='/'){
        return trim(str($path)->start('/')->start('http://'.$this->domain));
    }
}
