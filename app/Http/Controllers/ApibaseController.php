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
//    echo '<pre>';
//    print_r($final_data);
    //$arra= addslashes(json_encode($final_data));
  }else{
        
      $arra=json_encode(array('message'=>'failed','listdat'=>''));  
        
    }
    
     echo $arra;
   
   }
    
//http://127.0.0.1:8000/api/apilist/index?token_id=12390123348456&tb=taxons
 //http://ec2-13-127-44-64.ap-south-1.compute.amazonaws.com/api/apilist/index?token_id=12390123348456&tb=taxons

  public function create(Request $request){
      
      
      
      
  }
  public function record(){
      
  //http://ec2-13-127-44-64.ap-south-1.compute.amazonaws.com/api/apilist/record?tokenrecord=gvtcrecords&tb=species  
    $tokenrecord='gvtcrecords';
    if($tokenrecord==$_REQUEST['tokenrecord']){
        $tbl_name=$_REQUEST['tb'];
    $arradata =DB::table($tbl_name)->select('*')->get();
    $record = count($arradata);
     $final_recod=array('mesage'=>'sucess','totalrecord'=>$record);
     $arra= json_encode($final_recod);
     
    } else{
        
        $arra=json_encode(array('message'=>'failed','totalrecord'=>''));  
        
    }
    print_r($arra);
      
  }
  
  public function showRecord(){
      //http://127.0.0.1:8000/api/apilist/showrecord?tokenrecod=gvtcshoerecod&from=1&to=2&tb=observers
      $tokenrecod='gvtcshoerecod';
      if($tokenrecod==$_REQUEST['tokenrecod']){
          
        $tbl_name=$_REQUEST['tb'];
        $from= $_REQUEST['from'];
        $to= $_REQUEST['to'];
        $datarecod=DB::table($tbl_name)->select('*')->offset($from)->limit($to)->get();
         $final_recod=array('mesage'=>'sucess','totalrecord'=>$datarecod);
         $arra= json_encode($final_recod);
  //print_r($final_recod);
          
      }else{
          
          $arra=json_encode(array('message'=>'failed','totalrecord'=>'')); 
          
      }
      print_r($arra);
      
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