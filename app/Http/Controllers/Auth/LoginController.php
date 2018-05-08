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
            foreach($sqluserid as $userid){
            $userid->id;
            
            }
            $userid=$userid->id;
            DB::table('searchresult')->insert(
            array('uesrid' => $userid,'username'=>$username,'serchurl'=>$searchdata, 'status' => 0)
        );    
                
                
                
             Session::put('language_val', $request['lanuage']);
             return redirect('/home');
             //print_r($request->all());
             
             }   
            }
    
    
}
