<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return view('user.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        
        $validateData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
            'employeeid' => 'required|unique:users|integer',
            'role' => 'required'
        ]);

        $user = new User();
        $user->fname = request()->fname;
        $user->lname = request()->lname;
        $user->username = request()->username;
        $user->email = request()->email;
        $user->password = Hash::make(request()->password);
        $user->employeeid = request()->employeeid;
        $user->role = request()->role;
        $user->save();

        return redirect('users')->with('success','User has been created successfully!!');;
    }

    public function edit($id)
    {
        $edit = User::find($id);
        
        return view('user.edit',compact('edit'));
    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);

        $validateData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id.'',
            'employeeid' => 'required|unique:users,employeeid,'.$user->id.'|integer',
            'role' => 'required'
        ]);

        $user = User::findOrFail($id)->update(
            [
                'fname'=>request()->fname,
                'lname'=>request()->lname,
                'username'=>request()->username,
                'email'=>request()->email,
                'employeeid'=>request()->employeeid,
                'role'=>request()->role,
            ]
        );
        
        return redirect("users")->with('success','User has been updated successfully!');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = User::find($user->id);
        $user->delete();

        return back();
    }
}