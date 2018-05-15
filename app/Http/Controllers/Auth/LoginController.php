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
       
        //$sql = DB::table('species')->where('taxon_id', $taxon_id)->get();
        //print_r($request->all());
    $this->validate($request, ['username' => 'required', 'password' => 'required']); 
   
        Auth::attempt(['username' => $request['username'], 'password' => $request['password'],'status'=>1]); 
        
        if(!Auth::attempt(['username' => $request['username'], 'password' => $request['password'],'status'=>1])) { 
            return redirect()->back()->with('fail', 'Either username or password is incorrect!');  
            }else{
                
            $username=$request['username'];
            $searchdata=$request['searchdata'];
            $sqluserid=DB::table('users')->where('username' , $username)->get();
            foreach($sqluserid as $val){
            $val->id;
            $val->role;
            $val->email;
            
            }
            $userid=$val->id;
            $userrole=$val->role;
            $useremail=$val->email;
//            echo "==============";
//            die;
            if($request['searchdata']!=''&& $userrole="guest"){
            DB::table('searchresult')->insert(
            array('uesrid' => $userid,'username'=>$username,'serchurl'=>$searchdata, 'status' => 1)
            );    
            
            $query_email = array(
            'username'=> $username, 
            'searchdata' => $searchdata,
             'email' => $useremail,   
            'date'      => date("M d, Y h:i a")
            );
           
            //$query_user =  (object) $query_email;
            $query_user =  (object) $query_email; 
            Mail::send('emails.searchresult', ['search_details' => $query_user], function ($message) use ($query_user) {
              $message->from('info@opiant.online', 'GVTC');
              $message->to('gvtc2018@gmail.com',$query_user->username)->subject('GVTC | search request for approval');
          });
             Mail::send('emails.searchresultuser', ['search_details_user' => $query_user], function ($message) use ($query_user) {
              $message->from('info@opiant.online', 'GVTC');
              //$message->to('gvtc2018@gmail.com',$query_user->username)->subject('GVTC Guset Search');
              $message->to($query_user->email,$query_user->username)->subject('GVTC | search request submited');
          });
            
            
            }       
                
             Session::put('language_val', $request['lanuage']);
             return redirect('/home');
             //print_r($request->all());
             
             }   
            }
    public function logout(Request $request) {
  Auth::logout();
  return redirect('/login');
}
    
}
