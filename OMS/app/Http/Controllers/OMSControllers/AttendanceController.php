<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\Dailyattendance;
use App\Models\User;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use Auth;
use Validator;


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
        $dailyAttendances = Dailyattendance::where('userid', $id)->get();
       
        foreach($dailyAttendances as $a){
           $latetime=$a->latetime*60;         
           $lateTime=intdiv($latetime, 60).':'. ($latetime % 60);
           $a->latetime=date("H:i",strtotime($lateTime));
        }
        foreach($dailyAttendances as $ot){
            $ottime=$ot->ottime*60;         
            $otTime=intdiv($ottime, 60).':'. ($ottime % 60);
            $ot->ottime=date("H:i",strtotime($otTime));
         }
        return view('attendance.index', compact('dailyAttendances'));
    }
    
    public function exprot()
    {
        $dailyAtt = Dailyattendance::all();

        // Export all Attendance
        (new FastExcel($dailyAtt))->export('file.xlsx');
        return (new FastExcel(Dailyattendance::all()))->download('file.xlsx');
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
        $latetime = request()->latetime;
        $time = explode(":", $latetime);
        $mins = $time[0]*60+$time[1];
        $lateHour = $mins/60;
        
        $ottime = request()->ottime;
        $ot = explode(":",$ottime);
        $otmins = $ot[0]*60+$ot[1];
        $otHour = round($otmins/60,2);
         
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
        $dailyattendance->ottime = $otHour;
        $dailyattendance->latetime = $lateHour;

        $dailyattendance->save();

        return redirect('attendance')->with('success', 'Attendance record has been saved successfully!!');
    }
    public function import()
    {
        return view('attendance.excelimport');
    }
    public function excelstore()
    {   
        $validator=validator(request()->all(), [
            'file' => 'required|mimes:xls,xlsx',
            dd('show'),
        ]);
        if ($validator->fails()) {
            return back()->with('errmsg', 'no file upload');
           
        }
            $empAttendances = (new FastExcel)->import('file.xlsx', function ($file) {
            return DailyAttendance::create([
                'userid' => $file['userid'],
                'date' => $file['date'],
                'checkin' => $file['checkin'],
                'checkout' => $file['checkout'],
                'lunchtime' => $file['lunchtime'],
                'workinghour' => $file['workinghour'],
                'halfdayleave' => $file['halfdayleave'],
                'leaveday' => $file['leaveday'],
                'workfromhome' => $file['workfromhome'],
                'ottime' => $file['ottime'],
                'latetime' => $file['latetime']
            ]);
        });
    
        return redirect('attendance')->with('success', 'Excel Attendance record has been saved successfully!!');
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
                    if ($dailyattendance->date == $request->attendanceDate && $dailyattendance->id != $id) {

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

                        return redirect('attendance');
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

        $latetime = request()->latetime;
        $time = explode(":", $latetime);
        $mins = $time[0]*60+$time[1];
        $lateHour = $mins/60;
        
        
        $ottime = request()->ottime;
        $ot = explode(":",$ottime);
        $otmins = $ot[0]*60+$ot[1];
        $otHour = round($otmins/60,2);

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
            'ottime' => $otHour,
            'latetime' => $lateHour,
        ]);
        return redirect('attendance')->with('success', 'Attendance record has been updated successfully!!');
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
