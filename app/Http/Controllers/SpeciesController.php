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
        
     $user_id=Auth::id();
     $role=Auth::user()->role;
     $permission_key = "species_view";
     $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
        //print_r($getpermissionstatus);die;
     if($getpermissionstatus==0)
     return redirect()->route('user-management.unauthorized'); 
     $speciesn = Species::latest()->count();

    return view('species.index', compact('speciesn'));    
        
        
       
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
       $taxonrecodsql_fr = DB::table('taxons')->selectRaw('id, CONCAT(taxon_code_description_fr," ","(",taxon_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $iucnrecodsql = DB::table('iucn_threats')->selectRaw('id, CONCAT(iucn_code_description," ","(",iucn_threat_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $iucnrecodsql_fr = DB::table('iucn_threats')->selectRaw('id, CONCAT(iucn_code_description_fr," ","(",iucn_threat_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $rangerecordsql = DB::table('ranges')->selectRaw('id, CONCAT(range_within_the_albertine_rift," ","(",range_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $growthrecordsql = DB::table('growths')->selectRaw('id, CONCAT(plants_growth_form," ","(",growth_form,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $growthrecordsql_fr = DB::table('growths')->selectRaw('id, CONCAT(plants_growth_form_fr," ","(",growth_form,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $waterusesql = DB::table('wateruse')->selectRaw('id, CONCAT(water_habitat_usage," ","(",water_use,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $waterusesql_fr = DB::table('wateruse')->selectRaw('id, CONCAT(water_habitat_usage_fr," ","(",water_use,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $endemismsql = DB::table('endenisms')->selectRaw('id, CONCAT(endenism_status," ","(",endenism,")") as full_name')->WHERE('status','=',1)->WHERE('status','=',1)->pluck('full_name', 'id');
       $endemismsql_fr = DB::table('endenisms')->selectRaw('id, CONCAT(endenism_status_fr," ","(",endenism,")") as full_name')->WHERE('status','=',1)->WHERE('status','=',1)->pluck('full_name', 'id');
       $migrationsql = DB::table('migration_tbl')->selectRaw('id, CONCAT(birds_migrating_population," ","(",migration_title,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $migrationsql_fr = DB::table('migration_tbl')->selectRaw('id, CONCAT(birds_migrating_population_fr," ","(",migration_title,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $forestusesql = DB::table('forestuse')->selectRaw('id, CONCAT(forest_habitat_usage," ","(",forest_use,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $forestusesql_fr = DB::table('forestuse')->selectRaw('id, CONCAT(forest_habitat_usage_fr," ","(",forest_use,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $nationalusesql = DB::table('national_threat_codes')->selectRaw('id, CONCAT(national_threat_code_description," ","(",national_threat_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $nationalusesql_fr = DB::table('national_threat_codes')->selectRaw('id, CONCAT(national_threat_code_description_fr," ","(",national_threat_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $breedingusesql = DB::table('breedings')->selectRaw('id, CONCAT(breeding_description," ","(",breeding_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');       
       $breedingusesql_fr = DB::table('breedings')->selectRaw('id, CONCAT(breeding_description_fr," ","(",breeding_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $last_species= Species::latest()->first();
       $last_speciesid= $last_species['id']+1;
       //print_r($taxonrecodsql);
        return view('species/create',compact('taxonrecodsql','taxonrecodsql_fr','breedingusesql','breedingusesql_fr','breedingusesql_fr','iucnrecodsql','iucnrecodsql_fr','nationalusesql','nationalusesql_fr','rangerecordsql','growthrecordsql','growthrecordsql_fr','forestusesql','forestusesql_fr','waterusesql','waterusesql_fr','endemismsql','endemismsql_fr','migrationsql','migrationsql_fr','last_speciesid'));
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
    
       public function bulkUpload(Request $request) {

        return view('species.bulkupload');
    }
    
public function bulkCreat(Request $request) {
     if ($request->hasFile('documents1')) {
            $filename = $_FILES['documents1']['name'];
            $handle = fopen($_FILES['documents1']['tmp_name'], "r");
            $flag = true;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $speciessql = DB::table('species')->select('*')->get()->last();
            $spid=$speciessql->id;
            $spids=$spid+1;
            
//                echo '<pre>';                // echo $data;
//                // print_r($data);
//                // echo $data[1];
//                 //echo $data[2];
//                // echo $data[13];
//                 
//                     //print_r($arrvar);
//                 die;
                if ($flag) {
                    $flag = false;
                    continue;
                }
                $taxon_id = '0';
                if ($data[1]) {
                    $sql = DB::table('taxons')->select('*')->where('taxon_code', $data[1])->get()->first();
                    if (count($sql))
                        $taxon_id = $sql->id;
                }
                $specieslastid='GVTCSP'.$spids;
                $order = $data[3];
                $family = utf8_encode($data[4]);
                $genus = $data[5];
                $species = utf8_encode($data[6]);
                $species_author = utf8_encode($data[7]);
                $subspecies = $data[8];
                $subspecies_author = $data[9];
                $common_name = $data[10];
                $common_name_fr = $data[11];
                $iucn_threat_id = '0';
                if($data[12]){
                    $sql12 = DB::table('iucn_threats')->select('*')->where('iucn_threat_code', $data[12])->get()->first();
                    if (count($sql12))
                        $iucn_threat_id = $sql12->id;
                    
                }
                $range_id = '0';
                if($data[13]){
                  $arra=explode(",",$data[13]);
                     $arrvar='';
                    foreach($arra as $k){
                     $sql13 = DB::table('ranges')->select('*')->where('range_code', $k)->get()->first();
                    $arrvar.= $sql13->id.',';
                    
                     }
                      
                    
                    
                    
//                    $sql13 = DB::table('ranges')->select('*')->where('range_code', $data[13])->get()->first();
//                    if (count($sql13))
//                        $range_id = $sql13->id;
                    
                }
                $growth_id='0';
                if($data[14]){
                    $sql14 = DB::table('growths')->select('*')->where('growth_form', $data[14])->get()->first();
                    if (count($sql14))
                        $growth_id = $sql14->id;
                    
                }
                $forestuse_id='0';
                if($data[15]){
                    $sql15 = DB::table('forestuse')->select('*')->where('forest_use', $data[15])->get()->first();
                    if (count($sql15))
                        $forestuse_id = $sql15->id;
                    
                }
                $wateruse_id='0';
                if($data[16]){
                    $sql16 = DB::table('wateruse')->select('*')->where('water_habitat_usage', $data[16])->get()->first();
                    if (count($sql16))
                        $wateruse_id = $sql16->id;
                    
                }
                 $endenisms_id='0';
                if($data[17]){
                    $sql17 = DB::table('endenisms')->select('*')->where('endenism', $data[17])->get()->first();
                    if (count($sql17))
                        $endenisms_id = $sql17->id;
                    
                }
                $migration_id='0';
                if($data[18]){
                    $sql18 = DB::table('migration_tbl')->select('*')->where('migration_title', $data[18])->get()->first();
                    if (count($sql18))
                        $migration_id = $sql18->id;
                  
                }
                $national_id='0';
                if($data[19]){
                    $sql19 = DB::table('national_threat_codes')->select('*')->where('national_threat_code', $data[19])->get()->first();
                    if (count($sql19))
                        $national_id = $sql19->id;
                  
                }
                $breedings_id='0';
                
                if($data[20]){
                    $sql20 = DB::table('breedings')->select('*')->where('breeding_code', $data[20])->get()->first();
                    if (count($sql20))
                        $breedings_id = $sql20->id;
                  
                }
                
                
                DB::table('species')->insert(array('taxon_id' => $taxon_id,
                    'specienewid' => $specieslastid,
                    'order' => $order,
                    'family' => $family,
                    'genus' => $genus,
                    'species' => $species,
                    'species_author' => $species_author,
                    'subspecies' => $subspecies,
                    'subspecies_author' =>$subspecies_author,
                    'common_name' => $common_name,
                    'common_name_fr' => $common_name_fr,
                    'iucn_threat_id' => $iucn_threat_id,
                    'range_id' => rtrim($arrvar),
                    'growth_id' =>$growth_id,
                    'forestuse_id' => $forestuse_id,
                    'wateruse_id' => $wateruse_id,
                    'endenisms_id' => $endenisms_id,
                    'migration_tbl_id' =>$migration_id,
                    'national_threat_code_id' => $national_id,
                    'breeding_id' => $breedings_id,
                    'status' => 1,
                    'created_by' => Auth::id()
                ));
            }
            
    
      Session::flash('flash_message', "Species Uploded Successfully."); //Snippet in Master.blade.php
        }else {
            Session::flash('flash_message', "There is no file to upload."); //Snippet in Master.blade.php
        }
     
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
        
    $species = DB::table('species')->select('*','species.id as id')
            ->leftjoin('taxons','species.taxon_id','=','taxons.id')
            ->leftjoin('ranges','ranges.id','=','species.range_id')
            ->leftjoin('migration_tbl','migration_tbl.id','=','migration_tbl_id')
            ->leftjoin('endenisms','endenisms.id','=','endenisms_id')
            ->leftjoin('wateruse','wateruse.id','=','wateruse_id')
            ->leftjoin('forestuse','forestuse.id','=','forestuse_id')
            ->leftjoin('iucn_threats','iucn_threats.id','=','iucn_threat_id')
            ->leftjoin('breedings','breedings.id','=','breeding_id')
            ->leftjoin('national_threat_codes','national_threat_codes.id','=','national_threat_code_id')
            ->leftjoin('growths','growths.id','=','growth_id')
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
       $taxonrecodsql = DB::table('taxons')->selectRaw('id, CONCAT(taxon_code_description," ","(",taxon_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $iucnrecodsql = DB::table('iucn_threats')->selectRaw('id, CONCAT(iucn_code_description," ","(",iucn_threat_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $rangerecordsql = DB::table('ranges')->selectRaw('id, CONCAT(range_within_the_albertine_rift," ","(",range_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $growthrecordsql = DB::table('growths')->selectRaw('id, CONCAT(plants_growth_form," ","(",growth_form,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $waterusesql = DB::table('wateruse')->selectRaw('id, CONCAT(water_habitat_usage," ","(",water_use,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $endemismsql = DB::table('endenisms')->selectRaw('id, CONCAT(endenism_status," ","(",endenism,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $migrationsql = DB::table('migration_tbl')->selectRaw('id, CONCAT(birds_migrating_population," ","(",migration_title,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $forestusesql = DB::table('forestuse')->selectRaw('id, CONCAT(forest_habitat_usage," ","(",forest_use,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $nationalusesql = DB::table('national_threat_codes')->selectRaw('id, CONCAT(national_threat_code_description," ","(",national_threat_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $breedingusesql = DB::table('breedings')->selectRaw('id, CONCAT(breeding_description," ","(",breeding_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $breedingusesql_fr = DB::table('breedings')->selectRaw('id, CONCAT(breeding_description_fr," ","(",breeding_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $taxonrecodsql_fr = DB::table('taxons')->selectRaw('id, CONCAT(taxon_code_description_fr," ","(",taxon_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $iucnrecodsql_fr = DB::table('iucn_threats')->selectRaw('id, CONCAT(iucn_code_description_fr," ","(",iucn_threat_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $growthrecordsql_fr = DB::table('growths')->selectRaw('id, CONCAT(plants_growth_form_fr," ","(",growth_form,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $waterusesql_fr = DB::table('wateruse')->selectRaw('id, CONCAT(water_habitat_usage_fr," ","(",water_use,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $endemismsql_fr = DB::table('endenisms')->selectRaw('id, CONCAT(endenism_status_fr," ","(",endenism,")") as full_name')->WHERE('status','=',1)->WHERE('status','=',1)->pluck('full_name', 'id');
       $migrationsql_fr = DB::table('migration_tbl')->selectRaw('id, CONCAT(birds_migrating_population_fr," ","(",migration_title,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $forestusesql_fr = DB::table('forestuse')->selectRaw('id, CONCAT(forest_habitat_usage_fr," ","(",forest_use,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
       $nationalusesql_fr = DB::table('national_threat_codes')->selectRaw('id, CONCAT(national_threat_code_description_fr," ","(",national_threat_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');
      return view('species.edit',compact('taxonrecodsql_fr','iucnrecodsql_fr','growthrecordsql_fr','waterusesql_fr','endemismsql_fr','migrationsql_fr','forestusesql_fr','nationalusesql_fr','specie','nationalusesql','breedingusesql','breedingusesql_fr','taxonrecodsql','iucnrecodsql','rangerecordsql','growthrecordsql','forestusesql','waterusesql','endemismsql','migrationsql')); 
        
       //return view('species.edit',compact('specie','breedingusesql_fr','nationalusesql','breedingusesql','taxonrecodsql','iucnrecodsql','rangerecordsql','growthrecordsql','forestusesql','waterusesql','endemismsql','migrationsql')); 
        
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
        'breeding_id' => $request['breeding_id'],
        'national_threat_code_id' => $request['national_threat_code_id']    
          
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

