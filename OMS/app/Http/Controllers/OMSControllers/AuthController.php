<?php

namespace App\Http\Controllers\OMSControllers;
use App\Models\Announcement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    function login()
    {
       return view('login.login');
    }
    
    public function checklogin(Request $request)
    {
        $this->validate($request,[
           'employeeid' => 'required',
           'password' => 'required|alphaNum|min:3'      
        ]);

        $user_data = array(
           'employeeid' => $request->get('employeeid'),
           'password'=> $request->get('password')
        );

        if(Auth::attempt($user_data))
        {
            return redirect('/successlogin');
        }else
        {
            return back()->with('error','Wrong Login');
        }
    }

    function successlogin(){
        
        $list = Announcement::latest()->paginate(4);
        return view('template.template',compact('list'));
    }

    function logout()
    {
       Auth::logout();
       return view('login.login');
    }
}
