<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AdminUnit;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;


class AdminUnitController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin-units';

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
    $adminunits = AdminUnit::all()->toArray();
    return view('admin-units.index', compact('adminunits'));
    
     //$protectedareas = ProtectedArea::all()->toArray();
    //return view('protected-areas.index', compact('protectedareas'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-units/create');
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
     AdminUnit::create([
            'country' => $request['country'],
            'admincode' => $request['admincode'],
            'designation' => $request['designation'],
            'name' => $request['name'],
            
        ]);

    Session::flash('flash_message', "Country Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('admin-unit.index');
    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $adminunits = AdminUnit::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($adminunits == null || count($adminunits) == 0) {
            return redirect()->intended('/admin-unit');
        }

        return view('admin-units/show', ['adminunits' => $adminunits]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adminunits = AdminUnit::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
       if ($adminunits == null || count($adminunits) == 0) {
            return redirect()->intended('/admin-unit');
        }

        return view('admin-units/edit', ['adminunits' => $adminunits]);
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
       
        $range = AdminUnit::findOrFail($id);
        $constraints = [
            //'country' => 'required',
            'admincode'=> 'required',
           // 'designation'=> 'required',
          //  'name'=> 'required',
            
            
            ];
       
        
        
        
        
       
        $input = [
            'country' => $request['country'],
            'admincode' => $request['admincode'],
            'designation' => $request['designation'],
            'name' => $request['name']
        ];
        
      
        $this->validate($request, $constraints);
        AdminUnit::where('id', $id)
            ->update($input);
        
        
    Session::flash('flash_message', "Country Updated Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('admin-unit.index');   
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdminUnit::where('id', $id)->delete();
        return redirect()->route('admin-unit.index');   
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        //'country' => 'required|unique:adminunits',
        'admincode' => 'required',
        //'designation' => 'required',
        //'name' => 'required'
        
    ]);
    }
}

