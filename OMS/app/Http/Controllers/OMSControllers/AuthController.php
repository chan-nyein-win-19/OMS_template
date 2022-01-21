<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Announcement;

class AuthController extends Controller
{
   public function checklogin(Request $request)
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
            // $list = Announcement::latest()->paginate(4);
            // return view('template.template',compact('list'));
            return redirect('/successlogin');
       }else
       {
            return back()->with('error','Wrong Login');
       }
   }
    function successlogin()
    {
        $list = Announcement::latest()->paginate(4);
        return view('template.template',compact('list'));
    }

   function logout()
   {
       Auth::logout();
       return view('login.login');
   }

}