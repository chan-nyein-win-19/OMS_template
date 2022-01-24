<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\Mail;

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
            return view('template.template');
        }else
        {
            return back()->with('error','Wrong Login');
        }
    }

    function logout()
    {
       Auth::logout();
       return view('login.login');
    }
}
