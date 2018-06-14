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
use DataTables;
use Lang;

class DistributionController extends Controller {
    
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
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
       
 
      
    
        //DB::raw('group_concat(distinct contacts.email separator ", ") AS contact_emails');
        
         
        
        //echo '<pre>';
       // print_r($distribution);
         
//        $distribution = DB::table('distributions')->select('*', 'distributions.id as id', 'distributions.status as status','distributions.day as day','distributions.month as month','distributions.year as year')
//                        ->leftjoin('taxons', 'taxons.id', 'distributions.taxon_id')
//                        ->leftjoin('methods', 'methods.id', 'distributions.method_id')
//                        ->leftjoin('gazetteers', 'gazetteers.id', 'distributions.gazetteer_id')
//                        ->leftjoin('observers', 'observers.id', 'distributions.observer_id')
//                        ->leftjoin('species', 'species.id', 'distributions.specie_id')
//                        ->leftjoin('abundances', 'abundances.id', 'distributions.abundance_id')
//                        ->leftjoin('observation', 'observation.id', 'distributions.observation_id')
//                        ->leftjoin('ages', 'ages.id', 'distributions.age_id')
//               -> Where('distributions.status', 1)->get();
//        echo '<pre>';
//        print_r($distribution);
        
//         $distribution = DB::table('distributions')->select('*','CONCAT(mcode_description," ","(",methods.method_id,")") as methoddata', 'distributions.id as id', 'distributions.status as status','distributions.day as day','distributions.month as month','distributions.year as year','methods.code_description as method_code_description')
//                        ->leftjoin('taxons', 'taxons.id', 'distributions.taxon_id')
//                        ->leftjoin('methods', 'methods.id', 'distributions.method_id')
//                        ->leftjoin('gazetteers', 'gazetteers.id', 'distributions.gazetteer_id')
//                        ->leftjoin('observers', 'observers.id', 'distributions.observer_id')
//                        ->leftjoin('species', 'species.id', 'distributions.specie_id')
//                        ->leftjoin('abundances', 'abundances.id', 'distributions.abundance_id')
//                        ->leftjoin('observation', 'observation.id', 'distributions.observation_id')
//                        ->leftjoin('ages', 'ages.id', 'distributions.age_id')->get();
//        
//         echo '<pre>';
//        print_r($distribution);
        
          //set permission
        $user_id=Auth::id();
        $role=Auth::user()->role;
        $permission_key = "distribution_view";
        $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
        //print_r($getpermissionstatus);die;
        if($getpermissionstatus==0)
            return redirect()->route('user-management.unauthorized');
        
        
        $users = Distribution::latest()->count();

        return view('distributions.index', compact('users'));

        //set permission
//        $user_id=Auth::id();
//        $role=Auth::user()->role;
//        $permission_key = "distribution_view";
//        $getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
//        //print_r($getpermissionstatus);die;
//        if($getpermissionstatus==0)
//            return redirect()->route('user-management.unauthorized');
//            //return view('error.index');
//    $distribution = DB::table('distributions')->select('*','distributions.id as id','distributions.status as status')->leftjoin('taxons','taxons.id','distributions.taxon_id')->leftjoin('methods','methods.id','distributions.method_id')
//            ->leftjoin('gazetteers','gazetteers.id','distributions.gazetteer_id')->leftjoin('observers','observers.id','distributions.observer_id')->leftjoin('species','species.id','distributions.specie_id')->Where('distributions.status',1)->get();
//
//    return view('distributions.index', compact('distribution'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $user_id = Auth::id();
        $role = Auth::user()->role;
        $permission_key = "distribution_add";
        $getpermissionstatus = getpermissionstatus($user_id, $role, $permission_key);
        //print_r($getpermissionstatus);die;
        if ($getpermissionstatus == 0)
            return redirect()->route('user-management.unauthorized');
        //  CONCAT( full_name, ':', IF (ship_to='shipping', shipping_address, business_address )) as    contact FROM TableName
        $observerrecodsql = DB::table('observers')->selectRaw('id, CONCAT(first_name," ",last_name) as full_name')->WHERE('status', '=', 1)->pluck('full_name', 'id');

        $taxonrecodsql = DB::table('taxons')->selectRaw('id, CONCAT(taxon_code_description," ","(",taxon_code,")") as full_name')->WHERE('status', '=', 1)->pluck('full_name', 'id');
        $methodrecodsql = DB::table('methods')->selectRaw('id, CONCAT(code_description," ","(",method_code,")") as full_name')->WHERE('status', '=', 1)->pluck('full_name', 'id');

        $agerecodsql = DB::table('ages')->selectRaw('id, CONCAT(code_description," ","(",age_group,")") as full_name')->WHERE('status', '=', 1)->pluck('full_name', 'id');
        $observationrecodsql = DB::table('observation')->selectRaw('id, CONCAT(code_description," ","(",observation_code,")") as full_name')->WHERE('status', '=', 1)->pluck('full_name', 'id');
        $abundancerecodsql = DB::table('abundances')->selectRaw('id, CONCAT(code_description," ","(",abundance_group,")") as full_name')->WHERE('status', '=', 1)->pluck('full_name', 'id');
        $gazetteerrecodsql = DB::table('gazetteers')->orderBy('id', 'ASC')->WHERE('status', '=', 1)->pluck('place', 'id');
        $habitatrecodsql = DB::table('gazetteers')->select('*')->WHERE([['status', 1],['habitat','!=','']])->orderBy('id', 'ASC')->pluck('habitat', 'id');
        $specierecodsql = DB::table('species')->orderBy('id', 'ASC')->WHERE('status', '=', 1)->pluck('specienewid', 'id');
        return view('distributions/create', compact('taxonrecodsql', 'methodrecodsql', 'observationrecodsql', 'observerrecodsql', 'gazetteerrecodsql', 'agerecodsql', 'abundancerecodsql', 'specierecodsql','habitatrecodsql'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //$this->validateInput($request);

        $inpute = $request->all();
        $specieid = $request['specie_id'];
        if($specieid!=''){
        $specie_arra = explode('|', $specieid);
        $inpute['specie_id'] = $specie_arra[0];
        $inpute['specie_data'] = $specie_arra[1];
        }
        Distribution::create($inpute);
        Session::flash('flash_message', "Distribution Created Successfully."); //Snippet in Master.blade.php
        return redirect()->route('distribution.index');
    }

    public function bulkUpload(Request $request) {

        return view('distributions.bulkupload');
    }

    public function bulkCreat(Request $request) {


        if ($request->hasFile('documents1')) {
            $filename = $_FILES['documents1']['name'];
            $handle = fopen($_FILES['documents1']['tmp_name'], "r");
            $flag = true;

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//                echo '<pre>';                // echo $data;
//                 print_r($data);
//                 echo $data[1];
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
                $specie_id = '0';
                if ($data[3]) {
                    $sql3 = DB::table('species')->select('*')->where('species', $data[3])->get()->first();
                    if (count($sql3))
                        $specie_id = $sql3->id;
                }
                $method_id = '0';
                if ($data[5]) {
                    $sql5 = DB::table('methods')->select('*')->where('code_description', $data[5])->get()->first();
                    if (count($sql5))
                        $method_id = $sql5->id;
                }
                $observation_id = '0';
                if ($data[6]) {
                    $sql6 = DB::table('observation')->select('*')->where('code_description', $data[6])->get()->first();
                    if (count($sql6))
                        $observation_id = $sql6->id;
                }
                //place
                $gazetteer_id = '0';
                if ($data[7]) {
                    $sql7 = DB::table('gazetteers')->select('*')->where('place', $data[7])->get()->first();
                    if (count($sql7))
                        $gazetteer_id = $sql7->id;
                }
                $observer_id = '0';
                if ($data[12] != '') {
                    $sql12 = DB::table('observers')->select('*')->where('last_name', $data[12])->orwhere('institution', $data[12])->get()->first();
                    if (count($sql12))
                        $observer_id = $sql12->id;
                }
                $age_id = '0';
                if ($data[13]) {
                    $sql13 = DB::table('ages')->select('*')->where('code_description', $data[13])->get()->first();
                    if (count($sql13))
                        $age_id = $sql13->id;
                }
                $abundance_id = '0';
                if ($data[14]) {
                    $sql14 = DB::table('abundances')->select('*')->where('code_description', $data[14])->get()->first();
                    if (count($sql14))
                        $abundance_id = $sql14->id;
                }
                if ($data[21]) {
                    $sql21 = DB::table('gazetteers')->select('*')->where('habitat', $data[21])->get()->first();
                    if (count($sql21))
                        $habitat = $sql21->id;
                }
                //$data[21]=Auth::id();
                // echo '<pre>';
                //$specimendata = ($data[15])?$data[15]:0;
                DB::table('distributions')->insert(array('taxon_id' => $taxon_id,
                    'selectioncriteria' => ($data[2]) ? $data[2] : '',
                    'specie_id' => $specie_id,
                    'specie_data' => ($data[4]) ? $data[4] : '',
                    'method_id' => $method_id,
                    'observation_id' => $observation_id,
                    'gazetteer_id' => $gazetteer_id,
                    'day' => ($data[8]) ? $data[8] : '',
                    'month' => ($data[9]) ? $data[9] : '',
                    'year' => ($data[10]) ? $data[10] : '',
                    'number' => ($data[11]) ? $data[11] : '',
                    'observer_id' => $observer_id,
                    'age_id' => $age_id,
                    'abundance_id' => $abundance_id,
                    'specimendata' => ($data[15]) ? $data[15] : 0,
                    'specimencode' => ($data[16]) ? $data[16] : '',
                    'collectorinstitution' => ($data[17]) ? $data[17] : '',
                    'Sex' => ($data[18]) ? $data[18] : '',
                    'remark' => ($data[19]) ? $data[19] : '',
                    'habitat' => ($data[21]) ? $data[21] : '',
                    'status' => 1,
                    'created_by' => Auth::id()
                ));
            }

            Session::flash('flash_message', "Distribution Uploded Successfully."); //Snippet in Master.blade.php
        }else {
            Session::flash('flash_message', "There is no file to upload."); //Snippet in Master.blade.php
        }

        return redirect()->route('distribution.index');
    }

    public function speciecRecord($taxon_id) {

        $genus = $_REQUEST['genus'];
        if ($genus == 'genus') {
            $sql = DB::table('species')->where('taxon_id', $taxon_id)->get();
            if (Session::get('language_val') == "en") {
                echo '<label for="MethodID" class="control-label">Species</label>';
            } else {
                echo '<label for="MethodID" class="control-label">Espèces</label>';
            }
            echo '<select class="form-control" required="required" id="species_record" name="specie_id">';
            echo '<option selected="selected" value="">Select Species</option>';
            foreach ($sql as $v) {
                ?>
                <option value="<?php echo $v->id; ?>|<?php echo $v->genus; ?> / <?php echo $v->species; ?> / <?php echo $v->subspecies; ?>"><?php echo $v->genus; ?> / <?php echo $v->species; ?> / <?php echo $v->subspecies; ?></option>
            <?php
            }
            echo ' </select> ';
        } else if ($genus == 'commonname') {
            $sqlcomman = DB::table('species')->where('taxon_id', $taxon_id)->get();
            //echo $taxon_id;
            //print_r($sql1);

            if (Session::get('language_val') == "en") {
                echo '<label for="MethodID" class="control-label">Species</label>';
            } else {
                echo '<label for="MethodID" class="control-label">Espèces</label>';
            }


//       echo '<pre>';
//       print_r($sqlcomman);
//       echo '</pre>';
//       die;
            echo '<select class="form-control" required="required" id="species_record" name="specie_id">';
            echo '<option selected="selected" value="">Select Species</option>';
            foreach ($sqlcomman as $vc) {
                if ($vc->common_name) {
                    ?>

                    <option value="<?php echo $vc->id; ?>|<?php echo $vc->common_name; ?>"><?php echo $vc->common_name; ?></option>

                <?php
                }
            }
            echo ' </select> ';
        } else {

            $sql2 = DB::table('species')->where('taxon_id', $taxon_id)->get();
            if (Session::get('language_val') == "en") {
                echo '<label for="MethodID" class="control-label">Species</label>';
            } else {
                echo '<label for="MethodID" class="control-label">Espèces</label>';
            }
            echo '<select class="form-control" required="required" id="species_record" name="specie_id">';
            echo '<option selected="selected" value="">Select Species</option>';
            foreach ($sql2 as $vf) {
                if ($vf->common_name_fr) {
                ?>
                <option value="<?php echo $vf->id; ?>|<?php echo $vf->common_name_fr; ?>"><?php echo $vf->common_name_fr; ?></option>
            <?php
                } }
            echo ' </select> ';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        //$distribution = DB::table('distributions')->select('*','distributions.id as id','distributions.status as status')->leftjoin('taxons','taxons.id','distributions.taxon_id')->leftjoin('methods','methods.id','distributions.method_id')
        //       ->leftjoin('gazetteers','gazetteers.id','distributions.gazetteer_id')->leftjoin('observers','observers.id','distributions.observer_id')->leftjoin('species','species.id','distributions.specie_id')->Where([['distributions.status',1],['distributions.id',$id]])->get();

        $distribution = DB::table('distributions')->select('distributions.*', 'distributions.id as id', 'gazetteers.gazeteer_id as ggid', 'distributions.gazetteer_id as dgid', 'species.species', 'methods.method_code', 'methods.code_description', 'observation.observation_code', 'observation.code_description as observationd', 'ages.age_group', 'ages.code_description as agesd'
                                , 'abundances.abundance_group', 'abundances.code_description as abundancesd','distributions.habitat as habitat', 'observers.last_name', 'observers.institution', 'taxons.taxon_code', 'taxon_code_description', 'gazetteers.place')
                        ->leftjoin('taxons', 'taxons.id', 'distributions.taxon_id')
                        ->leftjoin('species', 'distributions.specie_id', '=', 'species.id')
                        ->leftjoin('methods', 'distributions.method_id', '=', 'methods.id')
                        ->leftjoin('observation', 'distributions.observation_id', '=', 'observation.id')
                        ->leftjoin('gazetteers', 'gazetteers.id', 'distributions.gazetteer_id')
                        ->leftjoin('ages', 'distributions.age_id', '=', 'ages.id')
                        ->leftjoin('abundances', 'distributions.abundance_id', '=', 'abundances.id')
                        ->leftjoin('observers', 'distributions.observer_id', '=', 'observers.id')
                        ->where('distributions.id', $id)->first();
        //$distribution = Distribution::find($id);
        return view('distributions.show', compact('distribution'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $taxonrecodsql = DB::table('taxons')->selectRaw('id, CONCAT(taxon_code_description," ","(",taxon_code,")") as full_name')->WHERE('status', '=', 1)->pluck('full_name', 'id');
        $methodrecodsql = DB::table('methods')->selectRaw('id, CONCAT(code_description," ","(",method_code,")") as full_name')->WHERE('status', '=', 1)->pluck('full_name', 'id');
        $observerrecodsql = DB::table('observers')->selectRaw('id, CONCAT(first_name," ",last_name) as full_name')->WHERE('status', '=', 1)->pluck('full_name', 'id');
        $agerecodsql = DB::table('ages')->selectRaw('id, CONCAT(code_description," ","(",age_group,")") as full_name')->WHERE('status', '=', 1)->pluck('full_name', 'id');
        $observationrecodsql = DB::table('observation')->selectRaw('id, CONCAT(code_description," ","(",observation_code,")") as full_name')->WHERE('status', '=', 1)->pluck('full_name', 'id');
        $abundancerecodsql = DB::table('abundances')->selectRaw('id, CONCAT(code_description," ","(",abundance_group,")") as full_name')->WHERE('status', '=', 1)->pluck('full_name', 'id');
        $gazetteerrecodsql = DB::table('gazetteers')->orderBy('id', 'ASC')->pluck('place', 'id');


        $distribution = Distribution::find($id);
        //return view('distributions/edit', ['distribution' => $distribution]);
        return view('distributions.edit', compact('distribution', 'taxonrecodsql', 'methodrecodsql', 'observationrecodsql', 'observerrecodsql', 'gazetteerrecodsql', 'agerecodsql', 'abundancerecodsql', 'specierecodsql'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $distribution = Distribution::findOrFail($id);
        //$this->validate($request, $constraints);
        $specieid = $request['specie_id'];
        $specie_arra = explode('|', $specieid);
        //print_r($specie_arra);die;
        $inpute = $request->all();
        $inpute['specie_id'] = $specie_arra[0];

        if (count($specie_arra) > 1) {
            $inpute['specie_data'] = $specie_arra[1];
        }
        $distribution->fill($inpute)->save();
         Session::flash('flash_message', "Distribution Updated Successfully."); //Snippet in Master.blade.php
        return redirect()->route('distribution.index');
    }

    public function showbulkrecord() {

       // echo "sdfs";
        //die;
        ob_flush();
      
//     $distribution = DB::table('distributions')->select('*',DB::raw('CONCAT(methods.code_description, " ","(",methods.method_code,")") AS methoddata'),DB::raw('CONCAT(abundances.code_description, " ","(",abundances.abundance_group,")") AS abundancesdata'),DB::raw('CONCAT(observation.code_description, " ","(",observation.observation_code,")") AS observationdata') ,'distributions.id as id', 'distributions.status as status','distributions.day as day','distributions.month as month','distributions.year as year','distributions.habitat as habitat','methods.code_description as method_code_description')
//                        ->leftjoin('taxons', 'taxons.id', 'distributions.taxon_id')
//                        ->leftjoin('methods', 'methods.id', 'distributions.method_id')
//                        ->leftjoin('gazetteers', 'gazetteers.id', 'distributions.gazetteer_id')
//                        ->leftjoin('observers', 'observers.id', 'distributions.observer_id')
//                        ->leftjoin('species', 'species.id', 'distributions.specie_id')
//                        ->leftjoin('abundances', 'abundances.id', 'distributions.abundance_id')
//                        ->leftjoin('observation', 'observation.id', 'distributions.observation_id')
//                        ->leftjoin('ages', 'ages.id', 'distributions.age_id')->get();
//        
//        return DataTables::of($distribution)->make(true);
//        
        
        //return DataTables::of(Gazetteer::query()->orderBY('id','desc'))->make(true);
        $requestData= $_REQUEST;
        $columns = array( 
        // datatable column index  => database column name
                0 =>'distributions.id',
        //	1 =>'distributions.specie_id', 
        //	2 => 'distributions.id',
        //	4=> 'distributions.method_id',
        //        5=> 'distributions.day'	
        );
        $sql = "SELECT taxons.taxon_code,distributions.taxon_id,species.species,distributions.specie_id,distributions.id,distributions.method_id,distributions.day as distributionsday,distributions.method_id,methods.method_code,methods.code_description as method_description,selectioncriteria,distributions.month as month ,distributions.year as year,number,distributions.abundance_id,abundances.abundance_group,specimencode,collectorinstitution,distributions.observation_id,observation.observation_code,observation.code_description,distributions.gazetteer_id,gazetteers.place,distributions.observer_id,observers.last_name,observers.institution,distributions.age_id,ages.age_group,distributions.Sex as distributionsex,distributions.remark,distributions.habitat ";
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
        //methods.method_code,methods.code_description
        //observation.code_description
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
//while( $row=mysqli_fetch_array($query) ) {  // preparing an array
//        $id = $row["id"];
//        $nestedData=array(); 
//	$nestedData[] = $row["taxon_code"];
//	$nestedData[] = $row["species"];
//	$nestedData[] = $row["method_description"].'('.$row["method_code"].')';
//	$nestedData[] = $row["code_description"]."(".$row["observation_code"].")";
//	$nestedData[] = $row["place"];
//        $nestedData[] = $row["selectioncriteria"];
//        $nestedData[] = $row["distributionsday"];
//        $nestedData[] = $row["month"];
//        $nestedData[] = $row["year"];
//        $nestedData[] = $row["number"];
//        $nestedData[] = $row["last_name"];
//        $nestedData[] = $row["age_group"];
//        $nestedData[] = $row["abundance_group"];
//        $nestedData[] = $row["specimencode"];
//        $nestedData[] = $row["collectorinstitution"];
//        $nestedData[] = $row["distributionsex"];
//        $nestedData[] = $row["remark"];
//        $nestedData[] = $row["habitat"];
//	$nestedData[] = "<a href='passinventory/$id/edit' class='btn btn-bitbucket'><span class='glyphicon glyphicon-edit'></span>&nbsp;&nbsp;Edit</a>";
//	
//	$data[] = $nestedData;
//}
foreach($query as $val){
    

  
    
        $id = $val->id;
        $nestedData=array(); 
	$nestedData[] = $val->taxon_code;
	$nestedData[] = $val->species;
	$nestedData[] = $val->method_description.'('.$val->method_code.')';
	$nestedData[] = $val->code_description."(".$val->observation_code.")";
	$nestedData[] = $val->place;
        $nestedData[] = $val->selectioncriteria;
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
	$nestedData[] = '<a href="distribution/'.$id.'" style="margin-left:15px;" class="btn btn-info mini blue-stripe"><i class="fa fa-search"></i>&nbsp;'.Lang::get('menu.view',array(),Session::get('language_val')).'</a>&nbsp;
	<a href="distribution/'.$id.'/edit" style="margin-left:15px;" class="btn btn-bitbucket"><i class="fa fa-pencil"></i></span>&nbsp;'.Lang::get('menu.edit',array(),Session::get('language_val')).'</a>
        <button  onClick="recordDelete(this.id,\'distributions\',\''.Session::get('language_val').'\')" id='.$id.'  class="btn-danger btn  mini blue-stripe"  style="margin-left: 15px;"><i class="fa fa-trash"></i>&nbsp; '.Lang::get('menu.delete',array(),Session::get('language_val')).' </button>
                ';
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

    public function recordDelete($id) {
       
        $tablename = $_REQUEST['tablename'];
        $q = "UPDATE $tablename SET status= '0' WHERE id=$id ";
        DB::update(DB::raw($q));
        return redirect()->route('distribution.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

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
            'datum' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
        ]);
    }

}
