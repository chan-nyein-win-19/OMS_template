<?php

namespace App\Http\Controllers\OMSControllers\SalaryControllers;

use App\Http\Controllers\Controller;
use App\Models\PbcChangesHistory;
use Illuminate\Http\Request;

class PbcChangesHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = PbcChangesHistory::all();
        return view('pbcchangeshistory.index', compact('list'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PbcChangesHistory  $pbcChangesHistory
     * @return \Illuminate\Http\Response
     */
    public function show(PbcChangesHistory $pbcChangesHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PbcChangesHistory  $pbcChangesHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(PbcChangesHistory $pbcChangesHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PbcChangesHistory  $pbcChangesHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PbcChangesHistory $pbcChangesHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PbcChangesHistory  $pbcChangesHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PbcChangesHistory $pbcChangesHistory)
    {
        //
    }
}
