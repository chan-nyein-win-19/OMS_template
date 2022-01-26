<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct(){
        $this->middleware('auth')->except(['index']);
    }


    public function index()
    {
        $list =  Announcement::all();
        return view('announcement.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validateData= $request->validate([
            'title' => 'required',
            'content' => 'required',
         ]);
         

        $announcement = new Announcement;
        $announcement->title=request()->title;
        $announcement->content=request()->content;
        $announcement->save();
        return redirect('/announcements/create')->with('info','Announcements Successfully Added...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ann=Announcement::find($id);
        
        return view('announcement.show',compact('ann'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Announcement::find($id);
        
        return view('announcement.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validateData= $request->validate([
            'title' => 'required',
            'content' => 'required',
         ]);
        $announcement = Announcement::find($id);
        $announcement->title=request()->title;
        $announcement->content=request()->content;
        $announcement->save();
        /*return redirect("announcements/".$id."/edit")->with('success','Announcement has been updated successfully!!');*/
        return redirect("announcements")->with('success','Announcement has been updated successfully!!');
        /*return back()->withErrors([
    'email' => 'The provided credentials do not match our records.',*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $delete = $announcement::find($announcement->id);
        $delete -> delete();
        return back();
    }
}
?>