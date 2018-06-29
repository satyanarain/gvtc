<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\National;
use Input;
use Illuminate\Support\Facades\Validator;
use Session;
use Auth;

class NationalThreatCodeController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/nationals';

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
    $permission_key = "NationalThreatCode_view";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
    if($getpermissionstatus==0)
    return redirect()->route('user-management.unauthorized');
    $nationals = National::all()->toArray();
    return view('nationals.index', compact('nationals'));
    
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
    $permission_key = "NationalThreatCode_add";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
    if($getpermissionstatus==0)
    return redirect()->route('user-management.unauthorized');
        return view('nationals/create');
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
     National::create([
            'national_threat_code' => $request['national_threat_code'],
            'national_threat_code_description' => $request['national_threat_code_description'],
            'created_by'=>$request['created_by'],
            'national_threat_code_description_fr'=>$request['national_threat_code_description_fr'],
            
        ]);
        Session::flash('flash_message', "National Threat Code Created Successfully."); //Snippet in Master.blade.php
        return redirect()->route('nationals.index');
       
    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $national = National::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($national == null || count($national) == 0) {
            return redirect()->intended('/nationals');
        }

        return view('nationals/show', ['national' => $national]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $national = National::find($id);
        return view('nationals/edit', ['national' => $national]);
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
       
        $national = National::findOrFail($id);
        $constraints = [
            'national_threat_code' => 'required',
            'national_threat_code_description'=> 'required',
            'national_threat_code_description_fr'=> 'required'
            
            ];
       
        
        
        
        
       
        $input = [
            'national_threat_code' => $request['national_threat_code'],
            'national_threat_code_description' => $request['national_threat_code_description'],
            'national_threat_code_description_fr' => $request['national_threat_code_description_fr']
        ];
        
      
        $this->validate($request, $constraints);
        National::where('id', $id)
            ->update($input);
        
        //return redirect()->intended('/nationals');
        Session::flash('flash_message', "National Threat Code Updated Successfully."); //Snippet in Master.blade.php
        return redirect()->route('nationals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        National::where('id', $id)->delete();
        //return redirect()->intended('/nationals');
        return redirect()->route('nationals.index');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'national_threat_code' => 'required|unique:national_threat_codes',
        'national_threat_code_description' => 'required',
        'national_threat_code_description_fr' => 'required',
        
    ]);
    }
}

