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


class Iucn extends Model
{
    use Notifiable;
    protected $table = 'iucn_threats';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
        'iucn_threat_code','iucn_code_description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}

