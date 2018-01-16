<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Water;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;


class WaterController extends Controller
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
    $waters = Water::all()->toArray();
    return view('water-use.index', compact('waters'));
    
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('water-use/create');
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
     Water::create([
            'water_use' => $request['water_use'],
            'water_habitat_usage' => $request['water_habitat_usage']

        ]);

    Session::flash('flash_message', "Forest Use Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('water.index');

    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $waters = Water::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($waters == null || count($waters) == 0) {
            return redirect()->intended('/water');
        }

        return view('water-use/show', ['waters' => $waters]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $waters = Water::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
       if ($waters == null || count($waters) == 0) {
            return redirect()->intended('/water');
        }

        return view('water-use/edit', ['waters' => $waters]);
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
       
        $water = Water::findOrFail($id);
        $constraints = [
            'water_use' => 'required',
            'water_habitat_usage'=> 'required'
            
            ];
       
        
        
        
        
       
        $input = [
            'water_use' => $request['water_use'],
            'water_habitat_usage' => $request['water_habitat_usage']
          
        ];
        
      
        $this->validate($request, $constraints);
        Water::where('id', $id)
            ->update($input);
        
      
    Session::flash('flash_message', "Forest Use Updated Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('water.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     Water::where('id', $id)->delete();
     return redirect()->route('water.index');   
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'water_use' => 'required|unique:wateruse',
        'water_habitat_usage' => 'required'
      
        
    ]);
    }
}

