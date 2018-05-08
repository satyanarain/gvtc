<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Endenism;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;

class SearchController extends Controller {

    public function search(Request $request) {
           //return response()->json($request->all()); 
           $query=$request->q;
        // Perform the query using Query Builder
        $results = DB::table('species')
            ->select(DB::raw("*"))
             ->leftjoin('taxons','species.taxon_id','taxons.id')
            ->where('common_name','LIKE', '%'.$query.'%')
            ->orWhere ('genus', 'LIKE', '%' . $query . '%' )  
            ->orWhere ('species', 'LIKE', '%' . $query . '%' )  
            ->get();
        return view('pages.search', compact('results'));
    }
    
    public function create(Request $request){
        
        Session::put('searchurl', $searchurl);
        echo $searchurl;
        
    }
}