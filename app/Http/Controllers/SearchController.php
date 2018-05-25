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
use Auth;
use Mail;




class SearchController extends Controller {
    
    
//    public function __construct() {
//        $this->middleware('auth');
//    }
    
    
    public function index()
    {
        return view('pages.search');
    }

    public function search(Request $request) {
           //return response()->json($request->all()); 
        
        //echo $downloadurl = \Request::fullUrl();
        //die;
        $query = preg_replace("/[^a-zA-Z0-9]/", "", $request->q);
        // Perform the query using Query Builder
        $results = DB::table('species')
            ->select(DB::raw("*"))
             ->leftjoin('taxons','species.taxon_id','taxons.id')
            ->where('common_name','LIKE', '%'.$query.'%')
            ->orWhere ('genus', 'LIKE', '%' . $query . '%' )  
            ->orWhere ('species', 'LIKE', '%' . $query . '%' )  
            ->orWhere ('taxons.taxon_code', 'LIKE', '%' . $query . '%' )  
            ->get();
        
        return view('pages.search', compact('results'));
    }
    
    public function create(Request $request){
   
      
        
    }
    
    
    public function store(Request $request)
    {
     $downaloaddtat= $request->downloaddata;
     $uesrid= $request->uesrid;
     $username= $request->username;
     
     #---------------Insert-Serach-Data-------------------------------#
      DB::table('searchresult')->insert(array('serchurl' => $downaloaddtat,
                    'uesrid' => $uesrid,
                    'username' =>$username,
                    'status'=>1
                   
                ));
      #--------------------Email Sent to admin User-----------------------------#
       $sqluserid=DB::table('users')->where('username' , $username)->get();
            foreach($sqluserid as $val){
            $val->id;
            $val->role;
            $val->email;
            $val->first_name;
            $val->last_name;
            $val->account;
            $val->institution_type;
            $val->institution;
            $val-> country;
            
            }
            $userid=$val->id;
            $userrole=$val->role;
            $useremail=$val->email;
            $userfirstname=$val->first_name;
            $userlastname=$val->last_name;
            $useraccount=$val->account;
            $userinsttype= $val->institution_type;
            $userinst= $val->institution;
            $usercountry= $val-> country;
      $query_email = array(
            'username'=> $username, 
            'searchdata' => $downaloaddtat,
             'email' => $useremail,   
             'first_name' => $userfirstname,   
             'last_name' => $userlastname,   
             'account' => $useraccount,   
             'institution_type'=>$userinsttype,   
             'institution' => $userinst,   
            'date'      => date("M d, Y h:i a")
            );
           
            //$query_user =  (object) $query_email;
            $query_user =  (object) $query_email; 
            Mail::send('emails.searchresult', ['search_details' => $query_user], function ($message) use ($query_user) {
              $message->from('info@opiant.online', 'GVTC');
              $message->to('gvtc2018@gmail.com',$query_user->username)->subject('GVTC | Search Request for Approval');
          });
             Mail::send('emails.searchresultuser', ['search_details_user' => $query_user], function ($message) use ($query_user) {
              $message->from('info@opiant.online', 'GVTC');
              //$message->to('gvtc2018@gmail.com',$query_user->username)->subject('GVTC Guset Search');
              $message->to($query_user->email,$query_user->username)->subject('GVTC | Search Request Submitted');
          });
      
      
      
      
    Session::flash('flash_message', "Your search request has been sent successfully."); //Snippet in Master.blade.php
    return redirect('/home');
      
    }
}