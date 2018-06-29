<?php
namespace App\Traits;
use DB;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
trait csvuploadtrait {
function csvupload($tblname='',$fldname='', $data, $val){
    
     $sql = DB::table($tblname)->select('*')->where($fldname,$data)->get();
     
               foreach($sql as $val){
                   
              DB::table($tbl)->insert(array('name' => $val));
          }
    
}}