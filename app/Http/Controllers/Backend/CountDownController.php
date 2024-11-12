<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Countdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CountDownController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Countdown::find(1);
        return view('admin.count_down',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'batches' => 'required',
            'student' => 'required',
            'jobplacement' => 'required',
            'trainer' => 'required',
        ]);
        $data = Countdown::find($id);
        $data->batches = $request->batches;
        $data->student = $request->student;
        $data->jobplacement = $request->jobplacement;
        $data->trainer = $request->trainer;
        $data->update();

        session::flash('success', 'Count Down Update Successfully !');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
