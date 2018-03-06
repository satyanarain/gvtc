<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Breeding;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
class BreedingController extends Controller
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
    $breeding = Breeding::all()->toArray();
    return view('breeding.index', compact('breeding'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('breeding/create');
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
     Breeding::create([
            'breeding_code' => $request['breeding_code'],
            'breeding_description' => $request['breeding_description']
            
        ]);

     //return back()->with('success', 'Product has been added');
    Session::flash('flash_message', "Breeding Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('breeding.index');
    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
         $breedings = Breeding::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($breedings == null || count($breedings) == 0) {
            return redirect()->intended('/breedings');
        }

        return view('breeding.show', ['breedings' => $breedings]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breeding = Breeding::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($breeding == null || count($breeding) == 0) {
            return redirect()->intended('/$breeding');
        }

        return view('breeding.edit', ['breeding' => $breeding]);
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
       
        $breding = Breeding::findOrFail($id);
        $constraints = [
            'breeding_code' => 'required',
            'breeding_description'=> 'required',
            
            ];
       
        
        
        
        
       
        $input = [
            'breeding_code' => $request['breeding_code'],
            'breeding_description' => $request['breeding_description']
        ];
        
        
        $this->validate($request, $constraints);
        Breeding::where('id', $id)->update($input);
        
        //return redirect()->intended('/taxons');
        return redirect()->route('breeding.index');
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
        'breeding_code' => 'required',
        'breeding_description' => 'required|unique:breedings'
        
    ]);
    }
}

