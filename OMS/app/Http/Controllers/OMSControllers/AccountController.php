<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class AccountController extends Controller
{

    //Show account info
    public function show($id)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('account.show', compact('user'));
    }

    // Update Account info
    public function edit($id)
    {
        $user = User::find($id);
        return view('account.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $id = Auth::user()->id;

        $user = User::find($id);

        $validator = validator(request()->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id . '|min:10',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        User::findOrFail($id)->update([
            'fname' => request()->fname,
            'lname' => request()->lname,
            'username' => request()->username,
            'email' => request()->email,
        ]);

        return redirect('/successlogin')->with('info', 'Account Information is updated!!');
    }

    //changePassword 
    public function editPassword($id)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('account.changepassword', compact('user'));
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'currentpassword' => 'required',
            'newpassword' => 'required|min:3',
            'confirmpassword' => 'required|same:newpassword',
        ]);

        $data = $request->all();

        $user = User::find(auth()->user()->id);

        if (!\Hash::check($data['currentpassword'], $user->password)) {
            return back()->with('errormessage', 'Current Password is wrong');
        } else {
            User::findOrFail(auth()->user()->id)->update([
                'password' => Hash::make($request->confirmpassword)
            ]);
            return redirect('/successlogin')->with('info', 'Your password is changed!!');
        }
    }
}
