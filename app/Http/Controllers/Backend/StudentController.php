<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RegularStudent;
use App\Models\RplStudent;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function rplIndex()
    {
        $data = RplStudent::orderBy('id','desc')->get();
        return view('admin.student_all',compact('data'));
    }

    public function index()
    {
        $data = RegularStudent::orderBy('id','desc')->get();
        return view('admin.student_regular_all',compact('data'));
    }


    public function stremRplStudent($id)
    {

        $regularStudent = RplStudent::find($id);
        $pdf = PDF::loadView('frontend.components.rpl_apply-form',compact('regularStudent'))
            ->setPaper( 'a4', 'portrait' )
            ->setOption( ['dpi' => 350, 'defaultFont' => 'sans-serif'] );

        return $pdf->stream('Shilmandi_Training_institiute_center_apply_form.pdf ');

    }

    public function stremStudent($id)
    {

        $regularStudent = RegularStudent::find($id);
        $pdf = PDF::loadView('frontend.components.apply-form',compact('regularStudent'))
            ->setPaper( 'a4', 'portrait' )
            ->setOption( ['dpi' => 350, 'defaultFont' => 'sans-serif'] );

        return $pdf->stream('Shilmandi_Training_institiute_center_apply_form.pdf ');

    }

    public function  destroyRpl($id){
        $rplStudent = RplStudent::find($id);

        // delete image
        $oldImage = public_path('uploads/rpl/'.$rplStudent->image);
        if(file_exists($oldImage)){
            unlink($oldImage);
        }

        // delete signature
        $oldSignature = public_path('uploads/rpl/'.$rplStudent->signature);
        if(file_exists($oldSignature)){
            unlink($oldSignature);
        }

        // delete nid_image

        $oldNidImage = public_path('uploads/rpl/'.$rplStudent->nid_image);

        if(file_exists($oldNidImage)){
            unlink($oldNidImage);
        }

        // delete work_certificate

        $oldWorkCertificate = public_path('uploads/rpl/'.$rplStudent->work_certificate);

        if(file_exists($oldWorkCertificate)){
            unlink($oldWorkCertificate);
        }

        // delete writen_description

        $oldWritenDescription = public_path('uploads/rpl/'.$rplStudent->writen_description);

        if(file_exists($oldWritenDescription)){
            unlink($oldWritenDescription);
        }


        $rplStudent->delete();

        session::flash('success', 'Student Deleted Successfully !');
        return redirect()->back();
    }

    public function  destroy($id){

       $student = RegularStudent::find($id);
        if($student->image){
        // delete image
       $oldImage = public_path('uploads/regular/'.$student->image);
        if(file_exists($oldImage)){
            unlink($oldImage);
        }

        }

        $student->delete();

        session::flash('success', 'Student Deleted Successfully !');
        return redirect()->back();
    }

    public function  updateStatusRpl($id){

       $student = RplStudent::find($id);

       if($student->status == 'pending'){
           $student->status = 'approved';
           $student->save();
       }else{
           $student->status = 'pending';
           $student->update();
       }
        session::flash('success', 'Student updated Successfully !');
        return redirect()->back();
    }

    public function  updateStatus($id){

        $student = RegularStudent::find($id);

        if($student->status == 'pending'){
            $student->status = 'approved';
            $student->save();
        }else{
            $student->status = 'pending';
            $student->update();
        }
        session::flash('success', 'Student updated Successfully !');
        return redirect()->back();
    }
}
