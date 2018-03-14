<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Range;
use Input;
use Illuminate\Support\Facades\Validator;
use Session;
use Auth;

class RangeController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/ranges';

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
    $permission_key = "range_view";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
        //print_r($getpermissionstatus);die;
    if($getpermissionstatus==0)
    return redirect()->route('user-management.unauthorized');
    $ranges = Range::all()->toArray();
    return view('ranges.index', compact('ranges'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ranges/create');
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
     Range::create([
            'range_code' => $request['range_code'],
            'range_within_the_albertine_rift' => $request['range_within_the_albertine_rift']
            
        ]);

       Session::flash('flash_message', "Range  Created Successfully."); //Snippet in Master.blade.php
        return redirect()->route('ranges.index');

    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $range = Range::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($range == null || count($range) == 0) {
            return redirect()->intended('/ranges');
        }

        return view('ranges/show', ['range' => $range]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $range = Range::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
       if ($range == null || count($range) == 0) {
            return redirect()->intended('/ranges');
        }

        return view('ranges/edit', ['range' => $range]);
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
       
        $range = Range::findOrFail($id);
        $constraints = [
            'range_code' => 'required',
            'range_within_the_albertine_rift'=> 'required',
            
            ];
       
        
        
        
        
       
        $input = [
            'range_code' => $request['range_code'],
            'range_within_the_albertine_rift' => $request['range_within_the_albertine_rift']
        ];
        
      
        $this->validate($request, $constraints);
        RAnge::where('id', $id)
            ->update($input);
        
        
        
         Session::flash('flash_message', "Range  Updated Successfully."); //Snippet in Master.blade.php
        return redirect()->route('ranges.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Range::where('id', $id)->delete();
        return redirect()->route('ranges.index');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'range_code' => 'required|unique:ranges',
        'range_within_the_albertine_rift' => 'required'
        
    ]);
    }
}

