<?php

namespace App\Http\Controllers\OMSControllers\SalaryControllers;

use App\Http\Controllers\Controller;
use App\Models\Pbc;
use Illuminate\Http\Request;

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
        return view('pbc.index');
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
    public function edit(Pbc $pbc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pbc  $pbc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pbc $pbc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pbc  $pbc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pbc $pbc)
    {
        //
    }
}
