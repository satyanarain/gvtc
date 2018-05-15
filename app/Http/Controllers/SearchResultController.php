<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SearchResult;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;
class SearchResultController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/taxons';

         /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
          
    $user_id=Auth::id();
   $role=Auth::user()->role;
  $permission_key = "searchresult_view";
   $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
//        //print_r($getpermissionstatus);die;
    if($getpermissionstatus==0)
   return redirect()->route('user-management.unauthorized');    
    $searchresult = SearchResult::all()->toArray();
    
    return view('searchresult.index', compact('searchresult'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
    return view('taxons/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    
    public function store(Request $request)
    {
      
     
     
    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
       
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $val = SearchResult::find($id);
        return view('searchresult.edit', ['val' => $val]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
       
    }

    public function adminapprovalUpdate($id)
   {

    $tablename=$_REQUEST['tablename'];
  
   $sql=DB::table($tablename)->where('id',$id)->first();


      if($sql->adminaprovel==0)
      {
      $var = $sql=DB::table($tablename)->where('id',$id)->first();
      
     
      $var->adminaprovel=1;
      DB::table($tablename)->where('id', $id)->update(array('adminaprovel' => $var->adminaprovel)); 
      
      if($var->adminaprovel==0){
         $uesrid = $var->uesrid; 
         $searchdata = $var->serchurl; 
         $username = $var->username; 
          $sqluserid=DB::table('users')->where('id' , $uesrid)->get();
            foreach($sqluserid as $val){
            $useremail=$val->email;
            
            }
             $query_email = array(
            'username'=> $username, 
            'searchdata' => $searchdata,
            'email' => $useremail,   
            'date'      => date("M d, Y h:i a")
            );
          //print_r($query_email);die;
            $query_user =  (object) $query_email;
            Mail::send('emails.approvesearchresult', ['search_details_user' => $query_user], function ($message) use ($query_user) {
              $message->from('info@opiant.online', 'GVTC');
              //$message->to('gvtc2018@gmail.com',$query_user->username)->subject('GVTC Guset Search');
              $message->to($query_user->email,$query_user->username)->subject('GVTC | search reuest approve');
          });
      }
      
      
      echo "1";
     }else
      {
      $adminaprovel=  $sql->adminaprovel;
      $var =  $sql=DB::table($tablename)->where('id',$id)->first();
      $var->adminaprovel=0;
       DB::table($tablename)->where('id', $id)->update(array('adminaprovel' => $var->adminaprovel));
      echo "0";
      }
   }
    
    
   
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Taxon::where('id', $id)->delete();
        return redirect()->route('taxons.index');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'taxon_code' => 'required|unique:taxons',
        //'taxon_code_fr' => 'required|unique:taxons',
        'taxon_code_description'=>'required',    
        'taxon_code_description_fr' => 'required'
        
    ]);
    }
}

