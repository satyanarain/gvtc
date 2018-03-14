<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Permission;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
class PermissionController extends Controller
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
    $permissions = Permission::all()->toArray();
    return view('permission.index', compact('permissions'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permission/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    
    public function generate($id)
    {

     return view('permission/create',compact($id));
    }
    
    
    
    public function generatesave(Request $request)
    {
        //return response()->json($request->all());
        $existuserid = DB::table('permissions')->where('user_id', $request->user_id)->first();
        //$sql=DB::table('species')->where('taxon_id',$taxon_id)->get();
        $record=count($existuserid);
       // echo $request['user_id'];
        if($record>0){
          DB::table('permissions')->where('user_id', $request->user_id)->delete();  
           $myrequest=$request['action'];
        for($i=0; $i< count($request['action']); $i++){
            
            //$add_action=explode('_',$myrequest[$i]);
            
            Permission::create([
            'permission_key' => $myrequest[$i],
            'user_id' =>    $request['user_id']
            
            
            
        ]);
            
        }}else{
       
         $myrequest=$request['action'];
        for($i=0; $i< count($request['action']); $i++){
            
            //$add_action=explode('_',$myrequest[$i]);
            
            Permission::create([
            'permission_key' => $myrequest[$i],
            'user_id' =>    $request['user_id']
            
            
            
        ]);
            
 
        }}
Session::flash('flash_message', "Permission Created Successfully."); //Snippet in Master.blade.php   
 return redirect()->route('user-management.index');
        //die;
        //$add_action=explode('_',$request['add_action']);
       // print_r($add_action); 
       // die;
//        Permission::create([
//            'module_name' => $request['module_name'],
//            'user_id' =>    $request['user_id'],
//            'add_action' => $request['add_action'],
//            'edit_action' => $request['edit_action'],
//            'view_action' => $request['view_action']
//            
//        ]);
        //echo '<pre>';
        //print_r($request->all());
        //echo count($inrecord);
        //die;
        
      //$val = Permission::findOrFail($request->user_id);  
       
       
       
        //$this->validate($request, $constraints);
        
        
        //return redirect()->intended('/taxons');
       // return redirect()->route('user-management.index');
    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
         $taxons = Permission::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($taxons == null || count($taxons) == 0) {
            return redirect()->intended('/taxons');
        }

        return view('taxons.show', ['taxons' => $taxons]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taxon = Taxon::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($taxon == null || count($taxon) == 0) {
            return redirect()->intended('/taxons');
        }

        return view('taxons.edit', ['taxon' => $taxon]);
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
       
        $taxon = Taxon::findOrFail($id);
        $constraints = [
            'taxon_code' => 'required',
            'taxon_code_description'=> 'required',
            
            ];
       
        
        
        
        
       
        $input = [
            'taxon_code' => $request['taxon_code'],
            'taxon_code_description' => $request['taxon_code_description']
        ];
        
        if ($request['password'] != null && strlen($request['password']) > 0) {
            $constraints['password'] = 'required|min:6|confirmed';
            $input['password'] =  bcrypt($request['password']);
        }
        $this->validate($request, $constraints);
        Taxon::where('id', $id)
            ->update($input);
        
        //return redirect()->intended('/taxons');
        return redirect()->route('taxons.index');
    }

    public function statusUpdate($id)
   {

    $tablename=$_REQUEST['tablename'];
  
   $sql=DB::table($tablename)->where('id',$id)->first();

      if($sql->status==0)
      {
     
      $var = $sql=DB::table($tablename)->where('id',$id)->first();
      $var->status=1;
      DB::table($tablename)->where('id', $id)->update(array('status' => $var->status)); 
      
      echo "1";
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
        'module_name' => 'required'
       
        
    ]);
    }
}

