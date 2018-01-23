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
    $this->validate($request, ['username' => 'required', 'password' => 'required',]);    
        Auth::attempt(['username' => $request['username'], 'password' => $request['password']]);    
        if(!Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) { 
            return redirect()->back()->with('fail', 'Either username or password is incorrect!');  
            }else{
             Session::put('language_val', $request['lanuage']);
             return redirect('/home');
             //print_r($request->all());
             
             }   
            }
    
    
}
