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
use App\Distribution;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Lang;




//error_reporting(0);
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
    $users = Distribution::latest()->count();
    return view('report.index', compact('users'));

    
    
   }

   public function UploadReport(){
       $user_id=Auth::id();
       $role=Auth::user()->role;
       $permission_key = "upload_report_view";
       $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
       if($getpermissionstatus==0)
        return redirect()->route('user-management.unauthorized');   
       $reportresult=DB::table('report')->select('*','report.status as status','report.id as id','report.created_at as created_at')
               ->leftjoin('report_categories','report.report_categories_id','report_categories.id')
               ->orderBy('report.order','ASC')->get();
     // print_r($reportresult);
     // die;
       return view('report.upload_report',compact('reportresult'));  
   }
   
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
     
       $reportcargorysql= DB::table('report_categories')->orderBy('id','ASC')->where('status','1')->pluck('title','id');
       $reportcargorysql_fr= DB::table('report_categories')->orderBy('id','ASC')->where('status','1')->pluck('title_fr','id');
       return view('report/create',compact('reportcargorysql','reportcargorysql_fr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    
    public function store(Request $request)
    {
        
       // $img = Input::file('uploded_report');        echo '<pre>';print_r($img);
        //Storage::disk('local')->put('report_document/kk.pdf', file_get_contents($img->getRealPath()));die;
         //ini_set('memory_limit','256M');
   //$file_name = $request->file('uploded_report');
//        ini_set("memory_limit", "-1");
//        ini_set("upload_max_filesize", "-1");
//        ini_set("post_max_size", "-1");
        //upload_max_filesize = 40m
        //post_max_size = c
     // die;
     //print_r($request->all());die;
      $this->validateInput($request);
      $filereport='';
      if ((Input::hasFile('uploded_report'))) {

           $destinationPath = public_path('report_document');
           $extension = Input::file('uploded_report')->getClientOriginalExtension();
           $filereport = uniqid() . '_gvtcreport.'.$extension;
           Input::file('uploded_report')->move($destinationPath, $filereport);
           
       }
       
     Report::create([
            'report_title' => $request['report_title'],
            'report_categories_id' => $request['report_categories_id'],
            'uploded_report' => $filereport,
            'created_by'=>$request['created_by']
            
            
        ]);
    Session::flash('flash_message', "Report Uploaded Successfully."); //Snippet in Master.blade.php 
     return  redirect('report/uploadreport');  
     }
    



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
//     $distribution = Distribution::find($id);
//    return view('distributions.show',compact('distribution'));
      //$reportresult=DB::table('report')->select('*')->leftjoin('report_categories','report.report_categories_id','report_categories.id','report.status as status')->where('report.status',1)->get();
      
      
       $reportresult=DB::table('report')->select('*','report.status as status','report.id as id','report.created_at as created_at')
               ->leftjoin('report_categories','report.report_categories_id','report_categories.id')
               ->orderBy('report.id','DESC')->where('report.status',1)->Where('report.id',$id)->first();
      
      
      
      return view('report.show',compact('reportresult'));  
      
      
      
        
    }       

       

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $reportcargorysql= DB::table('report_categories')->orderBy('id','ASC')->where('status','1')->pluck('title','id');
    $reportcargorysql_FR= DB::table('report_categories')->orderBy('id','ASC')->where('status','1')->pluck('title_fr','id');
    $reportval= Report::find($id);
    return view('report.edit',compact('reportval','reportcargorysql'));
     }
    
    /** report view */
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $reaportval = Report::findOrFail($id);
    $constraints = [
            'report_title' => 'required',
            'report_categories_id'=> 'required'
            ];
     $this->validate($request, $constraints);
    $filereport=$request['edituploded_report'];
    
      if ((Input::hasFile('uploded_report'))) {

           $destinationPath = public_path('report_document');
           $extension = Input::file('uploded_report')->getClientOriginalExtension();
           $filereport = uniqid() . '_useridproof.'.$extension;
           Input::file('uploded_report')->move($destinationPath, $filereport);
           
       }
       
      $input = [
            'report_title' => $request['report_title'],
            'report_categories_id' => $request['report_categories_id'],
            'uploded_report' => $filereport,
        ];
        

        Report::where('id', $id) ->update($input);
     
    
    
   
   
    return  redirect('report/uploadreport');
    
    
    
    }
    
    
     public function showbulkrecord() {
 
        $requestData= $_REQUEST;
        $columns = array( 
        // datatable column index  => database column name
                0 =>'distributions.id',
        //	1 =>'distributions.specie_id', 
        //	2 => 'distributions.id',
        //	4=> 'distributions.method_id',
        //        5=> 'distributions.day'	
        );
        //die('dd');
        $sql = "SELECT taxons.taxon_code,distributions.taxon_id,species.species,gazetteers.aspect,gazetteers.protected_area_id,gazetteers.adminunit_id,gazetteers.soil,gazetteers.slope,gazetteers.details,gazetteers.eastings,gazetteers.northings,gazetteers.zone,gazetteers.datum,gazetteers.datum_dd,gazetteers.longitude,gazetteers.latitude,gazetteers.altitude,"
                . "observers.tittle,observers.first_name,observers.last_name,observers.institution,species.specienewid,species.order,species.family,species.genus,species.species_author,species.subspecies,species.subspecies_author,species.common_name,species.common_name_fr,species.iucn_threat_id,species.range_id,species.growth_id,species.forestuse_id,species.wateruse_id,species.endenisms_id,species.migration_tbl_id,species.national_threat_code_id,species.breeding_id,distributions.specie_id,"
                . "distributions.id,distributions.method_id,distributions.day as distributionsday,distributions.method_id,methods.method_code,methods.code_description as method_description,selectioncriteria,distributions.month as month ,distributions.year as year,number,distributions.abundance_id,abundances.abundance_group,specimencode,collectorinstitution,distributions.observation_id,observation.observation_code,observation.code_description,distributions.gazetteer_id,gazetteers.place,distributions.observer_id,observers.last_name,observers.institution,distributions.age_id,ages.age_group,distributions.Sex as distributionsex,distributions.remark,distributions.habitat ";
$sql.=" FROM distributions LEFT JOIN taxons on taxons.id=distributions.taxon_id LEFT JOIN species on species.id=distributions.specie_id  LEFT JOIN methods on methods.id=distributions.method_id LEFT JOIN  abundances ON abundances.id=distributions.abundance_id LEFT JOIN observation on  observation.id=distributions.observation_id LEFT JOIN gazetteers ON gazetteers.id=distributions.gazetteer_id LEFT JOIN observers ON observers.id=distributions.observer_id LEFT JOIN ages ON  ages.id=distributions.age_id  WHERE distributions.status=1";
//print_r($sql);die;




if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND (taxons.taxon_code LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR species.species LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR distributions.habitat LIKE '".$requestData['search']['value']."%'";
	$sql.=" OR methods.method_code LIKE '".$requestData['search']['value']."%'";
	$sql.=" OR methods.code_description LIKE '".$requestData['search']['value']."%'";
	$sql.=" OR observation.observation_code LIKE '".$requestData['search']['value']."%'";
	$sql.=" OR observation.code_description LIKE '".$requestData['search']['value']."%'";
	$sql.=" OR gazetteers.place LIKE '".$requestData['search']['value']."%'";
	$sql.=" OR observers.last_name LIKE '".$requestData['search']['value']."%' )";
}
//print_r($sql);
//die;
//$query=mysqli_query($conn, $sql) or die("data.php: get employees");
$query=DB::select(DB::raw($sql) ); 
//print_r($query);
//die;
$totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$totalData = count($query);
//echo $columns[$requestData['order'][0]['column']];
//echo $requestData['order'][0]['dir'];
//die;
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
//print_r($sql);
//die;
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$query = DB::select( DB::raw($sql) ); 
//$row=mysqli_fetch_array($query);
//echo '<pre>';
//print_r($query);
//die;
$data = array();

foreach($query as $val){
    
   //echo '<pre>'; 
  //print_r($val);
    
        $id = $val->id;
        $nestedData=array(); 
	$nestedData[] = $val->taxon_code;
	$nestedData[] = $val->species;
	$nestedData[] = $val->method_description.'('.$val->method_code.')';
	$nestedData[] = $val->code_description."(".$val->observation_code.")";
	$nestedData[] = $val->place;
        $nestedData[] = $val->distributionsday;
        $nestedData[] = $val->month;
        $nestedData[] = $val->year;
        $nestedData[] = $val->number;
        $nestedData[] = $val->last_name .$val->institution;
        $nestedData[] = $val->age_group;
        $nestedData[] = $val->abundance_group;
        $nestedData[] = $val->specimencode;
        $nestedData[] = $val->collectorinstitution;
        $nestedData[] = $val->distributionsex;
        $nestedData[] = $val->remark;
        $nestedData[] = $val->habitat;
        $nestedData[] = $val->specienewid;
        $nestedData[] = $val->order;
        $nestedData[] = $val->family;
        $nestedData[] = $val->genus;
        $nestedData[] = $val->species_author;
        $nestedData[] = $val->subspecies;
        $nestedData[] = $val->subspecies_author;
        $nestedData[] = $val->common_name;
        $nestedData[] = $val->common_name_fr;
        $nestedData[] = $val->iucn_threat_id;
        $nestedData[] = $val->range_id;
        $nestedData[] = $val->growth_id;
        $nestedData[] = $val->forestuse_id;
        $nestedData[] = $val->wateruse_id;
        $nestedData[] = $val->endenisms_id;
        $nestedData[] = $val->migration_tbl_id;
        $nestedData[] = $val->national_threat_code_id;
        $nestedData[] = $val->breeding_id;
        $nestedData[] = $val->details;
        $nestedData[] = $val->longitude;
        $nestedData[] = $val->latitude;
        $nestedData[] = $val->datum_dd;
        $nestedData[] = $val->zone;
        $nestedData[] = $val->eastings;
        $nestedData[] = $val->northings;
        $nestedData[] = $val->datum;
        $nestedData[] = $val->altitude;
        $nestedData[] = $val->slope;
        $nestedData[] = $val->aspect;
        $nestedData[] = $val->soil;
        $nestedData[] = $val->protected_area_id;
        $nestedData[] = $val->adminunit_id;
        $nestedData[] = $val->tittle;
        $nestedData[] = $val->first_name;
        $nestedData[] = $val->last_name;
        $nestedData[] = $val->institution;
//        
//        
//        
//        
//        
//        $nestedData[] = $val->latitude;
//        
        
        
        
       
	
	$data[] = $nestedData;
    
    
    
    
}
//echo $val->taxon_code;
//die;
$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);
echo $datajson = json_encode($json_data);  // send data as json format

        
        
        
        
        
        
        
        
        
       
        
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
        'report_title' => 'required|unique:report',
        'report_categories_id'=>'required',    
        'uploded_report' => 'required'
        
    ]);
    }
    
    
        public function updateOrder(Request $request)
    {
   
        $tasks = Report::all();
  foreach ($tasks as $task) {
          //  $task->timestamps = false; // To disable update_at field updation
            $id = $task->id;
          //  $request->order;
            

            foreach ($request->order as $order) {
                if ($order['id'] == $id) {
                    $task->update(['order' => $order['position']]);
                }
            }
        }
        
        return response('Update Successfully.', 200);
    }
    
    
}
  