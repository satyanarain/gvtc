<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GuestRegister;
use Input;
use Session;
use Mail;

class GuestRegisterController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/user-management';

         /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
    $permission_key = "user_view";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
    if($getpermissionstatus==0)
    return redirect()->route('user-management.unauthorized'); 
    return view('guest_register.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $this->validateInput($request);
    GuestRegister::create($request->all());
    $query_email = array(
         'username'=> $request['username'],
         'first_name' => $request['first_name'],
         'last_name' => $request['last_name'],
         'email' => $request['email'],  
         'date'      => date("M d, Y h:i a")
       );
    $query_guest =  (object) $query_email; 
       Mail::send('emails.guest_notification', ['guset_details' => $query_guest], function ($message) use ($query_guest) {
         $message->from('info@opiant.online', 'GVTC');
         $message->to('gvtc2018@gmail.com',$query_guest->username)->subject('GVTC Guest User Registration');
     });
    //Session::flash('flash_message', "User Created Successfully."); //Snippet in Master.blade.php 
     $url='http://'.$_SERVER['HTTP_HOST'].'/'.'login';
    return redirect('/guest_register')->with('success', 'Thank you for registering with GVTC Species Portal. Your request will be approved by the GVTC Admin and you will be notified once you are ready to login. <a href="'.$url.'">Click Here</a>'); 
    
    }

    
    public function checkDuplicateUser($username)
    {
     $sql=DB::table("users")->where('username',$username)->first(); 
      if(count($sql)>0){
          
          echo '<font color="#23e5bf"><b>'.$username.'</b> is already in use.</font>';
      }else{
        echo '<font color="#ff4242"><b>'.$username.'</b> is avaliable .</font>';
      }
       // die;
        
    }    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
  

   
    private function validateInput($request) {
        $this->validate($request, [
    
        
            'email' => 'required|email',
            'username' => 'required|max:255|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'account' => 'required',
            'institution' => 'required',
            'country' => 'required'
        
    ]);
    }
    
    
     public function show($id)
    {
       
     Session::flash('flash_message', "User Created Successfully."); //Snippet in Master.blade.php 
      return view('guest_register.index');
    }
}
