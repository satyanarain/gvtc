<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Forest;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;


class ForestController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/protected-areas';

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
    $permission_key = "forestuse_view";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
    if($getpermissionstatus==0)
    return redirect()->route('user-management.unauthorized');
    $forests = Forest::all()->toArray();
    return view('forest.index', compact('forests'));
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
        $permission_key = "forestuse_add";
        $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
        if($getpermissionstatus==0)
        return redirect()->route('user-management.unauthorized');
        return view('forest/create');
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
     Forest::create([
            'forest_use' => $request['forest_use'],
            'forest_habitat_usage' => $request['forest_habitat_usage'],
            'created_by'=>$request['created_by']

        ]);

       
    Session::flash('flash_message', "Forest Use Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('forest.index');
    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $forests = Forest::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($forests == null || count($forests) == 0) {
            return redirect()->intended('/forest');
        }

        return view('forest/show', ['forests' => $forests]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $forests = Forest::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
       if ($forests == null || count($forests) == 0) {
            return redirect()->intended('/forest');
        }

        return view('forest/edit', ['forests' => $forests]);
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
       
        $range = Forest::findOrFail($id);
        $constraints = [
            'forest_use' => 'required',
            'forest_habitat_usage'=> 'required'
            
            ];
       
        
        
        
        
       
        $input = [
            'forest_use' => $request['forest_use'],
            'forest_habitat_usage' => $request['forest_habitat_usage']
          
        ];
        
      
        $this->validate($request, $constraints);
        Forest::where('id', $id)
            ->update($input);
    Session::flash('flash_message', "Forest Use Updated Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('forest.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Forest::where('id', $id)->delete();
        return redirect()->route('forest.index');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'forest_use' => 'required|unique:forestuse',
        'forest_habitat_usage' => 'required'
      
        
    ]);
    }
}

