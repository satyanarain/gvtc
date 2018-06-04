<?php

/* 
 * Author:ravi
 * devloping Year:2018
 * and open the template in the editor.
 */
namespace App;
use Illuminate\Database\Eloquent\Model;


class Distribution extends Model
{
    protected $table = 'distributions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = ['taxon_id', 'selectioncriteria', 'specie_id', 'specie_data', 'method_id', 'observation_id', 'gazetteer_id',
       'day', 'month', 'year', 'number', 'observer_id', 'age_id', 'abundance_id', 'specimendata', 'specimencode', 'collectorinstitution', 'Sex', 'remark', 'status','habitat','created_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}

