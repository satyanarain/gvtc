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

class Gazetteer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
       // 'taxon_id','order','family','genus','species','species_author','subspecies','subspecies_author','species_author','common_name','iucn_threat_id','range_id',
       // 'growth_id','forestuse_id','wateruse_id','endenisms_id','migration_tbl_id'
       
 'gazeteer_id','country_id','datum_dd','place','details','eastings','northings','zone','datum','longitude','latitude','day','month','year','habitat','altitude','slope','aspect' ,'soil' ,'protected_area_id','adminunit_id','remarks'     
       
    ];
  

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}
