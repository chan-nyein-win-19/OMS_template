<?php

namespace App\Http\Controllers\OMSControllers\SalaryControllers;

use App\Http\Controllers\Controller;
use App\Models\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Band::all();
        return view('band.index', compact('list'));
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
        $validator = validator(request()->all(), [
            'bandno' => 'required|integer',
            'basicsalary' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
        ]);
        if( $validator->fails() ) {
            return back()->withErrors($validator);
        }

        $band = new Band;
        $band->bandno = request()->bandno;
        $band->basicsalary = request()->basicsalary;
        $band->save();
        return redirect('bands')->with('info','Band has been added successfully');
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
        $edit = Band::find($id);
        return view('band.edit', compact('edit'));
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
        $band = Band::find($id);
        $validator = validator(request()->all(), [
            'bandno' => 'required|integer',
            'basicsalary' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
        ]);
        if( $validator->fails() ) {
            return back()->withErrors($validator);
        }
        $band->bandno = request()->bandno;
        $band->basicsalary = request()->basicsalary;
        $band->save();
        return redirect('bands')->with('success','Band has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Band::find($id);
        $delete->delete();
        return back()->with('info', 'Band has been deleted successfully');
    }
}
