<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'plan_id',
        'user_id',
        'expire_at'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
