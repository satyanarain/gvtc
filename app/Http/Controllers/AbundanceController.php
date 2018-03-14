<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Abundance;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;


class AbundanceController extends Controller
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
    $permission_key = "abundance_view";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);   
    $abundance = Abundance::all()->toArray();
    return view('abundances.index', compact('abundance'));
    
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('abundances/create');
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
     Abundance::create([
            'abundance_group' => $request['abundance_group'],
            'code_description' => $request['code_description']

        ]);

    Session::flash('flash_message', "Abundance Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('abundance.index');

    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $abundances = Abundance::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($abundances == null || count($abundances) == 0) {
            //return redirect()->intended('/water');
        }

        return view('abundances/show', ['abundances' => $abundances]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abundances = Abundance::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
       if ($abundances == null || count($abundances) == 0) {
           
        }

        return view('abundances/edit', ['abundances' => $abundances]);
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
       
        $abundances = Abundance::findOrFail($id);
        $constraints = [
            'abundance_group' => 'required',
            'code_description'=> 'required'
            
            ];
       
        
        
        
        
       
        $input = [
            'abundance_group' => $request['abundance_group'],
            'code_description' => $request['code_description']
          
        ];
        
      
        $this->validate($request, $constraints);
        Abundance::where('id', $id)
            ->update($input);
        
      
    Session::flash('flash_message', "Abundance  Updated Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('abundance.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     Abundance::where('id', $id)->delete();
     return redirect()->route('abundance.index');   
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'abundance_group' => 'required|unique:abundances',
        'code_description' => 'required',
      
        
    ]);
    }
}

