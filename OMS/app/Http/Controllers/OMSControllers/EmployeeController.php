<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('user.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //

    //     return view('user.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

       

        // $validator=validator(request()->all(),[
        //     'firstname' => 'required',
        //     'lastname' => 'required',
        //     'username' => 'required',
        //     'employee_id' => 'required','unique:users',
        //     // 'email' => 'required','unique:user',
        //     'email' => 'required',Rule::unique('users')->ignore($user->id),
        //     'password' => 'required','string', 'min:4',
        //     'role' => 'required'
        // ]);

        // if($validator -> fails()){
        //     return back()-> withErrors($validator);
        // }
        
        $validateData= $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required',
            
            // 'email' => 'required','unique:user',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'employeeid' => 'required|unique:users',
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


        return view('user.create')->with('Success','Employee has been successfully added...');

        // return redirect(route:'user.create')->with('Success','Employee has been successfully added...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
