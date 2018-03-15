<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;

class Offline extends Authenticatable
{
    use Notifiable;
    protected $table = 'distributions_offline';


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
    
}
