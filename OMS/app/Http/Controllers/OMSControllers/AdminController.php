<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;

class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index','checklogin']);
    }
    public function index()
    {
        return view('adminlogin');
       
   }

   function checklogin(Request $request)
   {
       $this->validate($request,[
           'employeeid'=>'required',
           'password'=>'required|alphaNum|min:3'      
       ]);

       $user_data= array(
           'employeeid' => $request->get('employeeid'),
           'password'=> $request->get('password')
       );

       if(Auth::attempt($user_data))
       {
           return redirect('/adminlogin/successlogin');
       }else
       {
            return back()->with('error','Wrong Login');
       }
   }

   function successlogin()
   {
    
        return view('successlogin');
   }

   function logout(){

       Auth::logout();
       return redirect('/');
   }
}
