<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ProtectedArea;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;


class ProtectedAreaController extends Controller
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
    // $taxons = Taxon::paginate(100);
    //return view('taxons/index', ['taxons' => $taxons]);
    $protectedareas = ProtectedArea::all()->toArray();
    return view('protected-areas.index', compact('protectedareas'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('protected-areas/create');
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
     ProtectedArea::create([
            'protected_area_name' => $request['protected_area_name'],
            'country' => $request['country'],
            'protected_area_code' => $request['protected_area_code']
            
        ]);
    Session::flash('flash_message', "Protected Areas Code Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('protected-area.index');
    
    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $protectedarea = ProtectedArea::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($protectedarea == null || count($protectedarea) == 0) {
            return redirect()->intended('/protected-area');
        }

        return view('protected-areas/show', ['protectedarea' => $protectedarea]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $protectedarea = ProtectedArea::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
       if ($protectedarea == null || count($protectedarea) == 0) {
            return redirect()->intended('/protected-area');
        }

        return view('protected-areas/edit', ['protectedarea' => $protectedarea]);
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
       
        $range = ProtectedArea::findOrFail($id);
        $constraints = [
            'protected_area_name' => 'required',
            'country'=> 'required',
            'protected_area_code'=> 'required',
        
            
            ];
       
        
        
        
        
       
        $input = [
            'protected_area_name' => $request['protected_area_name'],
            'country' => $request['country'],
            'protected_area_code' => $request['protected_area_code']
        ];
        
      
        $this->validate($request, $constraints);
        ProtectedArea::where('id', $id)
            ->update($input);
        
        
        
    Session::flash('flash_message', "Protected Areas  Code Updated Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('protected-area.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProtectedArea::where('id', $id)->delete();
        return redirect()->route('protected-area.index');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'protected_area_name' => 'required',
        'country' => 'required',
        'protected_area_code' => 'required',
       
        
    ]);
    }
}

