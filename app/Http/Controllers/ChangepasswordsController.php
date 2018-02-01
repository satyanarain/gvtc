<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\passwords;
use Auth;
use Hash;
use Session;


class ChangepasswordsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   public function __construct()
    {
        $this->middleware('auth');
    }
 public function create() {
  
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        return view('changepasswords.create')->withUser($user);
    }

    public function store(passwords $request) {
        $user = Auth::user();
         $password = Auth::user()->password;
        

        if (!Hash::check($request->currentpassword, $password)) {
            Session::flash('fail', "Your old password does not match!.");
            return redirect()->back();
        } else {
            $request->password;
            $user->password = Hash::make($request->password);
            $user->save();
            //request()->session()->flash('success', 'Password changed!');
            Session::flash('success', "Password changed!.");
            return redirect()->back();
        }
    }

}
