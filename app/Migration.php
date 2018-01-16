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


class Migration extends Model
{
    use Notifiable;
    protected $table = 'migration_tbl';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
        'migration_title','birds_migrating_population',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}

