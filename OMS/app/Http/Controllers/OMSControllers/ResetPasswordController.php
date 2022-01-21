<?php

namespace App\Http\Controllers;

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
       $this->validate($request,[
            'otp'=>'required',
            'newPassword'=>'required|string|min:3',
            'confirmPassword'=>'required|string|min:3',    
       ]);

       $user_data= array(
           'otp' => $request->get('otp'),
           'newPassword'=> $request->get('newPassword')
       );

       $otp =Otp::where('employeeid',$request->get('employeeid'))->first();


       if($otp->otp == $request->get('otp'))
       {
        User::where('id',$request->get('employeeid'))->update([
            'password' => Hash::make($request->get('newPassword'))
        ]);
        return redirect('/adminlogin');
       }
       else
       {
        return redirect('/forgotpwd/otpform')->with('error','Incorrect OTP');
       }
      
   }
}
