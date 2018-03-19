<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Endenism;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;


class EndenismController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   // protected $redirectTo = '/endenisms';

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
    $permission_key = "endenism_view";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
    if($getpermissionstatus==0)
    return redirect()->route('user-management.unauthorized');
    $endenisms = Endenism::all()->toArray();
    return view('endenisms.index', compact('endenisms'));
    
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user_id=Auth::id();
        $role=Auth::user()->role;
        $permission_key = "endenism_add";
        $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
        if($getpermissionstatus==0)
        return redirect()->route('user-management.unauthorized');
        return view('endenisms/create');
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
     Endenism::create([
            'endenism' => $request['endenism'],
            'endenism_status' => $request['endenism_status'],
            'created_by'=>$request['created_by']

        ]);

       
    Session::flash('flash_message', "Endenism Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('endenism.index');
    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $endenisms = Endenism::find($id);
         
        // Redirect to taxon list if updating taxon wasn't existed
        if ($endenisms == null || count($endenisms) == 0) {
            return redirect()->intended('/endenism');
        }

        return view('endenisms/show', ['endenisms' => $endenisms]);
        
        
     
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $endenisms = Endenism::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
       if ($endenisms == null || count($endenisms) == 0) {
            return redirect()->intended('/endenism');
        }

        return view('endenisms/edit', ['endenisms' => $endenisms]);
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
       
        $endenism = Endenism::findOrFail($id);
        $constraints = [
            'endenism' => 'required',
            'endenism_status'=> 'required'
            
            ];
       $input = [
            'endenism' => $request['endenism'],
            'endenism_status' => $request['endenism_status']
          
        ];
        
      
        $this->validate($request, $constraints);
        Endenism::where('id', $id)
            ->update($input);
        
        //return redirect()->intended('/endenism');
           
       Session::flash('flash_message', "Endenism Updated Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('endenism.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Endenism::where('id', $id)->delete();
       return redirect()->route('endenism.index');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'endenism' => 'required|unique:endenisms',
        'endenism_status' => 'required'
      
        
    ]);
    }
}

