<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'gender', 'birthday', 'phone', 'email_token', 'verifed'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function applies(){
      return $this->hasMany('\App\Apply')->get();
    }

    public function messages(){
      return $this->hasMany('\App\Message')->orderBy('created_at', 'DESC')->get();
    }
    public function sentMessages(){
      return $this->hasMany('\App\Message')->orderBy('created_at', 'DESC')->where('sender', '=', 'user')->get();
    }
    public function receivedMessages(){
      return $this->hasMany('\App\Message')->orderBy('created_at', 'DESC')->where('sender', '=', 'company')->get();
    }
    public function unreadMessages(){
      return $this->hasMany('\App\Message')->where('sender', '=', 'company')->where('seen', '=', 0)->get();

    }
}
