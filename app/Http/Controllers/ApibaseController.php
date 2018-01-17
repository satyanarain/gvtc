<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;


class ApibaseController extends Controller

{

    public function index()
    {
    
    $token=12390123348456;
    $arra='';
   // print_r($_REQUEST);
    if($token==$_REQUEST['token_id']){
        
    $tbl_name=$_REQUEST['tb'];
    $arradata =DB::table($tbl_name)->select('*')->get();
    $final_data=array('message'=>'success','listdata'=>$arradata);
    //$result = $arradata->toArray();
    $arra= addslashes(json_encode($final_data));
  }else{
        
      $arra=json_encode(array('message'=>'failed','listdat'=>''));  
        
    }
     echo ($arra);
   
   }
    
//http://127.0.0.1:8000/apilist/index?token_id=123456&tb=taxons

  

}