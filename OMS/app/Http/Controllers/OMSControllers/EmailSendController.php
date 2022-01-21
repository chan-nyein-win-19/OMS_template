<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\ForgotpwdEmail;
use App\Models\Otp;


class EmailSendController extends Controller
{
    //
    public function forgotpwd()
    {
        return view('forgotpwd');
       
   }


   function checkemail(Request $request)
   {
       $this->validate($request,[
           'email'=>'required|string|email'  
       ]);

       $user = User::where('email',$request->get('email'))->first();
       
       if($user != NULL)
       {    
            $number = mt_rand(100000, 999999);
            $details = [
            'title'=> 'One Time Password from Office Management System',
            'body'=>'If you forgot your password to login,Please use this OTP,and then set new password.
                    Your One Time Password : '.$number
                ];
    
        Mail::to($user)->send(new ForgotpwdEmail($details));

        $otp=Otp::where('employeeid',$user->id)->first();

        if($otp == NULL)
        {
            $otp1 = new Otp;
            $otp1->employeeid=$user->id;
            $otp1->otp=$number;
    
            $otp1->save();

        }
        else{

            Otp::where('id',$otp->id)->update([
               
                'employeeid'=>$user->id,
                'otp'=>$number,
            ]);
        }
        
        $employeeid = $user->id;
        return view('otpform',compact('employeeid'));
        // return redirect('/forgotpwd/otpform');

       }else
       {
            return back()->with('error','Wrong Email');
       }
    }


    function otpform()
   {
     return view('otpform');
   }
}
