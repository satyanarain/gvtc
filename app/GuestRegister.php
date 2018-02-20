<?php

namespace App;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class GuestRegister extends Model

{
    use Notifiable;
     protected $table = 'users';
      //protected $table = 'guestregisters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //protected $hidden = [
     //   'password', 'remember_token',
   // ];
}
