<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AdminUnit;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;


class AdminUnitController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin-units';

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
    $permission_key = "adminunit_view";
    $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
    if($getpermissionstatus==0)
        return redirect()->route('user-management.unauthorized');   
    $adminunits = DB::table('adminunits')->select('*','adminunits.id as id')->leftjoin('countries','adminunits.countrie_id','=','countries.id')->get()->toArray();   
  // print_r($adminunits);
  // die;
    return view('admin-units.index', compact('adminunits'));
    
     //$protectedareas = ProtectedArea::all()->toArray();
    //return view('protected-areas.index', compact('protectedareas'));
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
        $permission_key = "adminunit_add";
        $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
        if($getpermissionstatus==0)
        return redirect()->route('user-management.unauthorized'); 
        $countryrecodsql = DB::table('countries')->selectRaw('id, CONCAT(range_within_albertine_rift," ","(",range_code,")") as full_name')->pluck('full_name', 'id');
        return view('admin-units/create',compact('countryrecodsql'));
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
     AdminUnit::create([
            'countrie_id' => $request['countrie_id'],
            'admincode' => $request['admincode'],
            'name' => $request['name'],
            'name_fr' => $request['name_fr'],
            'created_by'=>$request['created_by']
            
        ]);

    Session::flash('flash_message', "Admin Unit Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('admin-unit.index');
    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $adminunits = AdminUnit::find($id);
         
        $adminunits = DB::table('adminunits')->select('*','adminunits.id as id')
         ->leftjoin('countries','adminunits.countrie_id','=','countries.id')       
        ->where('adminunits.id',$id)->first();;
//print_r($adminunits);
//die;
        return view('admin-units/show', compact('adminunits'));
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        
         $countryrecodsql = DB::table('countries')->selectRaw('id, CONCAT(range_within_albertine_rift," ","(",range_code,")") as full_name')->pluck('full_name', 'id');
        $adminunits = AdminUnit::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
       if ($adminunits == null || count($adminunits) == 0) {
            return redirect()->intended('/admin-unit');
        }

        return view('admin-units/edit', compact('adminunits','countryrecodsql'));
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
       
        $range = AdminUnit::findOrFail($id);
        $constraints = [
          
        'countrie_id' => 'required',
        'admincode' => 'required',
         'name' => 'required'
            
            ];
       
        
        
        
        
       
        $input = [
            'countrie_id' => $request['countrie_id'],
            'admincode' => $request['admincode'],
            'name' => $request['name'],
            'name_fr' => $request['name_fr']
        ];
        
      
        $this->validate($request, $constraints);
        AdminUnit::where('id', $id)
            ->update($input);
        
        
    Session::flash('flash_message', "Admin Unit Updated Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('admin-unit.index');   
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdminUnit::where('id', $id)->delete();
        return redirect()->route('admin-unit.index');   
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'name' => 'required|unique:adminunits',
        'admincode' => 'required',
         'countrie_id' => 'required'  
        //'designation' => 'required',
       
        
    ]);
    }
    
     public function adminunit($id){
         
         $sql=DB::table('adminunits')->where('countrie_id',$id)->get();
         echo '<div class="form-group col-md-6 " id="adminunit_select">';
       echo ' <label for="AdminUnit" class="control-label">Admin Unit</label>';
        echo '<select class="form-control" name="adminunit_id">';
        if (Session::get('language_val') == "en") {
        echo '<option selected="selected" value="">Select Admin Unit</option>';
        }else{
            
            echo '<option selected="selected" value="">Sélectionner une zone protégée</option>';
        }
       foreach($sql as $v){
           ?>
            <option value="<?php echo $v->id; ?>">
                <?php echo $v->admincode; ?>(<?php if (Session::get('language_val') == "en") { echo $v->name;}else{ echo $v->name_fr; } ?>)
            </option>
         <?php }
      echo ' </select> ';
      echo '</div>';
    
    }
    
    
}

