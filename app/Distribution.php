<?php

/* 
 * Author:ravi
 * devloping Year:2018
 * and open the template in the editor.
 */
namespace App;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class Distribution extends Model
{
    use Notifiable;
    //protected $table = 'endenisms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
        'endenism','status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}

