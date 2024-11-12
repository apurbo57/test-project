<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\notice;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class noticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = notice::orderBy('id','DESC')->get();
        return view('admin.notice_all', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.notice_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'notice' => 'required',
        ]);
        $data = new notice();
        $data->title = $request->title;
        $data->notice = $request->notice;
        $data->save();

        session::flash('success', 'Notice Add Successfully !');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = notice::find($id);
        return view('admin.notice_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'notice' => 'required',
        ]);
        $data = notice::find($id);
        $data->title = $request->title;
        $data->notice = $request->notice;
        $data->update();

        session::flash('success', 'Notice Update Successfully !');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notice = notice::find($id);
        $notice->delete();

        session::flash('success', 'Notice Delete Successfully !');

        return back();
    }

    public function timelineIndex()
    {
        $timeline = Timeline::first();
        return view('admin.timeline-update',compact('timeline'));
    }

    public  function updateIndex(Request $request){
        $request->validate([
            'timeline' => 'required',
        ]);
        $timeline = Timeline::first();

        if(!$timeline){
            $timeline = new Timeline();
        }
        $timeline->timeline = $request->timeline;
        $timeline->save();

        session::flash('success', 'Timeline Update Successfully !');

        return back();
    }
}
