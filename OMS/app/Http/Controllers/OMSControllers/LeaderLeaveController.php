<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\Leaves;
use App\Models\User;
use Illuminate\Http\Request;

class LeaderLeaveController extends Controller
{
    //Leader Section
     public function viewLeave(){
        $today = date('Y-m-d');
        $filtering = 'all';
        $leaveRecords = Leaves::where('date',$today)->where([
            [
                'date',$today
            ],
            [
                'leaderId',auth()->user()->id
            ]
        ])->get();

        return view('leave.leaderLeaveForm',compact([
            'today','leaveRecords','filtering'
        ]));
    }

    public function findLeave(Request $request){
        $today = request()->date;
        $filtering = request()->filtering;
        $leaveRecords = Leaves::where([
            [
                'date',$today
            ],
            [
                'leaderId',auth()->user()->id
            ]
        ])->get();
        
        return view('leave.leaderLeaveForm',compact([
            'today','leaveRecords','filtering'
        ]));
    }

    public function changeStatus($id,$status,$date,$filtering){
        $leave = Leaves::find($id);
        $today = $date;
        if($status == "approve"){
            $leave->update([
               'status' => "Approved"
            ]);
        }elseif($status == "deny"){
            $leave->update([
               'status' => "Denied"
            ]);
        }else{
            $leave->update([
               'status' => "Pending"
            ]);
        }
        $today = request()->date;
            if($filtering == 'all'){
                $leaveRecords = Leaves::where([
                    [
                        'date',$today
                    ],
                    [
                        'leaderId',auth()->user()->id
                    ]
                ])->get();
            }else{
                $leaveRecords=Leaves::where([
                    [
                        'date',$today
                    ],
                    [
                        'status',$filtering
                    ],
                    [
                        'leaderId',auth()->user()->id
                    ]
                ])->get();
            }
        return view('leave.leaderLeaveForm',compact([
            'today','leaveRecords','filtering'
        ]));
   
    }

    public function filterLeave($filtering,$date){
        $today = $date;
        if($filtering == 'all'){
            $leaveRecords = Leaves::where([
                [
                    'date',$today
                ],
                [
                    'leaderId',auth()->user()->id
                ]
            ])->get();
        }else{
            $leaveRecords=Leaves::where([
                [
                    'date',$today
                ],
                [
                    'status',$filtering
                ],
                [
                    'leaderId',auth()->user()->id
                ]
            ])->get();
        }
       
        return view('leave.leaderLeaveForm',compact([
            'today','leaveRecords','filtering'
        ]));
        
    }
}
