<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Migration;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;


class MigrationController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/migrations';

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
    $permission_key = "migration_view";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
    if($getpermissionstatus==0)
    return redirect()->route('user-management.unauthorized');      
    $migrations = Migration::all()->toArray();
    return view('migrations.index', compact('migrations'));
    
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
        $permission_key = "migration_add";
        $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
        if($getpermissionstatus==0)
        return redirect()->route('user-management.unauthorized');    
        return view('migrations/create');
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
     Migration::create([
            'migration_title' => $request['migration_title'],
            'birds_migrating_population' => $request['birds_migrating_population'],
            'birds_migrating_population_fr' => $request['birds_migrating_population_fr'],
            'created_by'=>$request['created_by']
            
        ]);
    Session::flash('flash_message', "Migration Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('migration.index');
    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $migrations = Migration::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($migrations == null || count($migrations) == 0) {
            return redirect()->intended('/migration');
        }

        return view('migrations/show', ['migrations' => $migrations]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $migrations = Migration::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($migrations == null || count($migrations) == 0) {
            return redirect()->intended('/migration');
        }

        return view('migrations/edit', ['migrations' => $migrations]);
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
       
        $migrations = Migration::findOrFail($id);
        $constraints = [
            'migration_title' => 'required',
            'birds_migrating_population'=> 'required',
            'birds_migrating_population_fr'=> 'required'
            
            ];
       
        
        
        
        
       
        $input = [
            'migration_title' => $request['migration_title'],
            'birds_migrating_population' => $request['birds_migrating_population'],
            'birds_migrating_population_fr' => $request['birds_migrating_population_fr']
        ];
        
      
        $this->validate($request, $constraints);
        Migration::where('id', $id)
            ->update($input);
        
    Session::flash('flash_message', "Migration updated Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('migration.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Migration::where('id', $id)->delete();
        return redirect()->route('migration.index');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'migration_title' => 'required|unique:migration_tbl',
        'birds_migrating_population' => 'required',
        'birds_migrating_population_fr' => 'required'
        
    ]);
    }
}

