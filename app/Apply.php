<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $fillable = ['user_id', 'job_id'];
    public function userFirstAndLastName(){
      $user = $this->belongsTo('\App\User');
      return $user->first_name . ' ' . $user->last_name;
    }
}
