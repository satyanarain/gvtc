<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GuestPassword;
use Input;
use Session;
use Mail;

class GuestPasswordController extends Controller
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
    
       return view('guest_password.index');
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
    //echo $request->userid;
    //die;
   $userid=$request->userid;
    
    $userid = DB::table('users')->select('*')->where('id','=',$userid)->first();
    //echo $userid;
   
    $username = $userid->username;
    $email = $userid->email;
    
    $password=bcrypt($request['password']);
    $q = "UPDATE users SET password= '".$password."' WHERE id=$request->userid ";
    DB::update(DB::raw($q));
    $query_email = array(
        'username' =>$username,
        'email' => $email, 
        'password' => $request['password'], 
        'date'      => date("M d, Y h:i a")
      );
    //print_r($query_email);
    //die;
    $query_user =  (object) $query_email; 
    
    Mail::send('emails.guest_password', ['users_details' => $query_user], function ($message) use ($query_user) {
         $message->from('info@opiant.online', 'Gvtc');
         $message->to($query_user->email,$query_user->username)->subject('GVTC User Registration Successful');
      });  
    
  
    
    
    
    
    
    
 
      
    
    
    return redirect('/create_password')->with('success', 'You have successfully generated password for your account. <a href="http://127.0.0.1:8000/login"> Click Here to Login </a>'); 
    
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
        'password' => 'required|min:6|confirmed'
        
    ]);
    }
    
     public function show($id)
    {
      
     Session::flash('flash_message', "User Created Successfully."); //Snippet in Master.blade.php 
      return view('guest_password.index',compact('id'));
    }
}
