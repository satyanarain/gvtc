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
use Auth;
use DataTables;




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
        
      $speciesn = Species::latest()->count();

    return view('species.index', compact('speciesn'));    
        
        
//     $user_id=Auth::id();
//     $role=Auth::user()->role;
//     $permission_key = "species_view";
//     $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
//        //print_r($getpermissionstatus);die;
//        if($getpermissionstatus==0)
//            return redirect()->route('user-management.unauthorized');   
//    $species = DB::table('species')->select('*','species.id as id','species.status as status')->leftjoin('taxons','species.taxon_id','=','taxons.id')->get();
//       
//    return view('species.index', compact('species'));
 
    
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
        $permission_key = "species_add";
        $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
        //print_r($getpermissionstatus);die;
        if($getpermissionstatus==0)
            return redirect()->route('user-management.unauthorized');  
        
       $taxonrecodsql = DB::table('taxons')->selectRaw('id, CONCAT(taxon_code_description," ","(",taxon_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $iucnrecodsql = DB::table('iucn_threats')->selectRaw('id, CONCAT(iucn_code_description," ","(",iucn_threat_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $rangerecordsql = DB::table('ranges')->selectRaw('id, CONCAT(range_within_the_albertine_rift," ","(",range_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $growthrecordsql = DB::table('growths')->selectRaw('id, CONCAT(plants_growth_form," ","(",growth_form,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $waterusesql = DB::table('wateruse')->selectRaw('id, CONCAT(water_habitat_usage," ","(",water_use,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $endemismsql = DB::table('endenisms')->selectRaw('id, CONCAT(endenism_status," ","(",endenism,")") as full_name')->WHERE('status','=',1)->WHERE('status','=',1)->pluck('full_name', 'id');
       $migrationsql = DB::table('migration_tbl')->selectRaw('id, CONCAT(birds_migrating_population," ","(",migration_title,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $forestusesql = DB::table('forestuse')->selectRaw('id, CONCAT(forest_habitat_usage," ","(",forest_use,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $nationalusesql = DB::table('national_threat_codes')->selectRaw('id, CONCAT(national_threat_code_description," ","(",national_threat_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $breedingusesql = DB::table('breedings')->selectRaw('id, CONCAT(breeding_description," ","(",breeding_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       //$iucnrecodsql= DB::table('iucn_threats')->orderBy('id','ASC')->pluck('iucn_threat_code','id');
       //$rangerecordsql=DB::table('ranges')->orderBY('id','ASC')->pluck('range','id');
       //$growthrecordsql=DB::table('growths')->orderBY('id','ASC')->pluck('growth_form','id');
       //$forestusesql=DB::table('forestuse')->orderBY('id','ASC')->pluck('forest_use','id');
       //$waterusesql=DB::table('wateruse')->orderBY('id','ASC')->pluck('water_use','id');
       //$endemismsql=DB::table('endenisms')->orderBY('id','ASC')->pluck('endenism','id');
       //$migrationsql=DB::table('migration_tbl')->orderBY('id','ASC')->pluck('migration_title','id');
       $last_species= Species::latest()->first();
       $last_speciesid= $last_species['id']+1;
       //print_r($taxonrecodsql);
        return view('species/create',compact('taxonrecodsql','breedingusesql','iucnrecodsql','nationalusesql','rangerecordsql','growthrecordsql','forestusesql','waterusesql','endemismsql','migrationsql','last_speciesid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    
    public function store(Request $request)
    {
       if($request['range_id']!='') {
           $range_id= implode(',',$request['range_id']); 
       }else{
           
           $range_id= $request['range_id'];  
       }
    $this->validateInput($request);
    $result =  DB::table('species')->where('genus','=',$request['genus'])->where('species','=',$request['species'])->where('taxon_id','=',$request['taxon_id'])->select('*')->count();
    if($result>0){
        
      $request->session()->flash('success', 'This record already exists.');
        return back();
    }else{
        
        Species::create([
        'taxon_id' => $request['taxon_id'],
        'specienewid' => $request['specienewid'],
        'order' => $request['order'],
        'family' => $request['family'],
        'genus' => $request['genus'],
        'species' => $request['species'],
        'growth_id'=>$request['growth_id'],
        'species_author' => $request['species_author'],
        'subspecies' => $request['subspecies'],
        'subspecies_author' => $request['subspecies_author'],
        'common_name' => $request['common_name'],
        'common_name_fr' => $request['common_name_fr'],
        'iucn_threat_id' => $request['iucn_threat_id'],
        'range_id' =>$range_id,
        'forestuse_id' => $request['forestuse_id'],
        'wateruse_id' => $request['wateruse_id'],
        'endenisms_id' => $request['endenisms_id'],
        'migration_tbl_id' => $request['migration_tbl_id'],
        'breeding_id' => $request['breeding_id'],
        'national_threat_code_id' => $request['national_threat_code_id'],
        'created_by'=>$request['created_by'],    

        ]);
        
       Session::flash('flash_message', "Species Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('species.index'); 
    }
    
     

    

    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    $species = DB::table('species')->select('*','species.id as id')
            ->leftjoin('taxons','species.taxon_id','=','taxons.id')
            ->leftjoin('ranges','ranges.id','=','species.range_id')
            ->where('species.id',$id)->first();
    
   
  // echo   $species->range_id;
        $arr = [$species->range_id];
       $arr = join(",",$arr);
     
        if($arr!=''){
            $result =  DB::select(DB::raw("SELECT * FROM ranges WHERE id IN (".$arr.")")); 
         //  echo "SELECT * FROM ranges  WHERE id= $id ";
         // $result =  DB::select(DB::raw("SELECT * FROM ranges  WHERE id= $id "));   
        }else{
            
            $result=array();
        }
       //$result =  DB::select(DB::raw("SELECT * FROM ranges WHERE id IN (".$arr.")")); 
        //echo '<pre>';
        //print_r($result);
        //die;
        if(count($result)>0)
        {
        foreach($result as $val){
        $range[]= $val->range_code;
        }
        $range= implode(', ',$range);
        } else {
       $range='';
            
        }
        return view('species.show', compact('species','range'));
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
       //$taxonrecodsql= DB::table('taxons')->orderBy('id','ASC')->pluck('taxon_code','id');
       //$iucnrecodsql= DB::table('iucn_threats')->orderBy('id','ASC')->pluck('iucn_threat_code','id');
       //$rangerecordsql=DB::table('ranges')->orderBY('id','ASC')->pluck('range','id');
       //$growthrecordsql=DB::table('growths')->orderBY('id','ASC')->pluck('growth_form','id');
       //$forestusesql=DB::table('forestuse')->orderBY('id','ASC')->pluck('forest_use','id');
       //$waterusesql=DB::table('wateruse')->orderBY('id','ASC')->pluck('water_use','id');
       //$endemismsql=DB::table('endenisms')->orderBY('id','ASC')->pluck('endenism','id');
      // $migrationsql=DB::table('migration_tbl')->orderBY('id','ASC')->pluck('migration_title','id');
       $taxonrecodsql = DB::table('taxons')->selectRaw('id, CONCAT(taxon_code_description," ","(",taxon_code,")") as full_name')->pluck('full_name', 'id');
       $iucnrecodsql = DB::table('iucn_threats')->selectRaw('id, CONCAT(iucn_code_description," ","(",iucn_threat_code,")") as full_name')->pluck('full_name', 'id');
       $rangerecordsql = DB::table('ranges')->selectRaw('id, CONCAT(range_within_the_albertine_rift," ","(",range_code,")") as full_name')->pluck('full_name', 'id');
       $growthrecordsql = DB::table('growths')->selectRaw('id, CONCAT(plants_growth_form," ","(",growth_form,")") as full_name')->pluck('full_name', 'id');
       $waterusesql = DB::table('wateruse')->selectRaw('id, CONCAT(water_habitat_usage," ","(",water_use,")") as full_name')->pluck('full_name', 'id');
       $endemismsql = DB::table('endenisms')->selectRaw('id, CONCAT(endenism_status," ","(",endenism,")") as full_name')->pluck('full_name', 'id');
       $migrationsql = DB::table('migration_tbl')->selectRaw('id, CONCAT(birds_migrating_population," ","(",migration_title,")") as full_name')->pluck('full_name', 'id');
       $forestusesql = DB::table('forestuse')->selectRaw('id, CONCAT(forest_habitat_usage," ","(",forest_use,")") as full_name')->pluck('full_name', 'id');
       $nationalusesql = DB::table('national_threat_codes')->selectRaw('id, CONCAT(national_threat_code_description," ","(",national_threat_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $breedingusesql = DB::table('breedings')->selectRaw('id, CONCAT(breeding_description," ","(",breeding_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       
       return view('species.edit',compact('specie','nationalusesql','breedingusesql','taxonrecodsql','iucnrecodsql','rangerecordsql','growthrecordsql','forestusesql','waterusesql','endemismsql','migrationsql')); 
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   if($request['range_id']==''){
        $range_id= $request['range_id'];
    }else{
       $range_id= implode(',',$request['range_id']); 
    }
       
        $specie = Species::findOrFail($id);
        $constraints = [
        'taxon_id' => 'required',
        'order' => 'required',
        'family' => 'required',
        'genus' => 'required',
        'species' => 'required'];
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
        'common_name_fr' => $request['common_name_fr'],    
        'iucn_threat_id' => $request['iucn_threat_id'],
        'range_id' => $range_id,
        'forestuse_id' => $request['forestuse_id'],
        'wateruse_id' => $request['wateruse_id'],
        'endenisms_id' => $request['endenisms_id'],
        'migration_tbl_id' => $request['migration_tbl_id'],
        'breeding_id' => $request['breedings_id'],
        'national_threat_code_id' => $request['national_threat_codes_id']    
          
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
    

     public function showbulkrecord(){
      

//     $user_id=Auth::id();
//     $role=Auth::user()->role;
//     $permission_key = "species_view";
//     $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
//        //print_r($getpermissionstatus);die;
//        if($getpermissionstatus==0)
//            return redirect()->route('user-management.unauthorized');   
//     
    $species = DB::table('species')->select('*','species.id as id','species.status as status')->leftjoin('taxons','species.taxon_id','=','taxons.id')->get();
   
    
    return DataTables::of($species)->make(true);
}
    
    
   
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

