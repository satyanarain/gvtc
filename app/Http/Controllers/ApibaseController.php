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
use Hash;
use Auth;
use App\User;

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
    $arra= json_encode($final_data);
    //$arra= addslashes(json_encode($final_data));
  }else{
        
      $arra=json_encode(array('message'=>'failed','listdat'=>''));  
        
    }
     echo ($arra);
   
   }
    
//http://127.0.0.1:8000/apilist/index?token_id=123456&tb=taxons
   //http://ec2-13-127-44-64.ap-south-1.compute.amazonaws.com/api/apilist

  public function create(Request $request){
      
      
      
      
  }
  
  
  public function store(Request $request)
    {
      
     
      $Activedata = Auth::attempt(['username' => $request['username'], 'password' => $request['password'],'status' => 1]);
      
      if($Activedata==1){
        $username = $request['username'];
        $recorddata =DB::table('users')->select('id')->where('username','=',$username)->get();
        //print_r($recorddata);
        //$user_id = $recorddata[0]->id;
        
        $final_record=array('message'=>'success','listdata'=>$recorddata);
         $arras= json_encode($final_record);
         
       print_r($arras);
    
          
      }else{
          $username = $request['username'];
          $recorddata =DB::table('users')->select('*')->where('username','=',$username)->get();
          $user_id = $recorddata[0]->id;
          $final_records=array('message'=>'fail');
          $arrasf= json_encode($final_records);
         // print_r($arrasf);
      }
       
      //print_r($request->all());
      
      

    

    }
    

}