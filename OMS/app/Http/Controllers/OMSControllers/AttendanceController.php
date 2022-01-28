<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\Dailyattendance;
use Illuminate\Http\Request;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['store','create']);
    // }

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
        return view('attendance.create');
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
        $validator=validator(request()->all(),[
           
            'attendanceDate'=>'required',
            'checkIn'=>'required',
            'checkOut'=>'required',
            'lunchTime'=>'required',
    
        ]);
    
        if($validator->fails()) {
            return back()->withErrors($validator);
    
        }
    
        $dailyattendance=new Dailyattendance;
        $dailyattendance->userid=request()->employeeID;
        $dailyattendance->date=request()->attendanceDate;
        $dailyattendance->checkin=request()->checkIn;
        $dailyattendance->checkout=request()->checkOut;
        $dailyattendance->lunchtime=request()->lunchTime;
        $dailyattendance->workinghour=request()->workHour;
        $dailyattendance->halfdayleave=request()->halfDayLeave;
        $dailyattendance->leaveday=request()->leaveDay;
        $dailyattendance->workfromhome=request()->wfh;
        $dailyattendance->ottime=request()->ottime;
    
       
        $dailyattendance->save();
    
        return redirect('/');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dailyattendance  $dailyattendance
     * @return \Illuminate\Http\Response
     */
    public function show(Dailyattendance $dailyattendance)
    {
        //

        $detail=Dailyattendance::all();

        return view('attendance.attendanceList',compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dailyattendance  $dailyattendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Dailyattendance $dailyattendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dailyattendance  $dailyattendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dailyattendance $dailyattendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dailyattendance  $dailyattendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dailyattendance $dailyattendance)
    {
        //
    }
}


