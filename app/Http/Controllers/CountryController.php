<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Country;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;


class CountryController extends Controller
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
    $permission_key = "country_view";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
    if($getpermissionstatus==0)
    return redirect()->route('user-management.unauthorized');
    $countries = Country::all()->toArray();
    return view('countries.index', compact('countries'));
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
    $permission_key = "country_add";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
    if($getpermissionstatus==0)
    return redirect()->route('user-management.unauthorized');
    $countries = Country::all()->toArray();
        return view('countries/create');
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
     Country::create([
            'range_code' => $request['range_code'],
            'range_within_albertine_rift' => $request['range_within_albertine_rift'],
            'range_within_albertine_rift_fr' => $request['range_within_albertine_rift_fr'],
            'created_by'=>$request['created_by']

        ]);

    Session::flash('flash_message', "Country Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('country.index');
    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $countries = Country::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($countries == null || count($countries) == 0) {
            return redirect()->intended('/country');
        }

        return view('countries/show', ['countries' => $countries]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
       if ($countries == null || count($countries) == 0) {
            return redirect()->intended('/country');
        }

        return view('countries/edit', ['countries' => $countries]);
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
       
        $range = Country::findOrFail($id);
        $constraints = [
            'range_code' => 'required',
            'range_within_albertine_rift'=> 'required',
            'range_within_albertine_rift_fr'=> 'required',
            
            ];
       
        
        
        
        
       
        $input = [
            'range_code' => $request['range_code'],
            'range_within_albertine_rift' => $request['range_within_albertine_rift'],
            'range_within_albertine_rift_fr' => $request['range_within_albertine_rift_fr'],
          
        ];
        
      
        $this->validate($request, $constraints);
        Country::where('id', $id)
            ->update($input);
        
        Session::flash('flash_message', "Updated Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Country::where('id', $id)->delete();
        return redirect()->route('country.index');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'range_code' => 'required|unique:countries',
        'range_within_albertine_rift' => 'required',
        'range_within_albertine_rift_fr' => 'required'
      
        
    ]);
    }
}

