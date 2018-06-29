<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Observation;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;


class ObservationController extends Controller
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
    $permission_key = "observation_view";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
    if($getpermissionstatus==0)
    return redirect()->route('user-management.unauthorized');      
    $observation = Observation::all()->toArray();
    return view('observations.index', compact('observation'));
    
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
        $permission_key = "observation_add";
        $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
        if($getpermissionstatus==0)
        return redirect()->route('user-management.unauthorized');
        return view('observations/create');
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
     Observation::create([
            'observation_code' => $request['observation_code'],
            'code_description' => $request['code_description'],
            'code_description_fr' => $request['code_description_fr'],
            'created_by'=>$request['created_by']

        ]);

    Session::flash('flash_message', "Observation Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('observation.index');

    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $observations = Observation::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($observations == null || count($observations) == 0) {
            //return redirect()->intended('/water');
        }

        return view('observations/show', ['observation' => $observations]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $observartions = Observation::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
       if ($observartions == null || count($observartions) == 0) {
           
        }

        return view('observations/edit', ['observartion' => $observartions]);
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
       
        $observartions = Observation::findOrFail($id);
        $constraints = [
            'observation_code' => 'required',
            'code_description'=> 'required',
            'code_description_fr'=> 'required',
            
            ];
       
        
        
        
        
       
        $input = [
            'observation_code' => $request['observation_code'],
            'code_description' => $request['code_description'],
            'code_description_fr' => $request['code_description_fr']
          
        ];
        
      
        $this->validate($request, $constraints);
        Observation::where('id', $id)
            ->update($input);
        
      
    Session::flash('flash_message', "Observation  Updated Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('observation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     Observation::where('id', $id)->delete();
     return redirect()->route('observation.index');   
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'observation_code' => 'required|unique:observation',
        'code_description' => 'required',
        'code_description_fr' => 'required',
      
        
    ]);
    }
}

