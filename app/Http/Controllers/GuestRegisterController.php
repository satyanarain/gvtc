<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GuestRegister;
use Input;
use Session;
use Mail;
use Auth;


class GuestRegisterController extends Controller
{
    
   // use  GuestRegister;
    
    
     
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
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
    //$user_id=Auth::id();
    //$role=Auth::user()->role;
    //$permission_key = "user_view";
   // $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
    //if($getpermissionstatus==0)
    //return redirect()->route('user-management.unauthorized'); 
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
        $password= bcrypt($request->password);
        $roll= $request->role;
        $status=1;
        $input=  $request->all();
        $input['password']= $password;
        $input['role']= $roll;
        $input['status']= $status;
    
    $guestuser=GuestRegister::create($input);
    $data=$request->all();
    $last_guest= GuestRegister::latest()->first();
    $last__guestid= $last_guest['id'];

    if(Auth::attempt(['username' => $request['username'], 'password' => $request['password']])){
        $username=$request['username'];
       $searchdata=Session::get('searchurluniversaldata');
       
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
//            echo "==============";
//            die;
            if($searchdata!=''&& $userrole=="guest"){
            DB::table('searchresult')->insert(
            array('uesrid' => $userid,'username'=>$username,'serchurl'=>$searchdata, 'status' => 1)
            );    
            
            $query_email = array(
            'username'=> $username, 
            'searchdata' => $searchdata,
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
          
          $request->session()->forget('searchurluniversaldata');
           
            }       
               
        //die;
    $query_email = array(
         'username'=> $request['username'],
         'first_name' => $request['first_name'],
         'last_name' => $request['last_name'],
         'email' => $request['email'],  
         'password' => $password, 
         'date'      => date("M d, Y h:i a")
       );
    $query_guest =  (object) $query_email; 
       Mail::send('emails.guest_notification', ['guset_details' => $query_guest], function ($message) use ($query_guest) {
         $message->from('info@opiant.online', 'GVTC');
         $message->to('gvtc2018@gmail.com',$query_guest->username)->subject('GVTC Guest User Registration');
     });
    //Session::flash('flash_message', "User Created Successfully."); //Snippet in Master.blade.php 
//     $url='http://'.$_SERVER['HTTP_HOST'].'/'.'login';
//    return redirect('/guest_register')->with('success', 'Thank you for registering with GVTC Species Portal. Your request will be approved by the GVTC Admin and you will be notified once you are ready to login. <a href="'.$url.'">Click Here</a>'); 
    return view('/home',compact('roll'));
    //Auth::login($guestuser);
    
    }
    }
    
    public function checkDuplicateUser($username)
    {
     $sql=DB::table("users")->where('username',$username)->first(); 
      if(count($sql)>0){
          
          echo '<font color="#ff4242"><b>'.$username.'</b> is already in use.</font>';
      }else{
        echo '<font color="#324b30"><b>'.$username.'</b> is avaliable .</font>';
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
            'country' => 'required',
            'password' => 'required|min:6|confirmed'
        
    ]);
    }
    
    
     public function show($id)
    {
       
     Session::flash('flash_message', "User Created Successfully."); //Snippet in Master.blade.php 
      return view('guest_register.index');
    }
}
