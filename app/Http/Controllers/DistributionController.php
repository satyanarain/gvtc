<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Distribution;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;

error_reporting(0);
class DistributionController extends Controller
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
        //set permission
        $user_id=Auth::id();
        $role=Auth::user()->role;
        $permission_key = "distribution_view";
        $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
        //print_r($getpermissionstatus);die;
        if($getpermissionstatus==0)
            return redirect()->route('user-management.unauthorized');
            //return view('error.index');          
    $distribution = DB::table('distributions')->select('*','distributions.id as id','distributions.status as status')->leftjoin('taxons','taxons.id','distributions.taxon_id')->leftjoin('methods','methods.id','distributions.method_id')
            ->leftjoin('gazetteers','gazetteers.id','distributions.gazetteer_id')->leftjoin('observers','observers.id','distributions.observer_id')->leftjoin('species','species.id','distributions.specie_id')->Where('distributions.status',1)->get();
    
    return view('distributions.index', compact('distribution'));  
    
    
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
        $permission_key = "distribution_add";
        $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
        //print_r($getpermissionstatus);die;
        if($getpermissionstatus==0)
            return redirect()->route('user-management.unauthorized');    
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
     
     
     public function bulkUpload(Request $request){
         
     return view('distributions.bulkupload');
     }
     
     public function bulkCreat(Request $request){
        
         
          if ($request->hasFile('documents1')){
             //$filename=$_FILES['documents1']['name'];    
             $handle = fopen($_FILES['documents1']['tmp_name'], "r");
             $flag = true;
             
             while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//                echo '<pre>';                 echo $data;
//                 print_r($data);
//                 echo $data[1];
//                 die;
            if($flag)
                  { $flag = false; continue; }  
              $taxon_id = '0';
              if($data[1])
              {
                $sql = DB::table('taxons')->select('*')->where('taxon_code',$data[1])->get()->first();
                if(count($sql))
                $taxon_id = $sql->id;
              }
              
              $method_id='0';
              if($data[5]){
               $sql5 = DB::table('methods')->select('*')->where('code_description',$data[5])->get()->first();
               if(count($sql5))
               $method_id= $sql5->id;
              }
              $observation_id='0';
              if($data[6]){
               $sql6 = DB::table('observation')->select('*')->where('code_description',$data[6])->get()->first();
               if(count($sql6))
                   $observation_id= $sql6->id;
              }
              //place
              $gazetteer_id='0';
              if($data[7]){
               $sql7 = DB::table('gazetteers')->select('*')->where('place',$data[7])->get()->first();
               if(count($sql7))
                $gazetteer_id= $sql7->id;
              } 
             $observer_id='0';  
             if($data[12]!=''){
               $sql12 = DB::table('observers')->select('*')->where('last_name',$data[12])->get()->first();
               if(count($sql12))
                $observer_id= $sql12->id;
              } 
              $age_id='0';
              if($data[13]){
               $sql13 = DB::table('ages')->select('*')->where('code_description',$data[13])->get()->first();
               if(count($sql13))
                $age_id= $sql13->id;
              } 
              $abundance_id='0';
              if($data[14]){
               $sql14 = DB::table('abundances')->select('*')->where('code_description',$data[14])->get()->first();
               if(count($sql14))
                $abundance_id= $sql14->id;
              }
              //$data[21]=Auth::id();
             // echo '<pre>';
              //$specimendata = ($data[15])?$data[15]:0;
               DB::table('distributions')->insert(array('taxon_id' => $taxon_id,
                                                        'selectioncriteria'=>($data[2])?$data[2]:'',
                                                        'specie_id'=>($data[3])?$data[3]:'',
                                                        'specie_data'=>($data[4])?$data[4]:'',
                                                        'method_id' => $method_id,
                                                        'observation_id' => $observation_id,
                                                        'gazetteer_id'=>$gazetteer_id,
                                                        'day'=>($data[8])?$data[8]:'',
                                                        'month'=>($data[9])?$data[9]:'',
                                                        'year'=>($data[10])?$data[10]:'',
                                                        'number'=>($data[11])?$data[11]:'',
                                                        'observer_id'=>$observer_id,
                                                        'age_id'=>$age_id,
                                                        'abundance_id'=>$abundance_id,
                                                        'specimendata'=>($data[15])?$data[15]:0,
                                                        'specimencode'=>($data[16])?$data[16]:'',
                                                        'collectorinstitution'=>($data[17])?$data[17]:'',
                                                        'Sex'=>($data[18])?$data[18]:'',
                                                        'remark'=>($data[19])?$data[19]:'',
                                                        'status'=>1,
                                                        'created_by'=>Auth::id()
        
                       ));
              
                    
                   
                    
                
              
               }
              
          
    }
     Session::flash('flash_message', "Distribution Uploded Successfully."); //Snippet in Master.blade.php
    return redirect()->route('distribution.index');
    
     }
      
    public function speciecRecord($taxon_id){
        
       $genus=$_REQUEST['genus'];
     if($genus=='genus'){
        $sql=DB::table('species')->where('taxon_id',$taxon_id)->get();
        if(Session::get('language_val')=="en"){
        echo '<label for="MethodID" class="control-label">Species</label>';
        }else{
             echo '<label for="MethodID" class="control-label">Espèces</label>';
        }
        echo '<select class="form-control" required="required" id="species_record" name="specie_id">';
        echo '<option selected="selected" value="">Select Species</option>';
       foreach($sql as $v){
           ?>
            <option value="<?php echo $v->id; ?>|<?php echo $v->genus; ?> / <?php echo $v->species; ?> / <?php echo $v->subspecies; ?>"><?php echo $v->genus; ?> / <?php echo $v->species; ?> / <?php echo $v->subspecies; ?></option>
         <?php }
      echo ' </select> ';
      
     }else if($genus=='commonname'){
         $sqlcomman=DB::table('species')->where('taxon_id',$taxon_id)->get();
         //echo $taxon_id;
        
        //print_r($sql1);
         
         if(Session::get('language_val')=="en"){
        echo '<label for="MethodID" class="control-label">Species</label>';
        }else{
             echo '<label for="MethodID" class="control-label">Espèces</label>';
        }
       
      
//       echo '<pre>';
//       print_r($sqlcomman);
//       echo '</pre>';
//       die;
        echo '<select class="form-control" required="required" id="species_record" name="specie_id">';
        echo '<option selected="selected" value="">Select Species</option>';
       foreach($sqlcomman as $vc){
           if($vc->common_name){
           ?>
           
            <option value="<?php echo $vc->id; ?>|<?php echo $vc->common_name; ?>"><?php echo $vc->common_name; ?></option>
            
           <?php }}
      echo ' </select> ';
     }else{
         
         $sql2=DB::table('species')->where('taxon_id',$taxon_id)->get();
         if(Session::get('language_val')=="en"){
        echo '<label for="MethodID" class="control-label">Species</label>';
        }else{
             echo '<label for="MethodID" class="control-label">Espèces</label>';
        }
        echo '<select class="form-control" required="required" id="species_record" name="specie_id">';
        echo '<option selected="selected" value="">Select Species</option>';
       foreach($sql2 as $vf){
           ?>
            <option value="<?php echo $vf->id; ?>|<?php echo $vf->common_name_fr; ?>"><?php echo $vf->common_name_fr; ?></option>
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
     
     //Distribution::where('id', $id)->delete();
        $q = "UPDATE distributions SET status= '0' WHERE id=$id ";
        DB::update(DB::raw($q));
     return redirect()->route('distribution.index');   
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
  