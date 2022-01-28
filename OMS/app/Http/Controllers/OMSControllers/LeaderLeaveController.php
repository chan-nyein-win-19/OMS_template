<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\Leaves;
use App\Models\User;
use Illuminate\Http\Request;

class LeaderLeaveController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    // public function show(){
    //     $leaders=User::select('*')->where('role','Leader')->get();
    //     $senseis=User::select('*')->where('role','Sensei')->get();
    //     $today=date('Y-m-d');
    //     $newLeave=false;
    //     return view('leave.leaveRequestForm',compact([
    //         'leaders','senseis','today','newLeave'
    //     ]));
    // }

    // public function addNew($newLeave,$date){
    //     $leaders=User::select('*')->where('role','Leader')->get();
    //     $senseis=User::select('*')->where('role','Sensei')->get();
    //     $today=date('Y-m-d');

    //     $leaveRecord=Leaves::where([
    //         ['date',$date],['employeeId',auth()->user()->id]
    //         ])->first();
        
    //     return view('leave.leaveRequestForm',compact([
    //         'leaders','senseis','today','newLeave','leaveRecord'
    //     ]));
    // }

    // public function save(Request $request){
    //    $validator=validator(request()->all(),[
    //        'employeeId'=>'required',
    //     //   'date'=>'required|after:'.date('Y-m-d'),
    //        'date'=>'required|after:yesterday',
    //        'time'=>'required',
    //        'reason'=>'required|max:300',
    //        'comment'=>'required|max:300'
    //    ]);
    //    if($validator->fails()){
    //        return back()->withErrors($validator);
    //    }

    //     $leaders=request()->leader;
    //     $senseis=request()->sensei;

    //     if($leaders!=null){

    //         foreach($leaders as $leader){
    //             if(!is_null($leader) || $leader!=""){
    //                 $leave=new Leaves;
    //                 $leave->employeeId=request()->employeeId;
    //                 $leave->date=request()->date;
    //                 $leave->time=request()->time;
    //                 $leave->reason=request()->reason;
    //                 $leave->comment=request()->comment;
    //                 $leave->status="Pending";
    //                 $leave->leaderid=$leader;
    //                 $leave->save();
    //             }
                
    //         }
    //     }

    //     if($senseis!=null){
    //        foreach($senseis as $sensei){
    //            if(!is_null($sensei) || $sensei!=""){
    //             $leave=new Leaves;
    //             $leave->employeeId=request()->employeeId;
    //             $leave->date=request()->date;
    //             $leave->time=request()->time;
    //             $leave->reason=request()->reason;
    //             $leave->comment=request()->comment;
    //             $leave->status="Pending";
    //                $leave->leaderid=$sensei;
    //                $leave->save();
    //            }
    //        }
    //     }

       
    //     return view('successlogin');
    // }

    // public function list(){
    //     $today=date('Y-m-d');
    //     $leaveRecords=Leaves::where([
    //         ['date',$today],['employeeId',auth()->user()->id]
    //         ])->get();

    //     return view('leave.leaveRecords',compact([
    //         'today','leaveRecords'
    //     ]));
    // }
    // public function searchLeave(Request $request){
    //     $today=request()->date;
    //     $leaveRecords=Leaves::where([
    //     ['date',$today],['employeeId',auth()->user()->id]
    //     ])->get();

    //     return view('leave.leaveRecords',compact([
    //         'today','leaveRecords'
    //     ]));
    // }

    // public function editLeave($date){
    //     $leaveRecord=Leaves::where([
    //         ['date',$date],['employeeId',auth()->user()->id]
    //         ])->first();

    //         return view('leave.leaveEdit',compact(['leaveRecord']));
    // }
    // public function editLeavePost(Request $request){

    //     $validator=validator(request()->all(),[
    //         'employeeId'=>'required',
    //      //   'date'=>'required|after:'.date('Y-m-d'),
    //         'date'=>'required|after:yesterday',
    //         'time'=>'required',
    //         'reason'=>'required|max:300',
    //         'comment'=>'required|max:300'
    //     ]);
    //     if($validator->fails()){
    //         return back()->withErrors($validator);
    //     }
    //     $oldLeaveRecords=Leaves::where([
    //         ['date',request()->get('oldDate')],['employeeId',auth()->user()->id]
    //         ])->get();
    //         $today=request()->get('date');
    //         foreach($oldLeaveRecords as $leaveRecord){
    //             $leaveRecord->date=request()->get('date');
    //             $leaveRecord->time=request()->get('time');
    //             $leaveRecord->reason=request()->get('reason');
    //             $leaveRecord->comment=request()->get('comment');
    //             $leaveRecord->save();
    //         }
    //         $leaveRecords=Leaves::where([
    //             ['date',request()->get('date')],['employeeId',auth()->user()->id]
    //             ])->get();
    //         return view('leave.leaveRecords',compact([
    //             'leaveRecords','today'
    //         ]));
    // }

    // public function destroy($id){
    //     $leave= Leaves::find($id);
    //     $today=$leave->date;
    //     $leave->delete();
    //       $leaveRecords=Leaves::where([
    //         ['date',$today],['employeeId',auth()->user()->id]
    //         ])->get();
    //         return view('leave.leaveRecords',compact([
    //             'today','leaveRecords'
    //         ]))->with('info','Successfully deleted');
    //  }

    //Leader Section
     public function viewLeave(){
        $today=date('Y-m-d');
        $filtering='all';
        $leaveRecords=Leaves::where('date',$today)->where([
            ['date',$today],['leaderId',auth()->user()->id]
            ])->get();

        return view('leave.leaderLeaveForm',compact([
            'today','leaveRecords','filtering'
        ]));
    }

    public function findLeave(Request $request){
        $today=request()->date;
        $filtering=request()->filtering;
        $leaveRecords=Leaves::where('date',$today)->where([
        ['date',$today],['leaderId',auth()->user()->id]
        ])->get();
        
        return view('leave.leaderLeaveForm',compact([
            'today','leaveRecords','filtering'
        ]));
    }

    public function changeStatus($id,$status,$date,$filtering){
       $leave=Leaves::find($id);
       $today=$date;
       if($status=="approve"){
           $leave->update([
               'status'=>"Approved"
           ]);
       }elseif($status=="deny"){
           $leave->update([
               'status'=>"Denied"
           ]);
       }else{
           $leave->update([
               'status'=>"Pending"
           ]);
       }
       $today=request()->date;
            if($filtering=='all'){
                $leaveRecords=Leaves::where([
                    ['date',$today],['leaderId',auth()->user()->id]
                    ])->get();
            }else{
                $leaveRecords=Leaves::where([
                    ['date',$today],['status',$filtering],['leaderId',auth()->user()->id]
                    ])->get();
            }
        return view('leave.leaderLeaveForm',compact([
            'today','leaveRecords','filtering'
        ]));
   
    }

    public function filterLeave($filtering,$date){
        $today=$date;
        if($filtering=='all'){
            $leaveRecords=Leaves::where([
                ['date',$today],['leaderId',auth()->user()->id]
                ])->get();
        }else{
            $leaveRecords=Leaves::where([
                ['date',$today],['status',$filtering],['leaderId',auth()->user()->id]
                ])->get();
        }
       

            return view('leave.leaderLeaveForm',compact([
                'today','leaveRecords','filtering'
            ]));
        
    }
}
