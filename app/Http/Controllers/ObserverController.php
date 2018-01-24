<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Observer;
use Input;
use Session;
use Illuminate\Support\Facades\Validator;
class ObserverController extends Controller
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
    $observers = Observer::all()->toArray();
    return view('observers.index', compact('observers'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $last_observeid= Observer::latest()->first();
        return view('observers/create',['last_observeid' => $last_observeid['id']+1]);
        
        
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
     Observer::create([
            'observer_id' => $request['observer_id'],
            'tittle' => $request['tittle'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'institution' => $request['institution'],
            'address' => $request['address'],
            'work_tel_number' => $request['work_tel_number'],
            'mobile' => $request['mobile'],
            'email' => $request['email'],
            'website' => $request['website'],
           
        ]);

     //return back()->with('success', 'Product has been added');
    Session::flash('flash_message', "Observer Created Successfully."); //Snippet in Master.blade.php 
    return redirect()->route('observer.index');
    }
    
      
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
         $observers = Observer::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($observers == null || count($observers) == 0) {
            return redirect()->intended('/observers');
        }

        return view('observers.show', ['observers' => $observers]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $observers = Observer::find($id);
        // Redirect to taxon list if updating taxon wasn't existed
        if ($observers == null || count($observers) == 0) {
            return redirect()->intended('/observers');
        }

        return view('observers.edit', ['observers' => $observers]);
        
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
       
        $Observer = Observer::findOrFail($id);
        $constraints = [
            'observer_id' => 'required',
            'tittle' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'institution' => 'required',
            'address' => 'required',
            'work_tel_number' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'website' => 'required',
            
            ];
       
        
        
        
        
       
        $input = [
             'observer_id' => $request['observer_id'],
            'tittle' => $request['tittle'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'institution' => $request['institution'],
            'address' => $request['address'],
            'work_tel_number' => $request['work_tel_number'],
            'mobile' => $request['mobile'],
            'email' => $request['email'],
            'website' => $request['website'],
        ];
        
       
        $this->validate($request, $constraints);
        Observer::where('id', $id)
            ->update($input);
        
        //return redirect()->intended('/taxons');
        return redirect()->route('observer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Observer::where('id', $id)->delete();
        return redirect()->route('observer.index');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    

   
    private function validateInput($request) {
        $this->validate($request, [
          'observer_id' => 'required|unique:observers',
            'tittle' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'institution' => 'required',
            'address' => 'required',
            'work_tel_number' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'website' => 'required',
        
    ]);
    }
}

