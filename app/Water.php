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


class Water extends Model
{
    use Notifiable;
    protected $table = 'wateruse';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
        'water_use','water_habitat_usage',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}

