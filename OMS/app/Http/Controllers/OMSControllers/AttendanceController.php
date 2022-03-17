<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\Dailyattendance;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Dailyattendance $dailyattendance)
    {
        $id = Auth::user()->employeeid;
        $dailyattendance = Dailyattendance::where('userid', $id)->get();
        return view('attendance.index', compact('dailyattendance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $userId = Auth::user()->employeeid;
        $users = User::select('employeeid')->get();
        $dailyattendances = Dailyattendance::where('userid', $userId)->get();
        foreach ($users as $user) {
            if ($user->employeeid == $userId) {
                foreach ($dailyattendances as $dailyattendance) {
                    if ($dailyattendance->date == $request->attendanceDate) {
                        return back()->with('errmsg', 'The attendance date field already exists.');
                    } else {
                        $validator = validator(request()->all(), [
                            'checkIn' => 'required',
                            'checkOut' => 'required',
                            'lunchTime' => 'required',
                            'workHour' => 'required',
                        ]);

                        if ($validator->fails()) {
                            return back()->withErrors($validator);
                        }
                    }
                }
            } else {
                $validator = validator(request()->all(), [
                    'checkIn' => 'required',
                    'checkOut' => 'required',
                    'lunchTime' => 'required',
                    'workHour' => 'required',
                ]);

                if ($validator->fails()) {
                    return back()->withErrors($validator);
                }
            }
        }

        $dailyattendance = new Dailyattendance;
        $dailyattendance->userid = request()->employeeID;
        $dailyattendance->date = request()->attendanceDate;
        $dailyattendance->checkin = request()->checkIn;
        $dailyattendance->checkout = request()->checkOut;
        $dailyattendance->lunchtime = request()->lunchTime;
        $dailyattendance->workinghour = request()->workHour;
        $dailyattendance->halfdayleave = request()->halfDayLeave;
        $dailyattendance->leaveday = request()->leaveDay;
        $dailyattendance->workfromhome = request()->wfh;
        $dailyattendance->ottime = request()->ottime;
        $dailyattendance->latetime = request()->latetime;

        $dailyattendance->save();

        return redirect('attendance')->with('success', 'Attendance record has been saved successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dailyattendance  $dailyattendance
     * @return \Illuminate\Http\Response
     */
    public function show(Dailyattendance $dailyattendance)
    {
        $dailyattendance = Dailyattendance::all();
        return view('attendance.show', compact('dailyattendance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dailyattendance  $dailyattendance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Dailyattendance::find($id);

        return view('attendance.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dailyattendance  $dailyattendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userId = Auth::user()->employeeid;
        $users = User::select('employeeid')->get();
        $dailyattendances = Dailyattendance::where('userid', $userId)->get();
        foreach ($users as $user) {
            if ($user->employeeid == $userId) {
                foreach ($dailyattendances as $dailyattendance) {
                    if ($dailyattendance->date == $request->attendanceDate) {
                        return back()->with('errmsg', 'The attendance date field already exists.');
                    } else {
                        $validator = validator(request()->all(), [
                            'checkIn' => 'required',
                            'checkOut' => 'required',
                            'lunchTime' => 'required',
                            'workHour' => 'required',
                        ]);

                        if ($validator->fails()) {
                            return back()->withErrors($validator);
                        }
                    }
                }
            } else {
                $validator = validator(request()->all(), [
                    'checkIn' => 'required',
                    'checkOut' => 'required',
                    'lunchTime' => 'required',
                    'workHour' => 'required',
                ]);

                if ($validator->fails()) {
                    return back()->withErrors($validator);
                }
            }
        }

        Dailyattendance::findOrFail($id)->update([
            'userid' => request()->employeeID,
            'date' => request()->attendanceDate,
            'checkin' => request()->checkIn,
            'checkout' => request()->checkOut,
            'lunchtime' => request()->lunchTime,
            'workinghour' => request()->workHour,
            'halfdayleave' => request()->halfDayLeave,
            'leaveday' => request()->leaveDay,
            'workfromhome' => request()->wfh,
            'ottime' => request()->ottime,
        ]);
        return redirect('attendance')->with('success', 'Attendance record has been updated successfully!!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dailyattendance  $dailyattendance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendance = Dailyattendance::where('id', $id)->delete();
        return redirect('attendance');
    }
    public function showAttendance()
    {
        $dailyattendance = Dailyattendance::all();
        return view('attendance.show',compact('dailyattendance'));
    } 
}
