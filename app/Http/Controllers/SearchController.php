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


    public function conatctus(Request $request){
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'user_email' => 'required|email',
           
        ]);
        
        
        
    $user_name = $request->user_name;
    $user_email = $request->user_email;
    $user_subject = $request->user_subject;
    $user_message = $request->user_message;
    
     if ($validator->passes()) {


			
          $query_email = array(
         'user_name'=> $user_name,
         'user_email' =>$user_email,  
         'user_subject' =>$user_subject, 
         'user_message' => $user_message
       );
    $query_contact =  (object) $query_email; 
//    print_r($query_contact);
//    die;
       Mail::send('emails.contactform', ['contact_deatils' => $query_contact], function ($message) use ($query_contact) {
         $message->from('info@opiant.online', 'GVTC');
         $message->to('gvtc2018@gmail.com',$query_contact->user_name)->subject('GVTC Conatct Form Details');
     });
     return response()->json(['success'=>"Thank you for contacting GVTC. We'll get back to you as soon as possible."]);
     //Thank you for contacting GVTC. We'll get back to you as soon as possible.
        }else{


    	return response()->json(['error'=>$validator->errors()->all()]);
    }
    
    
    
    
    
   
//     print_r($contact_deatils);
//     echo 'sdf';
//     die;

}


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
       $taxonval= $request->taxonval;
       $placeval= $request->placeval;
       $habitatval= $request->habitatval;
       if($commonval)
       $adv_search['common_name'] =$commonval;
       if($taxonval)
       $adv_search['taxon_id'] =$taxonval;
       if($placeval)
       $adv_search['location'] =$placeval;
       if($habitatval)
       $adv_search['habitat'] = $habitatval;
       //echo '<pre>';print_r($adv_search);
       $advs_search = serialize($adv_search);
       //put data in search dat in session
       $advsearchdata=Session::put('advsearchdata',$advs_search);
       
       
      
      
       
       
      // $k = unserialize($adv_search);
       
//       print_r($k);die;
//       echo'</br>';
//       print_r($serialized_taxonval);
//       echo'</br>';
//       print_r($serialized_placeval);
//       echo'</br>';
//       print_r($serialized_habitatval);
       //die;
       
       
//       print_r($taxonval);
//       die;
//        $commonavall='"'.$commonval.'"';
//        print_r($commonaval);
//       die;
       $resultr=array();
       if($request->commonnameval!=''){
           
        foreach ($commonval as $common){
            //echo $common;
            $resultr[]= "'".addslashes($common)."'";
        }
        
       }
       $resultr = implode(',',$resultr);
       //print_r($resultr);
       //die;
       $result1 = array();
       if($request->placeval!=''){
           
       foreach($placeval as $place){
           
          $result1[]= "'".addslashes($place)."'";
       }
       
       }
       $result1= implode(',',$result1);
     // print_r($result1);
    //   die;
       $result2 = array();
       if($taxonval){
           
        foreach($taxonval as $taxon){
            //die;
         $result2[]= "'".addslashes($taxon)."'";    
        }
       
       }
       $result2= implode(',',$result2);
 
       
       //$qr = "SELECT * FROM species  left join taxons on species.taxon_id=taxons.id where (species.genus LIKE '%".$keysd."%' or species.species LIKE '%".$keysd."%' or taxons.taxon_code LIKE '%".$keysd."%' or species.common_name LIKE '%".$keysd."%') and ";
       $qr = "SELECT * FROM distributions  left join taxons on distributions.taxon_id=taxons.id  left join  gazetteers on distributions.gazetteer_id=gazetteers.id left join  species on distributions.specie_id=species.id  where (species.common_name LIKE '%".$keysd."%' or taxons.taxon_code LIKE '%".$keysd."%' or species.species LIKE '%".$keysd."%' ) and ";
       
         //echo "SELECT * FROM distributions   left join  gazetteers on distributions.gazetteer_id=gazetteers.id  where (gazetteers.place LIKE '%".$keysd."%') and ";      
             
       if($resultr)
        $qr.= "species.common_name in (".$resultr.") and ";
       
       if($result1)
           $qr.= "gazetteers.id in (".$result1.") and ";
      
       
       if($result2)
        
        $qr.= "distributions.taxon_id in (".$result2.") and ";
       //echo $qr; die;
       $result=substr(trim($qr),0,-4);
      $results = DB::select( DB::raw($result) );
     return view('pages.advancedsearch', compact('results'));

                
        
        
    }

    public function search(Request $request) {
        
        //echo '<pre>';print_r($resultss);die;
        
        
        //return response()->json($request->all());
        //echo $downloadurl = \Request::fullUrl();
        //die;
        //$query = preg_replace("/[^a-zA-Z0-9]/", "", $request->q);
        $query = $request->q;
        //print_r($query);
        // Perform the query using Query Builder
        $results = DB::table('distributions')
            ->select(DB::raw("*"))
             ->leftjoin('taxons','distributions.taxon_id','taxons.id')
             ->leftjoin('species','distributions.specie_id','species.id')
              ->orWhere ('distributions.taxon_id', '=', 'taxons.id' )
              ->orWhere ('distributions.specie_id', '=', 'species.id' )
              ->orWhere ('taxons.taxon_code', 'LIKE', '%' . $query . '%' )
              ->orWhere ('species.species', 'LIKE', '%' . $query . '%' )
               ->orwhere('species.common_name','LIKE', '%'.$query.'%')
            ->get();
// echo '<pre>';       
//print_r($results);
//echo count($results);
//die;

        
        $placeinfo=DB::table('distributions')
            ->select('gazetteer_id', DB::raw('count(*) as total'))
             ->leftjoin('taxons','distributions.taxon_id','taxons.id')
             ->leftjoin('species','distributions.specie_id','species.id')
              ->orWhere ('distributions.taxon_id', '=', 'taxons.id' )
              ->orWhere ('distributions.specie_id', '=', 'species.id' )
              ->orWhere ('taxons.taxon_code', 'LIKE', '%' . $query . '%' )
              ->orWhere ('species.species', 'LIKE', '%' . $query . '%' )
               ->orwhere('species.common_name','LIKE', '%'.$query.'%')
               ->groupBy('gazetteer_id') 
            ->get();
        
        
        $commoninfo=DB::table('distributions')
            ->select('common_name', DB::raw('count(*) as total'))
             ->leftjoin('taxons','distributions.taxon_id','taxons.id')
             ->leftjoin('species','distributions.specie_id','species.id')
              ->orWhere ('distributions.taxon_id', '=', 'taxons.id' )
              ->orWhere ('distributions.specie_id', '=', 'species.id' )
              ->orWhere ('taxons.taxon_code', 'LIKE', '%' . $query . '%' )
              ->orWhere ('species.species', 'LIKE', '%' . $query . '%' )
               ->orwhere('species.common_name','LIKE', '%'.$query.'%')
               ->groupBy('common_name') 
            ->get();
        
        $habitatinfo=DB::table('distributions')
            ->select('gazetteer_id', DB::raw('count(*) as total'))
             ->leftjoin('taxons','distributions.taxon_id','taxons.id')
             ->leftjoin('species','distributions.specie_id','species.id')
              ->orWhere ('distributions.taxon_id', '=', 'taxons.id' )
              ->orWhere ('distributions.specie_id', '=', 'species.id' )
              ->orWhere ('taxons.taxon_code', 'LIKE', '%' . $query . '%' )
              ->orWhere ('species.species', 'LIKE', '%' . $query . '%' )
               ->orwhere('species.common_name','LIKE', '%'.$query.'%')
               ->groupBy('gazetteer_id') 
            ->get();
//        echo '<pre>';
//        print_r($placeinfo);
//        echo '<pre>';
//        print_r($habitatinfo);
//        die;
        
        $taxoninfo=DB::table('distributions')
            ->select('distributions.taxon_id as taxon_id', DB::raw('count(*) as total'))
             ->leftjoin('taxons','distributions.taxon_id','taxons.id')
             ->leftjoin('species','distributions.specie_id','species.id')
             ->orWhere ('distributions.taxon_id', '=', 'taxons.id' )
             ->orWhere ('distributions.specie_id', '=', 'species.id' )
              ->orWhere ('taxons.taxon_code', 'LIKE', '%' . $query . '%' )
              ->orWhere ('species.species', 'LIKE', '%' . $query . '%' )
              ->orwhere('species.common_name','LIKE', '%'.$query.'%')
               ->groupBy('taxon_id') 
            ->get();
         
//      echo '<pre>'; print_r($results);
//        die;
        return view('pages.search', compact('results','commoninfo','placeinfo','taxoninfo','habitatinfo'));
        
    }

    public function create(Request $request){



    }

    public function searchdownalod($id){
        $sqlsearchdownload = DB::table('searchresult')->where('id', $id)->first();
        //echo '<pre>';
        $sqlsearchdownload->serchurl;
        $searchkeysd = explode("=",$sqlsearchdownload->serchurl);
       $keysd=$searchkeysd[2];
        //print_r($keysd);
       // die;
        $arr = unserialize($sqlsearchdownload->advsearchdata);
        //$arr = unserialize($arr);
        //die;
        if(isset($arr['common_name']))
            $commonnameval = $arr['common_name'];
        else
            $commonnameval = array();
        if(isset($arr['location']))
            $placeval = $arr['location'];
        else
            $placeval = array();
        
        
        if(isset($arr['taxon_id']))
            $taxonval = $arr['taxon_id'];
        else
            $taxonval = array();
        
        if(isset($arr['habitat']))
            $habitat = $arr['habitat'];
        else
            $habitat = array();
        
        //print_r($commonnameval);die;
        $resultr=array();
        if($commonnameval!=''){
            foreach ($commonnameval as $common){
                //echo $common;
                $resultr[]= "'".$common."'";
            }
        }
        $resultr = implode(',',$resultr);
        
        $result1 = array();
        if($placeval!=''){
            foreach($placeval as $place){

              $result1[]= "'".$place."'";
            }
        }
        $result1= implode(',',$result1);
        //print_r($placeval);die;
        $result2 = array();
        if($taxonval){
            foreach($taxonval as $taxon){
            $result2[]= "'".$taxon."'";    
            }
        }
        $result2= implode(',',$result2);

        $qr = "SELECT * FROM distributions  left join taxons on distributions.taxon_id=taxons.id  left join  gazetteers on distributions.gazetteer_id=gazetteers.id left join  species on distributions.specie_id=species.id  where (species.common_name LIKE '%".$keysd."%' or taxons.taxon_code LIKE '%".$keysd."%' or species.species LIKE '%".$keysd."%' ) and ";
        if($resultr)
            $qr.= "species.common_name in (".$resultr.") and ";
        if($result1)
           $qr.= "gazetteers.id in (".$result1.") and ";
        if($result2)
            $qr.= "distributions.taxon_id in (".$result2.") and ";
        $result=substr(trim($qr),0,-4);
        //echo $result;die;
        $results = DB::select( DB::raw($result) );
        //print_r($results);die;
        return view('pages.searchdownload',compact('results'));
        
    }

    public function store(Request $request)
    {
    $downaloaddtat= $request->downloaddata;
     $uesrid= $request->uesrid;
     $username= $request->username;
       
     
     if($request->advancedsearch=="advancedsearch")
         $advancedsearch = Session::get('advsearchdata');
     else
         $advancedsearch = '';
     #---------------Insert-Serach-Data-------------------------------#
      DB::table('searchresult')->insert(array('serchurl' => $downaloaddtat,
                    'uesrid' => $uesrid,
                    'username' =>$username,
                    'status'=>1,
                    'advsearchdata'=>$advancedsearch

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