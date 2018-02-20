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
    $gazetteer = DB::table('gazetteers')->select('*','gazetteers.id as id')->leftjoin('countries','gazetteers.country_id','=','countries.id')->get();
   return view('gazetteers.index', compact('gazetteer'));
    
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
       $countryrecodsql= DB::table('countries')->orderBy('id','ASC')->pluck('range','id');
       $protectedrecodsql= DB::table('protected_areas')->orderBy('id','ASC')->pluck('protected_area_name','id');
       $adminunitrecodsql=DB::table('adminunits')->orderBY('id','ASC')->pluck('admincode','id');
       $growthrecordsql=DB::table('growths')->orderBY('id','ASC')->pluck('growth_form','id');
       $forestusesql=DB::table('forestuse')->orderBY('id','ASC')->pluck('forest_use','id');
       $waterusesql=DB::table('wateruse')->orderBY('id','ASC')->pluck('water_use','id');
       $endemismsql=DB::table('endenisms')->orderBY('id','ASC')->pluck('endenism','id');
       $migrationsql=DB::table('migration_tbl')->orderBY('id','ASC')->pluck('migration_title','id');
       $last_gazeteer= Gazetteer::latest()->first();
       $last_gazeteerid= $last_gazeteer['id']+1;
       return view('gazetteers/create',compact('countryrecodsql','protectedrecodsql','adminunitrecodsql','last_gazeteerid'));
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
     $result=DB::table('gazetteers')->where('place','=',$request['place'])->where('longitude','=',$request['longitude'])->where('latitude','=',$request['latitude'])->select('*')->count();
     if($result>0){
      $request->session()->flash('success', 'This record already exists.');
        return back();   
         
     }else{
     Gazetteer::create([
        'country_id' => $request['country_id'],
        'gazeteer_id' => $request['gazeteer_id'],
        'place' => $request['place'],
        'details' => $request['details'],
        'eastings' => $request['eastings'],
        'northings' => $request['northings'],
        'zone'=>$request['zone'],
        'datum' => $request['datum'],
        'datum_dd' => $request['datum_dd'],
        'longitude' => $request['longitude'],
        'latitude' => $request['latitude'],
        'day' => $request['day'],
        'month' => $request['month'],
        'year' => $request['year'],
        'habitat' => $request['habitat'],
        'altitude' => $request['altitude'],
        'aspect' => $request['aspect'],
        'soil' => $request['soil'],
        'slope' => $request['slope'],
        'protected_area_id' => $request['protected_area_id'],
        'adminunit_id' => $request['adminunit_id'],
        'remarks' => $request['remarks'],
        ]);

    Session::flash('flash_message', "Gazetters Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('gazetteer.index');
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
      $gazetteers = DB::table('gazetteers')->select('*','gazetteers.id as id')
              ->leftjoin('countries','gazetteers.country_id','=','countries.id')
              ->leftjoin('protected_areas','gazetteers.protected_area_id','=','protected_areas.id')
              ->leftjoin('adminunits','gazetteers.adminunit_id','=','adminunits.id')
              ->where('gazetteers.id',$id)
              ->first();
       return view('gazetteers.show', compact('gazetteers'));  
        
    }       

       

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countryrecodsql= DB::table('countries')->orderBy('id','ASC')->pluck('range','id');
        $protectedrecodsql= DB::table('protected_areas')->orderBy('id','ASC')->pluck('protected_area_name','id');
        $adminunitrecodsql=DB::table('adminunits')->orderBY('id','ASC')->pluck('name','id');
        $gazetteers = DB::table('gazetteers')->select('*','gazetteers.id as id')
              ->leftjoin('countries','gazetteers.country_id','=','countries.id')
              ->leftjoin('protected_areas','gazetteers.protected_area_id','=','protected_areas.id')
              ->leftjoin('adminunits','gazetteers.adminunit_id','=','adminunits.id')
              ->where('gazetteers.id',$id)
              ->first();
       return view('gazetteers.edit',compact('gazetteers','countryrecodsql','protectedrecodsql','adminunitrecodsql'));  
        
        
//        $waters = Water::find($id);
//        // Redirect to taxon list if updating taxon wasn't existed
//       if ($waters == null || count($waters) == 0) {
//            return redirect()->intended('/water');
//        }
//
//        return view('water-use/edit', ['waters' => $waters]);
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
       
        $water = Gazetteer::findOrFail($id);
        $constraints = [
            'place' => 'required',
            'datum' =>'required',   
            'longitude' => 'required',
            'latitude' => 'required',
            
            ];
       
        
        
        
        
       
        $input = [
        'country_id' => $request['country_id'],
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
        'aspect' => $request['aspect'],
        'soil' => $request['soil'],
        'slope' => $request['slope'],
        'protected_area_id' => $request['protected_area_id'],
        'adminunit_id' => $request['adminunit_id'],
        'remarks' => $request['remarks'],
          
        ];
        
      
        $this->validate($request, $constraints);
        Gazetteer::where('id', $id)
            ->update($input);
        
      
    Session::flash('flash_message', "Forest Use Updated Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('gazetteer.index');
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
       'datum_dd' =>'required',   
      'longitude' => 'required',
       'latitude' => 'required',
        
     
        
    ]);
    }
}
  