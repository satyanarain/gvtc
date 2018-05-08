<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Page;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
//use Auth;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view('pages/index');
    }
    
   
    
    
    public function liveSearch(Request $request)
    { 
         $search = $request->id;
   
          
         if ($search!="")
        {
       
        $posts= DB::table('species')->select('*')->leftjoin('taxons','species.taxon_id','taxons.id')->Where('common_name', 'like', '%'.$search.'%')->get();
        return view('pages/livesearchajax',compact('posts'));
           // return view('distributions.index', compact('users')); 
        }else{
            
            return view('pages/index');	 
            
        }
    }
    
    
    
    
    
    
}
