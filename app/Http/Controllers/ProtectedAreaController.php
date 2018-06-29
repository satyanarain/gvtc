<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ProtectedArea;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;


class ProtectedAreaController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/protected-areas';

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
    $permission_key = "protectedarea_view";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
    if($getpermissionstatus==0)
    return redirect()->route('user-management.unauthorized');
      $protectedareas = DB::table('protected_areas')->select('*','protected_areas.id as id')->leftjoin('countries','protected_areas.country','=','countries.id')->get(); 
      //print_r($protectedareas);
      //die;
    return view('protected-areas.index', compact('protectedareas'));
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
    $permission_key = "protectedarea_add";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
    if($getpermissionstatus==0)
    return redirect()->route('user-management.unauthorized');
        $countryrecodsql = DB::table('countries')->selectRaw('id, CONCAT(range_within_albertine_rift," ","(",range_code,")") as full_name')->pluck('full_name', 'id');
        return view('protected-areas/create',compact('countryrecodsql'));
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
     ProtectedArea::create([
            'protected_area_name' => $request['protected_area_name'],
            'protected_area_name_fr' => $request['protected_area_name_fr'],
            'country' => $request['country'],
            'protected_area_code' => $request['protected_area_code'],
            'created_by'=>$request['created_by']
            
        ]);
    Session::flash('flash_message', "Protected Areas Code Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('protected-area.index');
    
    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $protectedarea = ProtectedArea::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($protectedarea == null || count($protectedarea) == 0) {
            return redirect()->intended('/protected-area');
        }

        return view('protected-areas/show', ['protectedarea' => $protectedarea]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $protectedarea = ProtectedArea::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
       if ($protectedarea == null || count($protectedarea) == 0) {
            return redirect()->intended('/protected-area');
        }
         $countryrecodsql = DB::table('countries')->selectRaw('id, CONCAT(range_within_albertine_rift," ","(",range_code,")") as full_name')->pluck('full_name', 'id');
        return view('protected-areas/edit', compact('protectedarea','countryrecodsql'));
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
       
        $range = ProtectedArea::findOrFail($id);
        $constraints = [
            'protected_area_name' => 'required',
            'protected_area_name_fr' => 'required',
            'country'=> 'required',
            'protected_area_code'=> 'required',
        
            
            ];
       
        
        
        
        
       
        $input = [
            'protected_area_name' => $request['protected_area_name'],
            'protected_area_name_fr' => $request['protected_area_name_fr'],
            'country' => $request['country'],
            'protected_area_code' => $request['protected_area_code']
        ];
        
      
        $this->validate($request, $constraints);
        ProtectedArea::where('id', $id)
            ->update($input);
        
        
        
    Session::flash('flash_message', "Protected Areas  Code Updated Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('protected-area.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProtectedArea::where('id', $id)->delete();
        return redirect()->route('protected-area.index');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'protected_area_name' => 'required|unique:protected_areas',
        'country' => 'required',
        'protected_area_code' => 'required',
        'protected_area_name_fr' => 'required',
       
        
    ]);
    }
    
     public function protectecarea($id){
         
         $sql=DB::table('protected_areas')->where('country',$id)->WHERE('status','=',1)->get();
         echo '<div class="form-group col-md-6" id="protected_area_select">';
          if (Session::get('language_val') == "en") {
       echo '<label for="ProtectedArea" class="control-label">Protected Area</label>';
          }else{
              
       echo '<label for="ProtectedArea" class="control-label">Zone protégée</label>';        
          }
        echo '<select class="form-control" name="protected_area_id">';
        if (Session::get('language_val') == "en") {
        echo '<option selected="selected" value="">Select Protected Area</option>';
        }else{
         echo '<option selected="selected" value="">Sélectionner une zone protégée</option>';   
        }
       foreach($sql as $v){
           ?>
            <option value="<?php echo $v->id; ?>"><?php echo $v->protected_area_code; ?>(<?php  if (Session::get('language_val') == "en") { echo $v->protected_area_name; }else{ echo $v->protected_area_name_fr; } ?>)</option>
         <?php }
      echo ' </select> ';
      echo '</div>';
    
    }
    
    
}

