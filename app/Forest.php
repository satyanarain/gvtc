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


class Forest extends Model
{
    use Notifiable;
    protected $table = 'forestuse';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
        'forest_use','forest_habitat_usage',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}

