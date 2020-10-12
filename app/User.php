<?php

namespace App;

use Mail;
use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Mail\SendMail;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function boards(){
        $this->hasMany(Board::class);
    }
    
    public function subscription(){
        return $this->hasOne(Subscription::class);
    }
    
    public function mail($subject=null, $message=null, ?Closure $callback=null){
        $mail = new SendMail($subject, $message);
        
        if(!is_null($callback)){
            $mail = value(function () use ($mail, $callback){
                return $callback($mail);
            });
        }
        
        return Mail::to($this)->send($mail);
    }
}
