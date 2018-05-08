<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Page;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
//use Auth;

class DisplayReportController extends Controller
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
     return view('pages/report');
    }
    
   
    
    
   
    
    
    
    
    
}
