<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\Pcrent;
use App\Models\Pc;
use Illuminate\Http\Request;
use Validator;

class PcrentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pcrent=Pcrent::all();
        
        return view('pcrent.index',compact('pcrent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $pc=Pc::where('status','available')->get();
        return view('pcrent.create',compact('pc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=validator(request()->all(),[
            'employeeid'=>'required',
            'employeename'=>'required',
            'pcid'=>'required',
            'remark'=>'required',
            'error'=>'required',
        ]);
         
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
        
        $pcrent=new Pcrent();
        $pcrent->employeeId=request()->employeeid;
        $pcrent->employeename=request()->employeename;
        $pcrent->pcid=request()->pc;        
        $pcrent->error=request()->error;
        $pcrent->remark=request()->remark;
        $pcrent->save();
        $pc=Pc::find(request()->pc);
        $pc->status='unavailable';
        $pc->save();
    
        return back()->with('success','PC Purchase has been added successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pcrent  $pcrent
     * @return \Illuminate\Http\Response
     */
    public function show(Pcrent $pcrent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pcrent  $pcrent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $edit=Pcrent::find($id);
        $pc = Pc::all();
        return view('pcrent.edit',compact(['edit','pc']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pcrent  $pcrent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator=validator(request()->all(),[
            'employeeid'=>'required',
            'employeename'=>'required',
            'pc'=>'required',
            'remark'=>'required',
            'error'=>'required',
         ]);
        $pcrent = Pcrent::find($id);
        $pcrent->employeeId=request()->employeeid;
        $pcrent->employeename=request()->employeename;
        $pcrent->pcid=request()->pc;
        $pcrent->error=request()->error;
        $pcrent->remark=request()->remark;
        $pcrent->save();
        return redirect("pcrent")->with('info','Pcrent has been updated successfully!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pcrent  $pcrent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pcrent = Pcrent::where('id',$id)->delete();
        $pc=Pc::find(request()->pc);
        $pc->status='available';
        $pc->save();
        return redirect('pcrent');
    }
}
