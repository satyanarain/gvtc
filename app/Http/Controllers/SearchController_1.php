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
    public function advancedsearch(Request $request){
       // DB::enableQueryLog();
        //print_r($request->all());
      $keysd=$request->searchkey;
      //print_r($keysd);
      //die;
       // $querys->$request->searchkey;
        // Perform the query using Query Builder
       $commonval= $request->commonnameval;
       $genusval= $request->genusval;
       $taxonval= $request->taxonval;
//       print_r($taxonval);
//       die;
//        $commonavall='"'.$commonval.'"';
//        print_r($commonaval);
//       die;
       $resultr=array();
       if($request->commonnameval!=''){
           
        foreach ($commonval as $common){
            //echo $common;
            $resultr[]= "'".$common."'";
        }
        
       }
       $resultr = implode(',',$resultr);
       //print_r($resultr);
       //die;
       $result1 = array();
       if($request->genusval!=''){
           
       foreach($genusval as $genus){
           
          $result1[]= "'".$genus."'";
       }
       
       }
       $result1= implode(',',$result1);
      //print_r($result1);
      // die;
       $result2 = array();
       if($taxonval){
           
        foreach($taxonval as $taxon){
            //die;
         $result2[]= "'".$taxon."'";    
        }
       
       }
       $result2= implode(',',$result2);
       //print_r($result2);die;
       //$result2= implode(',',$result2);
       //die;
       //print_r($result2);
//       $taxonsql=DB::table('taxons')->select(DB::raw("*"))->WhereIn('id',$result2)->get();
//       foreach($taxonsql as $taxo){
//         $taxo->;
//       }
      // die;
//       echo '<pre>';
//       print_r($taxonsql);
//       die;
      // print_r($result1);
      // die;
       //echo '----------';
       //die;
       //print_r($resultr);
      // die;
      // $fg=array("Banded Snake Eagle","Black-chested Snake Eagle");
      // print_r($fg);
       //print_r($fg);
       //die;
       //$fg=array('Banded Snake Eagle','Black-chested Snake Eagle');
       //print_r($fg);
       //print_r($finalcommondat); 
       
       $qr = "SELECT * FROM species  left join taxons on species.taxon_id=taxons.id where (species.genus LIKE '%".$keysd."%' or species.species LIKE '%".$keysd."%' or taxons.taxon_code LIKE '%".$keysd."%' or species.common_name LIKE '%".$keysd."%') and ";
       
               
               
       if($resultr)
          
        $qr.= "species.common_name in (".$resultr.") and ";
       if($result1)
        
        $qr.= "species.genus in (".$result1.") and ";
       if($result2)
        
        $qr.= "species.taxon_id in (".$result2.") and ";
       $result=substr(trim($qr),0,-4);
       //print_r($result);die;
       //die;
      $results = DB::select( DB::raw($result) );
      
       
//        $results = DB::table('species')
//            ->select(DB::raw("*"))
//             //->leftjoin('taxons','species.taxon_id','taxons.id')
//            //->orWhere ('taxons.taxon_code', 'LIKE', '%' . $keysd . '%' )
//            ->WhereIn('species.common_name',$resultr) 
//          ->WhereIn('species.genus',$result1) 
//          ->WhereIn('species.taxon_id',$result2) 
//            ->get();
        //dd(DB::getQueryLog());die;
    //  die;
          return view('pages.advancedsearch', compact('results'));
//        echo'<pre>';
//        print_r($results);
//        
//        die;
            // echo $txval= $request->taxonval;
             // $commonval= $request->commonnameval;
             //echo  $genval=$request->genusval;
            // print_r($commonval);
            //echo $impdata= implode(',',$commonval);
           // $users = DB::table('species')->whereIn('common_name', array('Blue/Mitis/Sykes Monkey',"De Brazza's Monkey"))->get();
           // print_r($users);
//               die;
                
        
        
    }

    public function search(Request $request) {


        //return response()->json($request->all());
        //echo $downloadurl = \Request::fullUrl();
        //die;
        //$query = preg_replace("/[^a-zA-Z0-9]/", "", $request->q);
        $query = $request->q;
        //print_r($query);
        // Perform the query using Query Builder
        $results = DB::table('species')
            ->select(DB::raw("*"))
             ->leftjoin('taxons','species.taxon_id','taxons.id')
            ->orwhere('species.common_name','LIKE', '%'.$query.'%')
            ->orWhere ('species.genus', 'LIKE', '%' . $query . '%' )
            ->orWhere ('species.species', 'LIKE', '%' . $query . '%' )
                ->orWhere ('species.taxon_id', '=', 'taxons.id' )
            ->orWhere ('taxons.taxon_code', 'LIKE', '%' . $query . '%' )
            ->get();
        
//print_r($results);
//die;

        $genus_info = DB::table('species')
                 ->select('genus', DB::raw('count(*) as total'))
                 ->leftjoin('taxons','species.taxon_id','taxons.id')
            ->where('species.common_name','LIKE', '%'.$query.'%')
            ->orWhere ('species.genus', 'LIKE', '%' . $query . '%' )
            ->orWhere ('species.species', 'LIKE', '%' . $query . '%' )
                ->orWhere ('species.taxon_id', '=', 'taxons.id' )
            ->orWhere ('taxons.taxon_code', 'LIKE', '%' . $query . '%' )
                 ->groupBy('genus')
                 ->get();

         $common_info = DB::table('species')
                 ->select('common_name', DB::raw('count(*) as total'))
                 ->leftjoin('taxons','species.taxon_id','taxons.id')
            ->where('species.common_name','LIKE', '%'.$query.'%')
            ->orWhere ('species.genus', 'LIKE', '%' . $query . '%' )
            ->orWhere ('species.species', 'LIKE', '%' . $query . '%' )
                ->orWhere ('species.taxon_id', '=', 'taxons.id' )
            ->orWhere ('taxons.taxon_code', 'LIKE', '%' . $query . '%' )
                 ->groupBy('common_name')
                 ->get();
         
         $taxon_info = DB::table('species')
                 ->select('taxon_id', DB::raw('count(*) as total'))
                 ->leftjoin('taxons','species.taxon_id','taxons.id')
            ->where('species.common_name','LIKE', '%'.$query.'%')
            ->orWhere ('species.genus', 'LIKE', '%' . $query . '%' )
            ->orWhere ('species.species', 'LIKE', '%' . $query . '%' )
                ->orWhere ('species.taxon_id', '=', 'taxons.id' )
            ->orWhere ('taxons.taxon_code', 'LIKE', '%' . $query . '%' )
                 ->groupBy('taxon_id')
                 ->get();
         
          
         
         
//      echo '<pre>'; print_r($results);
//        die;
        return view('pages.search', compact('results','genus_info','common_info','taxon_info'));
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