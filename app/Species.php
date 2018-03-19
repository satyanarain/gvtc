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

class Species extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
        'taxon_id','order','family','genus','species','species_author','subspecies','subspecies_author','species_author','common_name','common_name_fr','iucn_threat_id','range_id',
        'growth_id','forestuse_id','wateruse_id','endenisms_id','migration_tbl_id','specienewid','national_threat_code_id','breeding_id','created_by'
    ];
//   public function taxon(){
//       
//       
//       return $this->belongsTo('App\Taxon');
//       
//   }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}
