<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Gazetteer;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;


class GazetteerController extends Controller
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
    $species = Species::all()->toArray();
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
        return view('gazetteers/create',compact('taxonrecodsql','iucnrecodsql','rangerecordsql','growthrecordsql','forestusesql','waterusesql','endemismsql','migrationsql'));
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
     Gazetteer::create([
         
        'countrie_id' => $request['countrie_id'],
        'place' => $request['place'],
        'details' => $request['details'],
        'eastings' => $request['eastings'],
        'northings' => $request['northings'],
        'zone'=>$request['zone'],
        'datum' => $request['datum'],
        'longitude' => $request['longitude'],
        'latitude' => $request['latitude'],
        'day' => $request['day'],
        'month' => $request['month'],
        'year' => $request['year'],
        'habitat' => $request['habitat'],
        'altitude' => $request['altitude'],
        'endenisms_id' => $request['endenisms_id'],
        'aspect' => $request['aspect'],
        'soil' => $request['soil'],
        'protected_area_id' => $request['protected_area_id'],
        'adminunit_id' => $request['adminunit_id'],
        'remarks' => $request['remarks'],

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
         $species = Species::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($species == null || count($species) == 0) {
            return redirect()->intended('/species');
        }
        //$species = Species::with(['taxon'])->find($id);
        //echo '<pre>';
        //print_r($species);
        //die;
        return view('species/show', ['species' => $species]);
        
        
    }       

       

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $waters = Water::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
       if ($waters == null || count($waters) == 0) {
            return redirect()->intended('/water');
        }

        return view('water-use/edit', ['waters' => $waters]);
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
       
        $water = Water::findOrFail($id);
        $constraints = [
            'water_use' => 'required',
            'water_habitat_usage'=> 'required'
            
            ];
       
        
        
        
        
       
        $input = [
            'water_use' => $request['water_use'],
            'water_habitat_usage' => $request['water_habitat_usage']
          
        ];
        
      
        $this->validate($request, $constraints);
        Water::where('id', $id)
            ->update($input);
        
      
    Session::flash('flash_message', "Forest Use Updated Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('water.index');
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
        'countrie_id' => 'required',
        'place' => 'required',
        'details' => 'required',
       'eastings' => 'required',
       'northings' => 'required',
        'zone' => 'required', 
         'datum' =>'required',   
      'longitude' => 'required',
       'latitude' => 'required',
        'day' => 'required',
      'month' => 'required',
      'year' => 'required',
       'forestuse_id' => 'required',
       'wateruse_id' => 'required',
       'endenisms_id' => 'required',
       'migration_tbl_id' => 'required'
     
        
    ]);
    }
}
  