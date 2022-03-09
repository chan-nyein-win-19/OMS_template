<?php

namespace App\Http\Controllers\OMSControllers\SalaryControllers;

use App\Http\Controllers\Controller;
use App\Models\Workingday;
use Illuminate\Http\Request;

class WorkingDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list=Workingday::all();
        return view('workingday.index',compact('list'));
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
        $validator = validator(request()->all(),[
            'month' => 'required|unique:workingdays|string',
            'workingDay' => 'required|integer|max:30',
        ]);
        if($validator->fails()) {
           return back()->withErrors($validator);
        }

        $workingDay = new Workingday;
        $workingDay->month = request()->month;
        $workingDay->workingDay = request()->workingDay;
        $workingDay->save();
        return redirect('workingDay')->with('info','Workingdays has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workingday  $workingDay
     * @return \Illuminate\Http\Response
     */
    public function show(Workingday $workingDay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workingday  $workingDay
     * @return \Illuminate\Http\Response
     */
    public function edit(Workingday $workingDay)
    {
        //
        $edit=$workingDay;
        return view("workingday.edit",compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Workingday  $workingDay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workingday $workingDay)
    {
        //
        $validator = validator(request()->all(),[
            'month' => 'required|unique:workingdays,month,'.$workingDay->id.'|string',
            'workingDay' => 'required|integer|max:30',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
        $workingDay->month = request()->month;
        $workingDay->workingDay = request()->workingDay;
        $workingDay->save();
        return redirect('workingDay')->with('info','Workingdays has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workingday  $workingDay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workingday $workingDay)
    {
        //
        $delete = Workingday::find($workingDay->id);
        $delete->delete();
        return back()->with('info','WorkingDay has been deleted successfully');
    }
}
