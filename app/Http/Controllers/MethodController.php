<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Method;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;


class MethodController extends Controller
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
    $method = Method::all()->toArray();
    return view('methods.index', compact('method'));
    
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('methods/create');
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
     Method::create([
            'method_code' => $request['method_code'],
            'code_description' => $request['code_description']

        ]);

    Session::flash('flash_message', "Method Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('method.index');

    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $method = Method::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($method == null || count($method) == 0) {
            //return redirect()->intended('/water');
        }

        return view('methods/show', ['methods' => $method]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $method = Method::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
       if ($method == null || count($method) == 0) {
           
        }

        return view('methods/edit', ['methods' => $method]);
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
       
        $water = Method::findOrFail($id);
        $constraints = [
            'method_code' => 'required',
            'code_description'=> 'required'
            
            ];
       
        
        
        
        
       
        $input = [
            'method_code' => $request['method_code'],
            'code_description' => $request['code_description']
          
        ];
        
      
        $this->validate($request, $constraints);
        Method::where('id', $id)
            ->update($input);
        
      
    Session::flash('flash_message', "Method  Updated Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('method.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     Method::where('id', $id)->delete();
     return redirect()->route('method.index');   
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'method_code' => 'required|unique:methods',
        'code_description' => 'required',
      
        
    ]);
    }
}

