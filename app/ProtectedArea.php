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


class ProtectedArea extends Model
{
    use Notifiable;
   // protected $table = 'protected_areas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
        'protected_area_name','country','protected_area_code','created_by','protected_area_name_fr'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}

