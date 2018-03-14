<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Iucn;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;


class IucnThreatCodeController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/iucns';

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
    $permission_key = "IUCNThreatCode_view";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
        //print_r($getpermissionstatus);die;
    if($getpermissionstatus==0)
    return redirect()->route('user-management.unauthorized');
    $iucns = Iucn::all()->toArray();
    return view('iucns.index', compact('iucns'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('iucns/create');
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
     Iucn::create([
            'iucn_threat_code' => $request['iucn_threat_code'],
            'iucn_code_description' => $request['iucn_code_description']
            
        ]);
        Session::flash('flash_message', "IUCN Threat Codes Created Successfully."); //Snippet in Master.blade.php
        return redirect()->route('iucns.index');
      
    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $iuncns = Iucn::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($iuncns == null || count($iuncns) == 0) {
            return redirect()->intended('/iucns');
        }

        return view('iucns/show', ['iuncns' => $iuncns]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iucn = Iucn::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($iucn == null || count($iucn) == 0) {
            return redirect()->intended('/iucns');
        }

        return view('iucns/edit', ['iucn' => $iucn]);
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
       
        $iucn = Iucn::findOrFail($id);
        $constraints = [
            'iucn_threat_code' => 'required',
            'iucn_code_description'=> 'required',
            
            ];
       
        
        
        
        
       
        $input = [
            'iucn_threat_code' => $request['iucn_threat_code'],
            'iucn_code_description' => $request['iucn_code_description']
        ];
        
      
        $this->validate($request, $constraints);
        Iucn::where('id', $id)
            ->update($input);
        
        //return redirect()->intended('/iucns');
        Session::flash('flash_message', "IUCN Threat Codes Updated Successfully."); //Snippet in Master.blade.php
        return redirect()->route('iucns.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Iucn::where('id', $id)->delete();
        return redirect()->route('iucns.index');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'iucn_threat_code' => 'required|unique:iucn_threats',
        'iucn_code_description' => 'required'
        
    ]);
    }
}

