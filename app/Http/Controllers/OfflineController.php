<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Offline;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Distribution;
class OfflineController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/taxons';

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
    $permission_key = "offline_view";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);   
    if($getpermissionstatus==0)
    return redirect()->route('user-management.unauthorized');    
    //$offline = Offline::all()->toArray();
     $offline = DB::table('distributions_offline')->select('*','distributions_offline.id as id')->leftjoin('taxons','taxons.id','distributions_offline.taxon_id')->leftjoin('methods','methods.id','distributions_offline.method_id')
            ->leftjoin('gazetteers','gazetteers.id','distributions_offline.gazetteer_id')->leftjoin('observers','observers.id','distributions_offline.observer_id')->leftjoin('species','species.id','distributions_offline.specie_id')->get();
    
    return view('offline.index', compact('offline'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
    return view('offline/create');
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
     Taxon::create([
            'taxon_code' => $request['taxon_code'],
            'taxon_code_description' => $request['taxon_code_description']
            
        ]);

     //return back()->with('success', 'Product has been added');
    Session::flash('flash_message', "Taxon Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('taxons.index');
    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
         $taxons = Taxon::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($taxons == null || count($taxons) == 0) {
            return redirect()->intended('/taxons');
        }

        return view('taxons.show', ['taxons' => $taxons]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taxon = Taxon::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($taxon == null || count($taxon) == 0) {
            return redirect()->intended('/taxons');
        }

        return view('taxons.edit', ['taxon' => $taxon]);
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
       
        $taxon = Taxon::findOrFail($id);
        $constraints = [
            'taxon_code' => 'required',
            'taxon_code_description'=> 'required',
            
            ];
       
        
        
        
        
       
        $input = [
            'taxon_code' => $request['taxon_code'],
            'taxon_code_description' => $request['taxon_code_description']
        ];
        
        if ($request['password'] != null && strlen($request['password']) > 0) {
            $constraints['password'] = 'required|min:6|confirmed';
            $input['password'] =  bcrypt($request['password']);
        }
        $this->validate($request, $constraints);
        Taxon::where('id', $id)
            ->update($input);
        
        //return redirect()->intended('/taxons');
        return redirect()->route('taxons.index');
    }

    public function statusUpdate($id)
   {

    $tablename=$_REQUEST['tablename'];
  
   $sql=DB::table($tablename)->where('id',$id)->first();

      if($sql->status==0)
      {
     
      $var = $sql=DB::table($tablename)->where('id',$id)->first();
      $var->status=1;
      DB::table($tablename)->where('id', $id)->update(array('status' => $var->status)); 
      
      echo "1";
     }else
      {
      $status=  $sql->status;
      $var =  $sql=DB::table($tablename)->where('id',$id)->first();
      $var->status=0;
       DB::table($tablename)->where('id', $id)->update(array('status' => $var->status));
      echo "0";
      }
   }
    
    
    
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bulk(Request $request)
    {
        
        $this->validate($request, [
            'id' => 'required',
        ]);
        
   //print_r($request->all());
        if($request->add=="add"){
            $ids = $request->id;
            $ids = $request->id; 
            $var = $sql=DB::table("distributions_offline")->whereIn('id',$ids)->get();
            foreach($var as $data){
                //echo '<pre>';
               //print_r($data);
               //die;
                //echo $data->taxon_id.'</br>';
                
                Distribution::create(
                        [
                            'taxon_id' => $data->taxon_id,
                            'selectioncriteria' => $data->selectioncriteria,
                            'specie_id' => $data->specie_id,
                            'specie_data' => $data->specie_data,
                            'method_id' => $data->method_id,
                            'observation_id' => $data->observation_id,
                            'gazetteer_id' => $data->gazetteer_id,
                            'day' => $data->day,
                            'month' => $data->month,
                            'year' => $data->year,
                            'number' => $data->number,
                            'observer_id' => $data->observer_id,
                            'age_id' => $data->age_id,
                            'abundance_id' => $data->abundance_id,
                            'specimendata' => $data->specimendata,
                            'specimencode' => $data->specimencode,
                            'collectorinstitution' => $data->collectorinstitution,
                            'Sex' => $data->Sex,
                            'remark' => $data->remark
                            
            
            
                        ]);

     DB::table('distributions_offline')->whereIn('id',$ids)->delete();
      
            }}else{
        $ids = $request->id;    
        DB::table("distributions_offline")->whereIn('id',$ids)->delete();
        
            
        }
    return redirect()->back();
    Session::flash('flash_message', "Distribution Created Successfully."); //Snippet in Master.blade.php 
        
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'taxon_code' => 'required|unique:taxons',
        'taxon_code_description' => 'required'
        
    ]);
    }
}

