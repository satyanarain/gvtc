<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Species;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;




class SpeciesController extends Controller
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
    $species = DB::table('species')->select('*','species.id as id')->leftjoin('taxons','species.taxon_id','=','taxons.id')->get();
       
    return view('species.index', compact('species'));
 
    
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
       $taxonrecodsql= DB::table('taxons')->orderBy('id','ASC')->pluck('taxon_code','id');
       $iucnrecodsql= DB::table('iucn_threats')->orderBy('id','ASC')->pluck('iucn_threat_code','id');
       $rangerecordsql=DB::table('ranges')->orderBY('id','ASC')->pluck('range','id');
       $growthrecordsql=DB::table('growths')->orderBY('id','ASC')->pluck('growth_form','id');
       $forestusesql=DB::table('forestuse')->orderBY('id','ASC')->pluck('forest_use','id');
       $waterusesql=DB::table('wateruse')->orderBY('id','ASC')->pluck('water_use','id');
       $endemismsql=DB::table('endenisms')->orderBY('id','ASC')->pluck('endenism','id');
       $migrationsql=DB::table('migration_tbl')->orderBY('id','ASC')->pluck('migration_title','id');
       //print_r($taxonrecodsql);
        return view('species/create',compact('taxonrecodsql','iucnrecodsql','rangerecordsql','growthrecordsql','forestusesql','waterusesql','endemismsql','migrationsql'));
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
     Species::create([
         
        'taxon_id' => $request['taxon_id'],
        'order' => $request['order'],
        'family' => $request['family'],
        'genus' => $request['genus'],
        'species' => $request['species'],
        'growth_id'=>$request['growth_id'],
        'species_author' => $request['species_author'],
        'subspecies' => $request['subspecies'],
        'subspecies_author' => $request['subspecies_author'],
        'common_name' => $request['common_name'],
        'iucn_threat_id' => $request['iucn_threat_id'],
        'range_id' => $request['range_id'],
        'forestuse_id' => $request['forestuse_id'],
        'wateruse_id' => $request['wateruse_id'],
        'endenisms_id' => $request['endenisms_id'],
        'migration_tbl_id' => $request['migration_tbl_id']

        ]);

    Session::flash('flash_message', "Species Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('species.index');

    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $species = DB::table('species')->select('*','species.id as id')->leftjoin('taxons','species.taxon_id','=','taxons.id')->where('species.id',$id)->first();
    return view('species.show', compact('species'));
         
        
    }       

       

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
       $specie = Species::find($id);
       $taxonrecodsql= DB::table('taxons')->orderBy('id','ASC')->pluck('taxon_code','id');
       $iucnrecodsql= DB::table('iucn_threats')->orderBy('id','ASC')->pluck('iucn_threat_code','id');
       $rangerecordsql=DB::table('ranges')->orderBY('id','ASC')->pluck('range','id');
       $growthrecordsql=DB::table('growths')->orderBY('id','ASC')->pluck('growth_form','id');
       $forestusesql=DB::table('forestuse')->orderBY('id','ASC')->pluck('forest_use','id');
       $waterusesql=DB::table('wateruse')->orderBY('id','ASC')->pluck('water_use','id');
       $endemismsql=DB::table('endenisms')->orderBY('id','ASC')->pluck('endenism','id');
       $migrationsql=DB::table('migration_tbl')->orderBY('id','ASC')->pluck('migration_title','id');
       return view('species.edit',compact('specie','taxonrecodsql','iucnrecodsql','rangerecordsql','growthrecordsql','forestusesql','waterusesql','endemismsql','migrationsql')); 
        
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
       
        $specie = Species::findOrFail($id);
        $constraints = [
        'taxon_id' => 'required',
        'order' => 'required',
        'family' => 'required',
        'genus' => 'required',
        'species' => 'required'
            
            ];
       
        
        
        
        
       
        $input = [
        'taxon_id' => $request['taxon_id'],
        'order' => $request['order'],
        'family' => $request['family'],
        'genus' => $request['genus'],
        'species' => $request['species'],
        'growth_id'=>$request['growth_id'],
        'species_author' => $request['species_author'],
        'subspecies' => $request['subspecies'],
        'subspecies_author' => $request['subspecies_author'],
        'common_name' => $request['common_name'],
        'iucn_threat_id' => $request['iucn_threat_id'],
        'range_id' => $request['range_id'],
        'forestuse_id' => $request['forestuse_id'],
        'wateruse_id' => $request['wateruse_id'],
        'endenisms_id' => $request['endenisms_id'],
        'migration_tbl_id' => $request['migration_tbl_id']
          
        ];
        
      
        $this->validate($request, $constraints);
        Species::where('id', $id)
            ->update($input);
        
      
    Session::flash('flash_message', "Species Updated Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('species.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     Species::where('id', $id)->delete();
     return redirect()->route('species.index');   
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'taxon_id' => 'required',
        'order' => 'required',
        'family' => 'required',
        'genus' => 'required',
        'species' => 'required'

     
        
    ]);
    }
}

