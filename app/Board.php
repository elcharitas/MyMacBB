<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function data(){
        return $this->hasMany(BoardData::class);
    }
    
    public function url(string $path='/'){
        $domain = $this->domains->where('active', true)->first();
        if($domain){
            return trim(str($path)->start('/')->start('http://'.$domain->domain));
        }
        return $path;
    }
    
    public function domains(){
        return $this->hasMany(BoardDomain::class);
    }
    
    public function getHostAttribute(){
        $domain = $this->domains->first();
        if($domain){
            return trim(str($domain->domain)->before('.'));
        }
        return null;
    }

    public function getDomainAttribute(){
        return $this->domains->first();
    }
    
    public function addDomain(string $domain, bool $default=false){
        
        if($default){
            $this->domains->each(function($domain){
                $domain->default = false;
                $domain->save();
            });
        }

        if(!str($domain)->contains('.')){
            \Storage::makeDirectory($this->id);
            $domain = sprintf(config('app.domain'), $domain);
            $first = $this->domains->first();
            if($first){
                $first->domain = $domain;
                $first->default = $default;
                return $first->save();
            }
        }
        
        return BoardDomain::create([
            'board_id' => $this->id,
            'domain' => $domain,
            'default' => $default,
        ]);
    }
    
    public function removeDomain(string $domain){
        
        if(!str($domain)->contains('.')){
            \Storage::deleteDirectory($this->id);
            $domain = sprintf(config('app.domain'), $domain);
        }
        
        return $this->domains->where('domain', $domain)->delete();
    }
    
    public function removeDomains(){
        return $this->domains->each(function($domain){
            $domain->delete();
        });
    }
    
    public function clearData(string $table=''){
        $data = $this->data;
        if($table){
            $data = $data->where('table', $table);
        }
        
        return $data->each(function($table){
            $table->delete();
        });
    }
    
    /**
     * Select a Board by API Access Token
     * 
     * @param string $key
     * @return App\Board
     */
    public static function Token($key){
        return static::where('api_key', $key)->first();
    }
}
