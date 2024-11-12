<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = teacher::orderBy('id','DESC')->get();
        return view('admin.teacher_all', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teacher_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'phone' => 'required|max:11',
            'email' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'required'
        ]);

        // single image uplode

        $image = $request->file('image');
        $fileEx = $image->getClientOriginalExtension();
        $fileName = date('Ydmhis.').$fileEx;
        $request->image->move(public_path('uploads/teacher'), $fileName);

        try {

            $course = new teacher();
            $course->name = $request->name;
            $course->type = $request->type;
            $course->designation = $request->designation;
            $course->description = $request->description;
            $course->phone = $request->phone;
            $course->email = $request->email;
            $course->image = $fileName;

            $course->save();
            session::flash('success', 'Teacher Add Successfully !');
          } catch (\Exception $e) {

              return $e->getMessage();
          }

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
        $teacher = teacher::find($id);
        return view('admin.teacher_edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if ($request->image) {
            $request->validate([
                'name' => 'required',
                'designation' => 'required',
                'description' => 'required',
                'phone' => 'required|max:11',
                'email' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'type' => 'required'
            ]);

            // single image uplode

            $image = $request->file('image');
            $fileEx = $image->getClientOriginalExtension();
            $fileName = date('Ydmhis.').$fileEx;
            $request->image->move(public_path('uploads/teacher'), $fileName);


            try {

                $course = teacher::find($id);
                unlink(public_path('uploads/teacher/') . $course->image);
                $course->name = $request->name;
                $course->type = $request->type;
                $course->designation = $request->designation;
                $course->description = $request->description;
                $course->phone = $request->phone;
                $course->email = $request->email;
                $course->image = $fileName;

                $course->update();
                session::flash('success', 'Teacher Update Successfully !');
              } catch (\Exception $e) {

                  return $e->getMessage();
              }
            }
            $request->validate([
                'name' => 'required',
                'designation' => 'required',
                'description' => 'required',
                'phone' => 'required|max:11',
                'email' => 'required',
            ]);
            try {

                $course = teacher::find($id);
                $course->name = $request->name;
                $course->type = $request->type;
                $course->designation = $request->designation;
                $course->description = $request->description;
                $course->phone = $request->phone;
                $course->email = $request->email;

                $course->update();
                session::flash('success', 'Teacher Update Successfully !');
              } catch (\Exception $e) {

                  return $e->getMessage();
              }

            return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = teacher::find($id);

        unlink(public_path('uploads/teacher/') . $course->image);

        $course->delete();

        session::flash('success', 'Teacher Delete Successfully !');

        return back();
    }
}
