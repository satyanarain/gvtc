<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Report;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;
error_reporting(0);
class ReportController extends Controller
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
    $permission_key = "download_report";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
        //print_r($getpermissionstatus);die;
    if($getpermissionstatus==0)
    return redirect()->route('user-management.unauthorized');   
    $distribution = DB::table('distributions')->select('*','distributions.id as id','distributions.status as status')->leftjoin('taxons','taxons.id','distributions.taxon_id')->leftjoin('methods','methods.id','distributions.method_id')
            ->leftjoin('gazetteers','gazetteers.id','distributions.gazetteer_id')->leftjoin('observers','observers.id','distributions.observer_id')->leftjoin('species','species.id','distributions.specie_id')->leftjoin('observation','observation.id','distributions.observation_id')
            ->leftjoin('ages','ages.id','distributions.age_id')->leftjoin('abundances','abundances.id','distributions.abundance_id')->leftjoin('protected_areas','protected_areas.id','gazetteers.protected_area_id')->get();
    
    return view('report.index', compact('distribution'));  
    
    
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
      //  CONCAT( full_name, ':', IF (ship_to='shipping', shipping_address, business_address )) as    contact FROM TableName
        $observerrecodsql = DB::table('observers')->selectRaw('id, CONCAT(first_name," ",last_name) as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');             
                
       $taxonrecodsql = DB::table('taxons')->selectRaw('id, CONCAT(taxon_code_description," ","(",taxon_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');    
       $methodrecodsql = DB::table('methods')->selectRaw('id, CONCAT(code_description," ","(",method_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');    
      
       $agerecodsql = DB::table('ages')->selectRaw('id, CONCAT(code_description," ","(",age_group,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');    
       $observationrecodsql = DB::table('observation')->selectRaw('id, CONCAT(code_description," ","(",observation_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');    
       $abundancerecodsql = DB::table('abundances')->selectRaw('id, CONCAT(code_description," ","(",abundance_group,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');    
       $gazetteerrecodsql= DB::table('gazetteers')->orderBy('id','ASC')->pluck('place','id');
       $specierecodsql= DB::table('species')->orderBy('id','ASC')->pluck('specienewid','id');
       return view('distributions/create',compact('taxonrecodsql','methodrecodsql','observationrecodsql','observerrecodsql','gazetteerrecodsql','agerecodsql','abundancerecodsql','specierecodsql'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    
    public function store(Request $request)
    {
     //$this->validateInput($request);
    $inpute= $request->all();
    $specieid=$request['specie_id'];
    $specie_arra= explode('|',$specieid);   
    $inpute['specie_id']=$specie_arra[0];
    $inpute['specie_data']=$specie_arra[1];
    Distribution::create($inpute);
     
    Session::flash('flash_message', "Distribution Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('distribution.index');
     }
    
      
    public function speciecRecord($taxon_id){
        
      $genus=$_REQUEST['genus'];
     if($genus=='genus'){
        $sql=DB::table('species')->where('taxon_id',$taxon_id)->get();
        echo '<label for="MethodID" class="">Species</label>';
        echo '<select class="form-control" required="required" id="species_record" name="specie_id">';
        echo '<option selected="selected" value="">Select Species</option>';
       foreach($sql as $v){
           ?>
            <option value="<?php echo $v->id; ?>|<?php echo $v->genus; ?> / <?php echo $v->species; ?> / <?php echo $v->subspecies; ?>"><?php echo $v->genus; ?> / <?php echo $v->species; ?> / <?php echo $v->subspecies; ?></option>
         <?php }
      echo ' </select> ';
     }else{
         
         
        $sql=DB::table('species')->where('taxon_id',$taxon_id)->get();
        echo '<label for="MethodID" class="">Species</label>';
        echo '<select class="form-control" required="required" id="species_record" name="specie_id">';
        echo '<option selected="selected" value="">Select Species</option>';
       foreach($sql as $v){
           ?>
            <option value="<?php echo $v->id; ?>|<?php echo $v->common_name; ?>"><?php echo $v->common_name; ?></option>
         <?php }
      echo ' </select> ';
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
     
     $distribution = Distribution::find($id);
    return view('distributions.show',compact('distribution'));
    
        
    }       

       

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $taxonrecodsql = DB::table('taxons')->selectRaw('id, CONCAT(taxon_code_description," ","(",taxon_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');    
     $methodrecodsql = DB::table('methods')->selectRaw('id, CONCAT(code_description," ","(",method_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');    
     $observerrecodsql = DB::table('observers')->selectRaw('id, CONCAT(first_name," ",last_name) as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');    
     $agerecodsql = DB::table('ages')->selectRaw('id, CONCAT(code_description," ","(",age_group,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');    
     $observationrecodsql = DB::table('observation')->selectRaw('id, CONCAT(code_description," ","(",observation_code,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');    
     $abundancerecodsql = DB::table('abundances')->selectRaw('id, CONCAT(code_description," ","(",abundance_group,")") as full_name')->WHERE('status','=',1)->pluck('full_name', 'id');    
     $gazetteerrecodsql= DB::table('gazetteers')->orderBy('id','ASC')->pluck('place','id');   
        
        
        $distribution = Distribution::find($id);
       //return view('distributions/edit', ['distribution' => $distribution]); 
        return view('distributions.edit',compact('distribution','taxonrecodsql','methodrecodsql','observationrecodsql','observerrecodsql','gazetteerrecodsql','agerecodsql','abundancerecodsql','specierecodsql'));

       
       
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
      
    $distribution = Distribution::findOrFail($id);
      //$this->validate($request, $constraints);
         $specieid=$request['specie_id'];
    $specie_arra= explode('|',$specieid);  
    //print_r($specie_arra);die;
  $inpute=  $request->all();
  $inpute['specie_id']=$specie_arra[0];
  
  if(count($specie_arra)>1){
  $inpute['specie_data']=$specie_arra[1]; 
  }
 $distribution->fill($inpute)->save();
 return redirect()->route('distribution.index');
    
    
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     Gazetteer::where('id', $id)->delete();
     return redirect()->route('gazetteer.index');   
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'place' => 'required',
       'datum' =>'required',   
      'longitude' => 'required',
       'latitude' => 'required',
        
     
        
    ]);
    }
}
  
