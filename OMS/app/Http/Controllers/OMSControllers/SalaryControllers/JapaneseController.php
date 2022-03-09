<?php

namespace App\Http\Controllers\OMSControllers\SalaryControllers;

use App\Http\Controllers\Controller;
use App\Models\Japanese;
use Illuminate\Http\Request;

class JapaneseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Japanese::all();
        return view('japanese.index', compact('list'));
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
        $validateData = $request->validate([
            'jpnLevel' => 'required|unique:japan',
            'jpnAllowance' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
        ]);

        $jpn = new Japanese;
        $jpn->jpnLevel = request()->jpnLevel;
        $jpn->jpnAllowance = request()->jpnAllowance;
        $jpn->save();
        return redirect('jpnAllowance')->with('info','Japanese Allowance has been added successfully');
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
        $edit = Japanese::find($id);
        return view('japanese.edit', compact('edit'));
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
        $jpn = Japanese::find($id);
        $validateData = $request->validate([
            'jpnLevel' => 'required',
            'jpnAllowance' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
        ]);

        $jpn->jpnLevel = request()->jpnLevel;
        $jpn->jpnAllowance = request()->jpnAllowance;
        $jpn->save();
        return redirect('jpnAllowance')->with('success','Japanese Allowance has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Japanese::find($id);
        $delete->delete();
        return back()->with('info', 'Japanese Allowance has been deleted successfully');
    }
}
