<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\Leaves;
use App\Models\User;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $leaders=User::select('*')->where('role','Leader')->get();
        $senseis=User::select('*')->where('role','Sensei')->get();
        $today=date('Y-m-d');
        
        return view('leave.leaveRequestForm',compact([
            'leaders','senseis','today'
        ]));
       
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
        $validator=validator(request()->all(),[
            'employeeId'=>'required',
         //   'date'=>'required|after:'.date('Y-m-d'),
            'date'=>'required|after:yesterday',
            'time'=>'required',
            'reason'=>'required|max:300',
            'comment'=>'required|max:300'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
 
         $leaders=request()->leader;
         $senseis=request()->sensei;
 
         if($leaders!=null){
 
             foreach($leaders as $leader){
                 if(!is_null($leader) || $leader!=""){
                     $leave=new Leaves;
                     $leave->employeeId=request()->employeeId;
                     $leave->date=request()->date;
                     $leave->time=request()->time;
                     $leave->reason=request()->reason;
                     $leave->comment=request()->comment;
                     $leave->status="Pending";
                     $leave->leaderid=$leader;
                     $leave->save();
                 }
                 
             }
         }
 
         if($senseis!=null){
            foreach($senseis as $sensei){
                if(!is_null($sensei) || $sensei!=""){
                 $leave=new Leaves;
                 $leave->employeeId=request()->employeeId;
                 $leave->date=request()->date;
                 $leave->time=request()->time;
                 $leave->reason=request()->reason;
                 $leave->comment=request()->comment;
                 $leave->status="Pending";
                    $leave->leaderid=$sensei;
                    $leave->save();
                }
            }
         }
 
        
         return view('successlogin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $today=date('Y-m-d');
        $leaveRecords=Leaves::where([
            ['date',$today],['employeeId',auth()->user()->id]
            ])->get();

        return view('leave.leaveRecords',compact([
            'today','leaveRecords'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function edit($date)
    {
        //
        $leaders=User::select('*')->where('role','Leader')->get();
        $senseis=User::select('*')->where('role','Sensei')->get();
        $leaveRecord=Leaves::where([
            ['date',$date],['employeeId',auth()->user()->id]
            ])->first();

            return view('leave.leaveEdit',compact(['leaveRecord','leaders','senseis']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validator=validator(request()->all(),[
            'employeeId'=>'required',
         //   'date'=>'required|after:'.date('Y-m-d'),
            'date'=>'required|after:yesterday',
            'time'=>'required',
            'reason'=>'required|max:300',
            'comment'=>'required|max:300'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $oldLeaveRecords=Leaves::where([
            ['date',request()->get('oldDate')],['employeeId',auth()->user()->id]
            ])->get();
            $today=request()->get('date');
            foreach($oldLeaveRecords as $leaveRecord){
                $leaveRecord->date=request()->get('date');
                $leaveRecord->time=request()->get('time');
                $leaveRecord->reason=request()->get('reason');
                $leaveRecord->comment=request()->get('comment');
                $leaveRecord->save();
            }
        $leaders=request()->leader;
         $senseis=request()->sensei;
 
         if($leaders!=null){
 
             foreach($leaders as $leader){
                 if(!is_null($leader) || $leader!=""){
                     $leave=new Leaves;
                     $leave->employeeId=request()->employeeId;
                     $leave->date=request()->date;
                     $leave->time=request()->time;
                     $leave->reason=request()->reason;
                     $leave->comment=request()->comment;
                     $leave->status="Pending";
                     $leave->leaderid=$leader;
                     $leave->save();
                 }
                 
             }
         }
 
         if($senseis!=null){
            foreach($senseis as $sensei){
                if(!is_null($sensei) || $sensei!=""){
                 $leave=new Leaves;
                 $leave->employeeId=request()->employeeId;
                 $leave->date=request()->date;
                 $leave->time=request()->time;
                 $leave->reason=request()->reason;
                 $leave->comment=request()->comment;
                 $leave->status="Pending";
                    $leave->leaderid=$sensei;
                    $leave->save();
                }
            }
         }

            $leaveRecords=Leaves::where([
                ['date',request()->get('date')],['employeeId',auth()->user()->id]
                ])->get();
            return view('leave.leaveRecords',compact([
                'leaveRecords','today'
            ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leaves $leaf)
    {
        //
        //$leave= Leaves::find($id);
        $today=$leaf->date;
        if($leaf->employeeId==auth()->user()->id)
        {
            $leaf->delete();
          $leaveRecords=Leaves::where([
            ['date',$today],['employeeId',auth()->user()->id]
            ])->get();
            return view('leave.leaveRecords',compact([
                'today','leaveRecords'
            ]))->with('info','Successfully deleted');
        }else{
            return redirect("/");
        }
       
        
    }

    // public function addNew($date){
    //     $leaders=User::select('*')->where('role','Leader')->get();
    //     $senseis=User::select('*')->where('role','Sensei')->get();
    //     $today=date('Y-m-d');

    //     $leaveRecord=Leaves::where([
    //         ['date',$date],['employeeId',auth()->user()->id]
    //         ])->first();
        
    //     return view('leave.leaveRequestForm',compact([
    //         'leaders','senseis','today','leaveRecord'
    //     ]));
    // }

    public function searchLeave(Request $request){
        $today=request()->date;
        $leaveRecords=Leaves::where([
        ['date',$today],['employeeId',auth()->user()->id]
        ])->get();

        return view('leave.leaveRecords',compact([
            'today','leaveRecords'
        ]));
    }
}