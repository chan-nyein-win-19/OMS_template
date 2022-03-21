<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pbc;
use App\Models\English;
use App\Models\Japan;
use App\Models\Education;
use App\Models\Band;
use App\Models\Itskill;
use App\Models\CasualLeave;
use App\Models\UserHistory;
use App\Models\UserItSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = User::all();
        return view('user.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pbcList=Pbc::all();
        $educationList=Education::all();
        $japanList=Japan::all();
        $englishList=English::all();
        $bandList=Band::all();
        $itSkills=Itskill::select('name')->get();
        return view('tempUser.create',compact(['pbcList','educationList','japanList','englishList','bandList','itSkills']));
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
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
            'employeeid' => 'required|unique:users|integer',
            'role' => 'required',
            'NRC'=>'required',
            'gender'=>'required',
            'marriageStatus'=>'required',
            'DOB'=>'required',
            'phNo'=>'required',
            'travelFees'=>'required',
            'address'=>'required',
            'office'=>'required',
            'batch'=>'required',
            'joinDate'=>'required',
            'workExp'=>'required',
            'education'=>'required',
            'degree'=>'required',
            'band'=>'required',
            'japanese'=>'required',
            'english'=>'required',
            'casualLeave'=>'required',
        ]);
        

        $casualLeave=new CasualLeave();
        $casualLeave->payLeave=request()->casualLeave;
        $casualLeave->usedLeave=0;
        $casualLeave->leaveWithoutPay=0;
        $casualLeave->save();

        $tempItSkill=array();
        $itSkillLists=explode(",",request()->itSkills);
        foreach($itSkillLists as $itSkillname){
            $itSkill=Itskill::where([['name',$itSkillname]])->first();
            if($itSkill!=null){
                array_push($tempItSkill,$itSkillname);
            }
        }
        $allItSkills=implode(",",$tempItSkill);

        $user = new User();
        $user->username = request()->username;
        $user->email = request()->email;
        $user->password = Hash::make(request()->password);
        $user->employeeid = request()->employeeid;
        $user->role = request()->role;
        $user->NRC = request()->NRC;
        $user->gender = request()->gender;
        $user->marriageStatus = request()->marriageStatus;
        $user->DOB = request()->DOB;
        $user->phNo = request()->phNo;
        $user->travelFees = request()->travelFees;
        $user->address = request()->address;
        $user->office = request()->office;
        $user->batch = request()->batch;
        $user->joinDate = request()->joinDate;
        $user->workExp = request()->workExp;
        $user->gicmExp = 0;
        $user->education = request()->education;
        $user->bandId = request()->band;
        $user->PBCId = request()->pbc;
        $user->educationId = request()->degree;
        $user->japaneseId = request()->japanese;
        $user->englishId = request()->english;
        $user->casualLeaveId=$casualLeave->id;
        $user->itSkills=$allItSkills;
        $user->save();

       
        foreach($itSkillLists as $itSkillname){
            $itSkill=Itskill::where([['name',$itSkillname]])->first();
            if($itSkill!=null){
            $userItSkill=new UserItSkill();
            $userItSkill->userId=$user->id;
            $userItSkill->itSkillId=$itSkill->id;
            $userItSkill->save();
            }
        }

        $userHistory = new UserHistory();
        $userHistory->userId = $user->id;
        $userHistory->username = request()->username;
        $userHistory->email = request()->email;
        $userHistory->employeeid = request()->employeeid;
        $userHistory->role = request()->role;
        $userHistory->NRC = request()->NRC;
        $userHistory->gender = request()->gender;
        $userHistory->marriageStatus = request()->marriageStatus;
        $userHistory->DOB = request()->DOB;
        $userHistory->phNo = request()->phNo;
        $userHistory->travelFees = request()->travelFees;
        $userHistory->address = request()->address;
        $userHistory->office = request()->office;
        $userHistory->batch = request()->batch;
        $userHistory->joinDate = request()->joinDate;
        $userHistory->workExp = request()->workExp;
        $userHistory->gicmExp = 0;
        $userHistory->education = request()->education;
        $userHistory->bandId = request()->band;
        $userHistory->PBCId = request()->pbc;
        $userHistory->educationId = request()->degree;
        $userHistory->japaneseId = request()->japanese;
        $userHistory->englishId = request()->english;
        $userHistory->casualLeaves=request()->casualLeave;
        $userHistory->accessUserId=auth()->user()->id;
        $userHistory->itSkills=$allItSkills;
        $userHistory->save();

        return redirect('users')->with('success','User has been created successfully!!');;
    }
    public function itSkill(){
        $data=Itskill::select('name')->get();
        return response()->json_encode($data);
    }

    public function edit($id)
    {
        $edit = User::find($id);
        $pbcList=Pbc::all();
        $educationList=Education::all();
        $japanList=Japan::all();
        $englishList=English::all();
        $bandList=Band::all();
        $itSkills=Itskill::select('name')->get();
        return view('tempUser.edit',compact(['edit','pbcList','educationList','japanList','englishList','bandList','itSkills']));
    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);

        $validateData = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id.'',
            'employeeid' => 'required|unique:users,employeeid,'.$user->id.'|integer',
            'role' => 'required',
            'NRC'=>'required',
            'gender'=>'required',
            'marriageStatus'=>'required',
            'DOB'=>'required',
            'phNo'=>'required',
            'travelFees'=>'required',
            'address'=>'required',
            'office'=>'required',
            'batch'=>'required',
            'joinDate'=>'required',
            'workExp'=>'required',
            'education'=>'required',
            'degree'=>'required',
            'band'=>'required',
            'japanese'=>'required',
            'english'=>'required',
            'casualLeave'=>'required',
        ]);

        $tempItSkill=array();
        $itSkillLists=explode(",",request()->itSkills);
        foreach($itSkillLists as $itSkillname){
            $itSkill=Itskill::where([['name',$itSkillname]])->first();
            if($itSkill!=null){
                array_push($tempItSkill,$itSkillname);
            }
        }
        $allItSkills=implode(",",$tempItSkill);

        
        $user =User::find($id);

        $casualLeave=CasualLeave::find($user->casualLeaveId);
        if($casualLeave!=null){
            $casualLeave->payLeave=request()->casualLeave; 
            $casualLeave->save();
        }else{
            $casualLeave=new CasualLeave();
            $casualLeave->payLeave=request()->casualLeave;
            $casualLeave->usedLeave=0;
            $casualLeave->leaveWithoutPay=0;
            $casualLeave->save();
        }

        $user->username = request()->username;
        $user->email = request()->email;
        $user->employeeid = request()->employeeid;
        $user->role = request()->role;
        $user->NRC = request()->NRC;
        $user->gender = request()->gender;
        $user->marriageStatus = request()->marriageStatus;
        $user->DOB = request()->DOB;
        $user->phNo = request()->phNo;
        $user->travelFees = request()->travelFees;
        $user->address = request()->address;
        $user->office = request()->office;
        $user->batch = request()->batch;
        $user->joinDate = request()->joinDate;
        $user->workExp = request()->workExp;
        $user->gicmExp = 0;
        $user->education = request()->education;
        $user->bandId = request()->band;
        $user->PBCId = request()->pbc;
        $user->educationId = request()->degree;
        $user->japaneseId = request()->japanese;
        $user->englishId = request()->english;
        $user->casualLeaveId=$casualLeave->id;
        $user->itSkills=$allItSkills;
        $user->save();

        

        $existingItSkills=UserItSkill::where([['userId',$user->id]])->get();
        foreach($existingItSkills as $itSkill){
            $itSkill->delete();
        }
        foreach($itSkillLists as $itSkillname){
            $itSkill=Itskill::where([['name',$itSkillname]])->first();
            if($itSkill!=null){
            $userItSkill=new UserItSkill();
            $userItSkill->userId=$user->id;
            $userItSkill->itSkillId=$itSkill->id;
            $userItSkill->save();
            }
        }

        $userHistory = new UserHistory();
        $userHistory->userId = $user->id;
        $userHistory->username = request()->username;
        $userHistory->email = request()->email;
        $userHistory->employeeid = request()->employeeid;
        $userHistory->role = request()->role;
        $userHistory->NRC = request()->NRC;
        $userHistory->gender = request()->gender;
        $userHistory->marriageStatus = request()->marriageStatus;
        $userHistory->DOB = request()->DOB;
        $userHistory->phNo = request()->phNo;
        $userHistory->travelFees = request()->travelFees;
        $userHistory->address = request()->address;
        $userHistory->office = request()->office;
        $userHistory->batch = request()->batch;
        $userHistory->joinDate = request()->joinDate;
        $userHistory->workExp = request()->workExp;
        $userHistory->gicmExp = 0;
        $userHistory->education = request()->education;
        $userHistory->bandId = request()->band;
        $userHistory->PBCId = request()->pbc;
        $userHistory->educationId = request()->degree;
        $userHistory->japaneseId = request()->japanese;
        $userHistory->englishId = request()->english;
        $userHistory->casualLeaves=request()->casualLeave;
        $userHistory->accessUserId=auth()->user()->id;
        $userHistory->itSkills=$allItSkills;
        $userHistory->save();
        
        return redirect("users")->with('success','User has been updated successfully!');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = User::find($user->id);
        $user->delete();

        return back();
    }
}