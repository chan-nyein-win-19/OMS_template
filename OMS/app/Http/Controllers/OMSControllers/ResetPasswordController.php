<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    //
    function checkOTP(Request $request)
   {
    $validator= validator(request()->all(),[
        'otp'=>'required',
        'newPassword'=>'required|string|min:3',
        'confirmPassword'=>'required|string|min:3',
      ]);


      $employeeid = $request->get('employeeid');

      if($validator->fails())
      {
      
        return view('login.otpform',compact('employeeid'))->withErrors($validator);
      }


       $otp =Otp::where('employeeid',$request->get('employeeid'))->first();
       

       if($otp->otp == $request->get('otp'))
       {
        User::where('id',$request->get('employeeid'))->update([
            'password' => Hash::make($request->get('newPassword'))
        ]);
        return view('login.login');
       }
       else
       {
        return view('login.otpform',compact('employeeid'))->withErrors(['otpError'=>'Incorrect OTP']);
       }
    }
    
   }

