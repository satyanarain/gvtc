<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Taxon;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
class TaxonController extends Controller
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
    $taxons = Taxon::all()->toArray();
    return view('taxons.index', compact('taxons'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taxons/create');
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
     Taxon::create([
            'taxon_code' => $request['taxon_code'],
            'taxon_code_description' => $request['taxon_code_description']
            
        ]);

     //return back()->with('success', 'Product has been added');
    Session::flash('flash_message', "Taxon Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('taxons.index');
    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
         $taxons = Taxon::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($taxons == null || count($taxons) == 0) {
            return redirect()->intended('/taxons');
        }

        return view('taxons.show', ['taxons' => $taxons]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taxon = Taxon::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($taxon == null || count($taxon) == 0) {
            return redirect()->intended('/taxons');
        }

        return view('taxons.edit', ['taxon' => $taxon]);
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
       
        $taxon = Taxon::findOrFail($id);
        $constraints = [
            'taxon_code' => 'required',
            'taxon_code_description'=> 'required',
            
            ];
       
        
        
        
        
       
        $input = [
            'taxon_code' => $request['taxon_code'],
            'taxon_code_description' => $request['taxon_code_description']
        ];
        
        if ($request['password'] != null && strlen($request['password']) > 0) {
            $constraints['password'] = 'required|min:6|confirmed';
            $input['password'] =  bcrypt($request['password']);
        }
        $this->validate($request, $constraints);
        Taxon::where('id', $id)
            ->update($input);
        
        //return redirect()->intended('/taxons');
        return redirect()->route('taxons.index');
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
        'taxon_code' => 'required|unique:taxons',
        'taxon_code_description' => 'required'
        
    ]);
    }
}

