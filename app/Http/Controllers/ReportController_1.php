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
use Illuminate\Support\Facades\Storage;
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
    $distribution = DB::table('distributions')->select('*',DB::raw('CONCAT(methods.code_description, " ","(",methods.method_code,")") AS methoddata'),
            DB::raw('CONCAT(observation.code_description, " ","(",observation.observation_code,")") AS observationdata'),
            DB::raw('CONCAT(ages.code_description, " ","(",ages.age_group,")") AS agedata'),
            DB::raw('CONCAT(countries.range_within_albertine_rift, " ","(",countries.range_code,")") AS countrydata'),'distributions.id as id','distributions.day as day','distributions.month as month','distributions.year as year','distributions.status as status')
            ->leftjoin('taxons','taxons.id','distributions.taxon_id')
            ->leftjoin('methods','methods.id','distributions.method_id')
            ->leftjoin('gazetteers','gazetteers.id','distributions.gazetteer_id')
            ->leftjoin('observers','observers.id','distributions.observer_id')
            ->leftjoin('species','species.id','distributions.specie_id')
            ->leftjoin('observation','observation.id','distributions.observation_id')
            ->leftjoin('ages','ages.id','distributions.age_id')
            ->leftjoin('abundances','abundances.id','distributions.abundance_id')
            ->leftjoin('protected_areas','protected_areas.id','gazetteers.protected_area_id')
            ->leftjoin('countries','countries.id','gazetteers.country_id')
            ->leftjoin('breedings','breedings.id','species.breeding_id')
            ->leftjoin('national_threat_codes','national_threat_codes.id','species.national_threat_code_id')
            ->leftjoin('migration_tbl','migration_tbl.id','species.migration_tbl_id')
            ->leftjoin('endenisms','endenisms.id','species.endenisms_id')
            ->leftjoin('wateruse','wateruse.id','species.wateruse_id')
            ->leftjoin('forestuse','forestuse.id','species.forestuse_id')
            ->leftjoin('growths','growths.id','species.growth_id')
            ->leftjoin('ranges','ranges.id','species.range_id')
            ->leftjoin('iucn_threats','iucn_threats.id','species.iucn_threat_id')
            ->orderBy('distributions.id', 'desc')->get();

//    $distribution = DB::table('distributions')->select('*',DB::raw('CONCAT(methods.code_description, " ","(",methods.method_code,")") AS methoddata'),DB::raw('CONCAT(abundances.code_description, " ","(",abundances.abundance_group,")") AS abundancesdata'),DB::raw('CONCAT(observation.code_description, " ","(",observation.observation_code,")") AS observationdata') ,'distributions.id as id', 'distributions.status as status','distributions.day as day','distributions.month as month','distributions.year as year','methods.code_description as method_code_description')
//                        ->leftjoin('taxons', 'taxons.id', 'distributions.taxon_id')
//                        ->leftjoin('methods', 'methods.id', 'distributions.method_id')
//                        ->leftjoin('gazetteers', 'gazetteers.id', 'distributions.gazetteer_id')
//                        ->leftjoin('observers', 'observers.id', 'distributions.observer_id')
//                        ->leftjoin('species', 'species.id', 'distributions.specie_id')
//                        ->leftjoin('abundances', 'abundances.id', 'distributions.abundance_id')
//                        ->leftjoin('observation', 'observation.id', 'distributions.observation_id')
//                        ->leftjoin('ages', 'ages.id', 'distributions.age_id')->get();
    //echo '<pre>';
    //print_r($distribution);
   // die;
    
    return view('report.index', compact('distribution'));  
    
    
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
        $img = Input::file('uploded_report');        echo '<pre>';print_r($img);
        Storage::disk('local')->put('report_document/kk.pdf', file_get_contents($img->getRealPath()));die;
         //ini_set('memory_limit','256M');
   //$file_name = $request->file('uploded_report');
//        ini_set("memory_limit", "-1");
//        ini_set("upload_max_filesize", "-1");
//        ini_set("post_max_size", "-1");
        //upload_max_filesize = 40m
        //post_max_size = c
     // die;
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
    $filereport='';
      if ((Input::hasFile('uploded_report'))) {

           $destinationPath = public_path('report_document');
           $extension = Input::file('uploded_report')->getClientOriginalExtension();
           $filereport = uniqid() . '_useridproof.'.$extension;
           Input::file('uploded_report')->move($destinationPath, $filereport);
           
       }
       
      $input = [
            //'report_title' => $request['report_title'],
            //'report_categories_id' => $request['report_categories_id'],
            //'uploded_report' => $filereport,
        ];
        

        Report::where('id', $id) ->update($input);
     
    
    
   
   
    return  redirect('report/uploadreport');
    
    
    
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
  