<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class courseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = course::orderBy('id','DESC')->get();
        return view('admin.course_all', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = teacher::orderBy('id','DESC')->get();
        return view('admin.course_add',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required',
            'teacher_id' => 'required',
            'course_description' => 'required',
            'course_price' => 'required',
            'reg_date' => 'required',
            'ass_date' => 'required',
            'batch_no' => 'required',
            'classes' => 'required',
            'course_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        // single image uplode

        $image = $request->file('course_image');
        $fileEx = $image->getClientOriginalExtension();
        $fileName = date('Ydmhis.').$fileEx;
        $request->course_image->move(public_path('uploads/course'), $fileName);
        
        try {

            $course = new course();
            $course->course_name = $request->course_name;
            $course->teacher_id = $request->teacher_id;
            $course->course_description = $request->course_description;
            $course->course_price = $request->course_price;
            $course->reg_date = $request->reg_date;
            $course->ass_date = $request->ass_date;
            $course->batch_no = $request->batch_no;
            $course->classes = $request->classes;
            $course->course_type = $request->course_type;
            $course->image = $fileName;

            $course->save();
            session::flash('success', 'Course Add Successfully !');
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
        $course = course::find($id);
        $teachers = teacher::orderBy('id','DESC')->get();
        return view('admin.course_edit',compact('course','teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->course_image) {
        $request->validate([
            'course_name' => 'required',
            'teacher_id' => 'required',
            'course_description' => 'required',
            'course_price' => 'required',
            'reg_date' => 'required',
            'ass_date' => 'required',
            'batch_no' => 'required',
            'classes' => 'required',
            'course_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        // single image uplode

        $image = $request->file('course_image');
        $fileEx = $image->getClientOriginalExtension();
        $fileName = date('Ydmhis.').$fileEx;
        $request->course_image->move(public_path('uploads/course'), $fileName);

        
        try {

            $course = course::find($id);
            unlink(public_path('uploads/course/') . $course->image);
            $course->course_name = $request->course_name;
            $course->teacher_id = $request->teacher_id;
            $course->course_description = $request->course_description;
            $course->course_price = $request->course_price;
            $course->reg_date = $request->reg_date;
            $course->ass_date = $request->ass_date;
            $course->batch_no = $request->batch_no;
            $course->classes = $request->classes;
            $course->course_type = $request->course_type;
            $course->image = $fileName;

            $course->update();
            session::flash('success', 'Course Update Successfully !');
          } catch (\Exception $e) {
          
              return $e->getMessage();
          }
        }
        $request->validate([
            'course_name' => 'required',
            'teacher_id' => 'required',
            'course_description' => 'required',
            'course_price' => 'required',
            'reg_date' => 'required',
            'ass_date' => 'required',
            'batch_no' => 'required',
            'classes' => 'required',
        ]);
        try {

            $course = course::find($id);
            $course->course_name = $request->course_name;
            $course->teacher_id = $request->teacher_id;
            $course->course_description = $request->course_description;
            $course->course_price = $request->course_price;
            $course->reg_date = $request->reg_date;
            $course->ass_date = $request->ass_date;
            $course->batch_no = $request->batch_no;
            $course->classes = $request->classes;
            $course->course_type = $request->course_type;

            $course->update();
            session::flash('success', 'Course Update Successfully !');
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
        $course = course::find($id);

        unlink(public_path('uploads/course/') . $course->image);

        // $images = json_decode($product->image_gallery);
        // foreach ($images as $file) {
        //     unlink(public_path('uploads/product/') . $file);
        // }
        
        $course->delete();

        session::flash('success', 'Course Delete Successfully !');

        return back();
    }
}
