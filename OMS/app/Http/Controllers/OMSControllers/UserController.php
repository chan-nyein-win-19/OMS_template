<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Datatables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = User::all();
        return view('user.userlist', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validateData= $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'employeeid' => 'required|unique:users|integer',
            'role' => 'required'
        ]);

        $user= new User();
        $user->fname=request()->fname;
        $user->lname=request()->lname;
        $user->username=request()->username;
        $user->email=request()->email;
        $user->password=request()->password;
        $user->employeeid=request()->employeeid;
        $user->role=request()->role;
        $user->save();

        return view('user.create')->with('success','Employee has been successfully added...');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    public function edit($id)
    {

        $edit=User::find($id);
        
        return view('user.edit',compact('edit'));
        
    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);

        $validateData= $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required',
            // 'email' => 'required|email|unique:users,id',
            'email' => 'required|email|unique:users,email,'.$user->id.'',
            'password' => 'required|min:4',
            'employeeid' => 'required|unique:users,employeeid,'.$user->id.'|integer',
            'role' => 'required'
        ]);

      

        $user=  User::findOrFail($id)->update([
            'fname'=>request()->fname,
            'lname'=>request()->lname,
            'email'=>request()->email,
            'password'=>request()->password,
            'employeeid'=>request()->employeeid,
            'role'=>request()->role,
            ]);
    
            
            return redirect("users")->with('updatesuccess','User has been updated successfully!');
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $delete=User::find($user);
        $delete->each->delete();

        return back();
    }
}