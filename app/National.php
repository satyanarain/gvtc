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


class National extends Model
{
    use Notifiable;
    protected $table = 'national_threat_codes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
        'national_threat_code','national_threat_code_description','national_threat_code_description_fr','created_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}

