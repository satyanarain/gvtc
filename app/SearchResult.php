<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class SearchResult extends Model
{
    use Notifiable;
    protected $table = 'searchresult';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
        'username','serchurl','adminaprovel','uesrid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}












