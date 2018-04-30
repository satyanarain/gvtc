<?php

/* 
 * Author:ravi
 * devloping Year:2018
 * and open the template in the editor.
 */
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;


class Report extends Authenticatable
{
    use Notifiable;
    protected $table = 'report';

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

