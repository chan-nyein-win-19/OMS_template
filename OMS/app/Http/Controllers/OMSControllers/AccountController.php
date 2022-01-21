<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id=Auth::user()->id;
        $user = User::find($id);
        return view('account.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('account.edit',compact('user'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator=validator(request()->all(),[
            'fname'=>'required',
            'lname'=>'required',
            'username'=>'required',
            'email'=>'required|email|max:255',
            'password'=>'required',
        ]);
        // if ($validator->fails()) {
        //     return redirect('accounts/edit')->withErrors($validator)->withInput($request->except('password'));
        // }
        
         User::findOrFail($id)->update([
    
                'fname'=>request()->fname,
                'lname'=>request()->lname,
                'username' =>request()->username,
                'email' =>request()->email,
                'password' =>Hash::make(request()->password),
                
            ]);
        
         return back()->with('info',' Update successful.');
    }
    public function editPassword($id)
    {
        $id=Auth::user()->id;
        $user = User::find($id);
        return view('account.changepassword',compact('user'));
        
    }

    public function changePassword(Request $request,$id){

        $id=Auth::user()->id;
        $user = User::find($id);
        $validator=validator(request()->all(),[
            'currentpassword' => ['required'],
            'newpassword' => ['required'],
            'confirmpassword' => ['required','same:newpassword'],
        ]);
        
        User::findOrFail($id)->update([
            'password'=> Hash::make(request()->confirmpassword)
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        return back()->with('info',' Password successful.');      
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
