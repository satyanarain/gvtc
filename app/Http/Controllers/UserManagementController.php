<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Input;
use Session;
use Mail;

class UserManagementController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user-management';

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
        $users = User::all();
        return view('users-mgmt/index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users-mgmt/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);
        $filephoto = 'default_document.png';
        $fileprofile='default_profile.jpg';
       if ((Input::hasFile('photoid'))) {

           $destinationPath = public_path('userdocument');
           $extension = Input::file('photoid')->getClientOriginalExtension();
           $filephoto = uniqid() . '_useridproof.'.$extension;
           Input::file('photoid')->move($destinationPath, $filephoto);
           
       }
       
       
       
       if ((Input::hasFile('profilepicture'))) {

           $destinationPath = public_path('profilepicture');
           $extension = Input::file('profilepicture')->getClientOriginalExtension();
           $fileprofile = uniqid() . '_userprofile.' . $extension;
           Input::file('profilepicture')->move($destinationPath, $fileprofile);
       }
      $password_auto=mt_rand(1,100000000);
      $pwd=bcrypt($password_auto);
      User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'address' => $request['address'],
            'mobilenumber' => $request['mobilenumber'],
            'email' => $request['email'],
            'department' => $request['department'],
            //'password' => bcrypt($request['password']),
            'password' => $pwd,
            'language' => $password_auto,
            'designation' => $request['designation'],
            'profilepicture' => $fileprofile,
            'photoid'=> $filephoto,
            'role'=>$request['role'],
            'status'=>$request['status']
        ]);
        $query_email = array(
          'password'=> $password_auto, 
         'name' => $request['name'],
         'username' => $request['username'],
         'language' => $password_auto,
         'email' => $request['email'],  
         'date'      => date("M d, Y h:i a")
       );
       //$query_user =  (object) $query_email;
       $query_user =  (object) $query_email; 
       Mail::send('emails.user_notification', ['user_details' => $query_user], function ($message) use ($query_user) {
         $message->from('info@opiant.online', 'GVTC');
         $message->to($query_user->email,$query_user->name)->subject('GVTC User Details');
     });
     
        //return redirect()->intended('/user-management');
    Session::flash('flash_message', "User Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('user-management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $user = User::find($id);
        // Redirect to user list if updating user wasn't existed
        if ($user == null || count($user) == 0) {
            return redirect()->intended('/user-management');
        }
        return view('users-mgmt/profile', ['user' => $user]);
    }
    
    
    public function viewprofile($id)
    {
         $user = User::find($id);
        // Redirect to user list if updating user wasn't existed
        if ($user == null || count($user) == 0) {
           // return redirect()->intended('/user-management');
        }
        return view('users-mgmt/view_profile', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        // Redirect to user list if updating user wasn't existed
        if ($user == null || count($user) == 0) {
            return redirect()->intended('/user-management');
        }

        return view('users-mgmt/edit', ['user' => $user]);
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
       
        $user = User::findOrFail($id);
        $constraints = [
            'name' => 'required|max:20',
            'address'=> 'required|max:60',
            'mobilenumber' => 'required|max:60'
            ];
        $pwd='';
        if($request['password']==''){
            
            $pwd=$user->password;
        }else{
            
           $pwd = $request['password'];
        }
        
        
        $fileprofile=$request['edit_profilepicture'];
         if ((Input::hasFile('profilepicture'))) {
             $destinationPath = public_path('profilepicture');
           $extension = Input::file('profilepicture')->getClientOriginalExtension();
           $fileprofile = uniqid() . '_userprofile.' . $extension;
           Input::file('profilepicture')->move($destinationPath, $fileprofile);
       }
       
       $filephoto=$request['edit_userdocument'];
        if ((Input::hasFile('photoid'))) {

           $destinationPath = public_path('userdocument');
           $extension = Input::file('photoid')->getClientOriginalExtension();
           $filephoto = uniqid() . '_useridproof.' . $extension;
           Input::file('photoid')->move($destinationPath, $filephoto);
       }
        
       
        $input = [
            'first_name' =>$request['first_name'],
            'last_name' =>$request['last_name'],
            'account' =>$request['account'],
            'institution' =>$request['institution'],
            'institution_type' =>$request['institution_type'],
            'country' =>$request['country'],
            'name' => $request['name'],
            'address' => $request['address'],
            'mobilenumber' => $request['mobilenumber'],
            'department' => $request['department'],
            'designation' => $request['designation'],
            'email' => $request['email'],
            'status' => $request['status'],
            //'password' => $pwd,
            'photoid'=>$filephoto,
            'profilepicture'=>$fileprofile
        ];
        
//        if ($request['password'] != null && strlen($request['password']) > 0) {
//            $constraints['password'] = 'required|min:6|confirmed';
//            $input['password'] =  bcrypt($request['password']);
//        }
        //$this->validate($request, $constraints);
        User::where('id', $id) ->update($input);
        $userid = DB::table('users')->select('*')->where('id', '=', $id)->first();
        $password_status = $userid->password_status;
        if($request['status']==1 && $password_status==0){
        $q = "UPDATE users SET password_status= '1' WHERE id=$id ";
        DB::update(DB::raw($q));
        $query_email = array(
         'first_name' =>$request['first_name'],
         'last_name' =>$request['last_name'],   
         'username' => $request['username'],
         'email' => $request['email'], 
          'id'=>$id,
         'date'      => date("M d, Y h:i a")
       );

       $query_user =  (object) $query_email; 
       Mail::send('emails.password_notification', ['users_details' => $query_user], function ($message) use ($query_user) {
         $message->from('info@opiant.online', 'GVTC');
         $message->to($query_user->email,$query_user->username)->subject('GVTC Account Activation Link');
      });  
        }
        
     
        
        
        //return redirect()->intended('/user-management');
        
    Session::flash('flash_message', "User Updated Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('user-management.index');
    }
    
    
    
     public function userstatusUpdate($id)
   {
    $tablename=$_REQUEST['tablename'];
  
   $sql=DB::table($tablename)->where('id',$id)->first();
    if($sql->status==0)
      {
     
      $var =DB::table($tablename)->where('id',$id)->first();
      //print_r($var);
      $current_status=$var->status;
      $current_passwordstatus=$var->password_status;
      $email=$var->email;
      $username=$var->username;
      $var->status=1;
      DB::table($tablename)->where('id', $id)->update(array('status' => $var->status)); 
      echo "1";
      if($current_status==0){
      $q = "UPDATE users SET status= '1' WHERE id=$id ";
      DB::update(DB::raw($q));
       $query_email = array(
          'id'=>$id,
           'email'=>$email,
           'username'=>$username,
         'date'=> date("M d, Y h:i a")
       );
       $query_user =  (object) $query_email; 
        Mail::send('emails.password_notification', ['users_details' => $query_user], function ($message) use ($query_user) {
         $message->from('info@opiant.online', 'GVTC');
         $message->to($query_user->email,$query_user->username)->subject('GVTC Account Activation Link');
      });  
      
      }
     }else
      {
      $status=  $sql->status;
      $var =  $sql=DB::table($tablename)->where('id',$id)->first();
      $var->status=0;
       DB::table($tablename)->where('id', $id)->update(array('status' => $var->status));
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
        User::where('id', $id)->delete();
        return redirect()->route('user-management.index');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'username' => $request['username'],
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'department' => $request['department']
            ];

       $users = $this->doSearchingQuery($constraints);
       return view('users-mgmt/index', ['users' => $users, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = User::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
    }
    private function validateInput($request) {
        $this->validate($request, [
    
        'email' => 'required',
         'username'=> 'required|min:6|unique:users',
         'mobilenumber'=>'required|numeric',   
        //'password' => 'required|min:6|confirmed'
        
    ]);
    }
     public function unauthorized(){
         
         return view('users-mgmt.error');
         
     }
}
