<?php

namespace App\Http\Controllers\OMSControllers\SalaryControllers;

use App\Http\Controllers\Controller;
use App\Models\Pbc;
use App\Models\PbcChangesHistory;
use Illuminate\Http\Request;
use Auth;

class PbcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = Pbc::all();
        return view('pbc.index', compact('list'));
        
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
       
        $validator = validator(request()->all(), [
            'pbcno' => 'required',
            'allowance' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'year'=>'required',
        ]);
        if( $validator->fails() ) {
            return back()->withErrors($validator);
        }

        $pbc= new Pbc;
        $pbc->pbcNo = request()->pbcno;
        $pbc->allowance = request()->allowance;
        $pbc->year = request()->year;
        $pbc->save();
     
        
        $pbcchangeshistory= new PbcChangesHistory;
        $pbcchangeshistory->employeeName= Auth::user()->username;
        $pbcchangeshistory->pbcNo=request()->pbcno;
        $pbcchangeshistory->oldAllowance= 0;
        $pbcchangeshistory->newAllowance=request()->allowance;
        $pbcchangeshistory->year=request()->year;
        $pbcchangeshistory->status='Insert';
        $pbcchangeshistory->pbcid=$pbc->id;
        $pbcchangeshistory->save();
        return redirect('pbc')->with('info','Pbc has been added successfully');
            

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pbc  $pbc
     * @return \Illuminate\Http\Response
     */
    public function show(Pbc $pbc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pbc  $pbc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $edit = Pbc::find($id);
        return view('pbc.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pbc  $pbc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pbc = Pbc::find($id);
        $validator = validator(request()->all(), [
            'pbcno' => 'required',
            'allowance' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'year'=>'required',
        ]);
        if( $validator->fails() ) {
            return back()->withErrors($validator);
        }
        if($pbc->allowance!=request()->allowance){
           
        $pbcchangeshistory= new PbcChangesHistory;
        $pbcchangeshistory->employeeName=Auth::user()->username;
        $pbcchangeshistory->pbcNo=request()->pbcno;
        $pbcchangeshistory->oldAllowance=$pbc->allowance;
        $pbcchangeshistory->newAllowance=request()->allowance;
        $pbcchangeshistory->year=request()->year;
        $pbcchangeshistory->pbcid=$pbc->id;
        $pbcchangeshistory->status='Update';
        $pbcchangeshistory->save();
        $pbc->pbcNo = request()->pbcno;
        $pbc->allowance = request()->allowance;
        $pbc->year = request()->year;
        $pbc->save();
        return redirect('pbc')->with('success','Pbc has been updated successfully');
        }
        else{
            $pbc->pbcNo = request()->pbcno;
            $pbc->allowance = request()->allowance;
            $pbc->year = request()->year;
            $pbc->save();
            return redirect('pbc');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pbc  $pbc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pbc = Pbc::find($id);
        dd('show');
        $pbcchangeshistory= new PbcChangesHistory;
        $pbcchangeshistory->employeeName=Auth::user()->username;
        $pbcchangeshistory->pbcNo=$pbc->pbcNo;
        $pbcchangeshistory->oldAllowance=$pbc->allowance;
        $pbcchangeshistory->newAllowance=0;
        $pbcchangeshistory->year=$pbc->year;
        $pbcchangeshistory->pbcid=$pbc->id;
        $pbcchangeshistory->status='Delete';
        $pbcchangeshistory->save();

        $pbc->delete();
        return back()->with('info', 'Pbc has been deleted successfully');
    }
}
