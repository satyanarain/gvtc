<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Age;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;


class AgeController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/water-use';

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
    $permission_key = "agegroup_view";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
    if($getpermissionstatus==0)
    return redirect()->route('user-management.unauthorized');    
    $age = Age::all()->toArray();
    return view('ages.index', compact('age'));
    
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
        $permission_key = "agegroup_add";
        $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
        if($getpermissionstatus==0)
        return redirect()->route('user-management.unauthorized');
        return view('ages/create');
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
     Age::create([
            'age_group' => $request['age_group'],
            'code_description' => $request['code_description'],
            'code_description_fr' => $request['code_description_fr'],
            'created_by'=>$request['created_by'],

        ]);

    Session::flash('flash_message', "Age Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('age.index');

    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $age = Age::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($age == null || count($age) == 0) {
            //return redirect()->intended('/water');
        }

        return view('ages/show', ['ages' => $age]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $age = Age::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
       if ($age == null || count($age) == 0) {
           
        }

        return view('ages/edit', ['ages' => $age]);
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
       
        $observartions = Age::findOrFail($id);
        $constraints = [
            'age_group' => 'required',
            'code_description'=> 'required',
            'code_description_fr'=> 'required'
            
            ];
       
        
        
        
        
       
        $input = [
            'age_group' => $request['age_group'],
            'code_description' => $request['code_description'],
            'code_description_fr' => $request['code_description_fr']
          
        ];
        
      
        $this->validate($request, $constraints);
        Age::where('id', $id)
            ->update($input);
        
      
    Session::flash('flash_message', "Observation  Updated Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('age.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     Age::where('id', $id)->delete();
     return redirect()->route('age.index');   
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'age_group' => 'required|unique:ages',
        'code_description' => 'required',
        'code_description_fr' => 'required'
      
        
    ]);
    }
}

