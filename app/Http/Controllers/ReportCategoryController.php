<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ReportCategory;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;
class ReportCategoryController extends Controller
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
       
    //$user_id=Auth::id();
    //$role=Auth::user()->role;
    //$permission_key = "taxon_view";
    //$getpermissionstatus = getpermissionstatus($user_id,$role,$permission_key);
        //print_r($getpermissionstatus);die;
    //if($getpermissionstatus==0)
    //return redirect()->route('user-management.unauthorized');    
//    $rcategory = ReportCategory::all()->toArray();
//    return view('report_category.index', compact('rcategory'));
    
    $rcategory = DB::table('report_categories')->select('*')->orderBy('order','ASC')->get();
    return view('report_category.index', compact('rcategory'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
    return view('report_category/create');
    }
    
    
    public function updateOrder(Request $request)
    {
   /*   
       Array
(
    [0] => Array
        (
            [id] => 3
            [position] => 1
        )

    [1] => Array
        (
            [id] => 1
            [position] => 2
        )

    [2] => Array
        (
            [id] => 2
            [position] => 3
        )

)*/
        
//        exit();
        $tasks = ReportCategory::all();
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
    
    
    
    
    
    
    
//     public function updateOrder(Request $request)
//             
//    {
//        
//     
//        $tasks = ReportCategory::all();
//       
//        foreach ($tasks as $task) {
//            //$task->timestamps = false; // To disable update_at field updation
//            $id = $task->id;
//
//            foreach ($request->order as $order) {
//                if ($order['id'] == $id) {
//                    $task->update(['order_status' => $order['position']]);
//                }
//            }
//        }
//        
//        return response('Update Successfully.', 200);
//    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    
    public function store(Request $request)
    {
      
     
     $this->validateInput($request);
     ReportCategory::create([
            'title' => $request['title'],
            'created_by'=>$request['created_by'],
            'description' => $request['description']
            
        ]);

     //return back()->with('success', 'Product has been added');
    Session::flash('flash_message', "Report category Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('reportcategory.index');
    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
       $rcategory = ReportCategory::find($id);
       return view('report_category.show', ['rcategory' => $rcategory]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rcategory = ReportCategory::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($rcategory == null || count($rcategory) == 0) {
            return redirect()->intended('/taxons');
        }

        return view('report_category.edit', ['rcategory' => $rcategory]);
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
       
        $rcategory = ReportCategory::findOrFail($id);
        $constraints = [
            'title' => 'required',
            'description'=> 'required',
            
            ];
       
        
        
        
        
       
        $input = [
            'title' => $request['title'],
            'description' => $request['description']
        ];
        
       
        $this->validate($request, $constraints);
        ReportCategory::where('id', $id)
            ->update($input);
        
         Session::flash('flash_message', "Report category Updated Successfully."); //Snippet in Master.blade.php 
        return redirect()->route('reportcategory.index');
    }

 
    
   
    
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Taxon::where('id', $id)->delete();
        return redirect()->route('reportcategory.index');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
        'title' => 'required|unique:report_categories',
        'description' => 'required'
        
    ]);
    }
}

