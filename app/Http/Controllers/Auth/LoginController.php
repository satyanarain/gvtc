<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;
use Session;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Respons;
use Mail;


use App\User;





class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
  //  protected $redirectTo = '/home';
    
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function login(Request $request)     {

    $this->validate($request, ['username' => 'required', 'password' => 'required']); 
   
        Auth::attempt(['username' => $request['username'], 'password' => $request['password'],'status'=>1]); 
        
        if(!Auth::attempt(['username' => $request['username'], 'password' => $request['password'],'status'=>1])) { 
            return redirect()->back()->with('fail', 'Either username or password is incorrect!');  
            }else{
                
            $username=$request['username'];
           $searchdata=Session::get('searchurluniversaldata');
           $advdata=Session::get('advsearchdata');

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
          // die;
            if($searchdata!=''&& $userrole=="guest"){
            DB::table('searchresult')->insert(
            array('uesrid' => $userid,'username'=>$username,'serchurl'=>$searchdata,'advsearchdata'=>$advdata, 'status' => 1)
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
          $request->session()->forget('advsearchdata');
           
            }       
                
             Session::put('language_val', $request['lanuage']);
            return redirect('/home');


             }   
            }
    public function logout(Request $request) {
        $request->session()->forget('searchurluniversaldata');
          $request->session()->forget('advsearchdata');
  Auth::logout();
  return redirect('/login');
}
    
}
