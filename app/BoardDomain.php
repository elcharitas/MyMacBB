<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardDomain extends Model
{
    
    protected $fillable = ['board_id', 'domain', 'default'];
    
    public function board(){
        return $this->belongsTo(Board::class);
    }
    
    public static function domain($domain){
        $domain = str_replace('*', '%', $domain);
        return static::where('domain', 'LIKE', $domain)->get();
    }

    public function url(string $path='/'){
        return trim(str($path)->start('/')->start('http://'.$this->domain));
    }
    
    public function user(){
        return $this->board->user;
    }
}
