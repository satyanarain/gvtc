<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Growth;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;


class GrowthController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/growths';

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
    $permission_key = "growthform_view";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
    if($getpermissionstatus==0)
    return redirect()->route('user-management.unauthorized');
    $growths = Growth::all()->toArray();
    return view('growths.index', compact('growths'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('growths/create');
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
     Growth::create([
            'growth_form' => $request['growth_form'],
            'plants_growth_form' => $request['plants_growth_form']
            
        ]);

    Session::flash('flash_message', "Designation Code Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('growth.index');

    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $growth = Growth::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($growth == null || count($growth) == 0) {
            return redirect()->intended('/growths');
        }

        return view('growths/show', ['growth' => $growth]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $growth = Growth::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
       if ($growth == null || count($growth) == 0) {
            return redirect()->intended('/growths');
        }

        return view('growths/edit', ['growth' => $growth]);
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
       
        $range = Growth::findOrFail($id);
        $constraints = [
            'growth_form' => 'required',
            'plants_growth_form'=> 'required',
            
            ];
       
        
        
        
        
       
        $input = [
            'growth_form' => $request['growth_form'],
            'plants_growth_form' => $request['plants_growth_form']
        ];
        
      
        $this->validate($request, $constraints);
        Growth::where('id', $id)
            ->update($input);
        
        
        Session::flash('flash_message', "Designation Code Updated Successfully."); //Snippet in Master.blade.php 
        return redirect()->route('growth.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Growth::where('id', $id)->delete();
        return redirect()->route('growth.index');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'growth_form' => 'required|unique:growths',
        'plants_growth_form' => 'required'
        
    ]);
    }
}

