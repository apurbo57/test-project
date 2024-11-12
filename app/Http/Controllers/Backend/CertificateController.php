<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = certificate::orderBy('id','DESC')->get();
        return view('admin.certificate_all', compact('data')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.certificate_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reg_no' => 'required',
            'student_name' => 'required',
            'course_name' => 'required',
            'description' => 'required',
            'certificate_type' => 'required',
        ]);
        $data = new certificate();
        $data->reg_id = $request->reg_no;
        $data->student_name = $request->student_name;
        $data->course_name = $request->course_name;
        $data->description = $request->description;
        $data->certificate_type = $request->certificate_type;
        $data->save();

        session::flash('success', 'Certificate Add Successfully !');

        return back();
    }

    /**
     * Display the specified resource.
     */
     public function stream(string $id)
    {
        $data = certificate::find($id);
        if ($data) {
            $pdf  = Pdf::loadView( 'frontend.components.certificate',compact('data') )
            ->setPaper( 'a4', 'landscape' )
            ->setOption( ['dpi' => 350, 'defaultFont' => 'sans-serif'] );

        return $pdf->stream( 'Certificate.pdf' );
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = certificate::find($id);
        return view('admin.certificate_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'reg_no' => 'required',
            'student_name' => 'required',
            'course_name' => 'required',
            'description' => 'required',
            'certificate_type' => 'required',
        ]);
        $data = certificate::find($id);
        $data->reg_id = $request->reg_no;
        $data->student_name = $request->student_name;
        $data->course_name = $request->course_name;
        $data->description = $request->description;
        $data->certificate_type = $request->certificate_type;
        $data->update();

        session::flash('success', 'Certificate Update Successfully !');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notice = certificate::find($id);
        $notice->delete();

        session::flash('success', 'Certificate Delete Successfully !');

        return back();
    }
}
