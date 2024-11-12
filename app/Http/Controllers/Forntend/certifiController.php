<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use App\Models\certificate;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class certifiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = certificate::where('certificate_type', 1)->latest()->paginate(20);
        return view('frontend.regular_certificate',compact('data')); 
    }

    /**
     * download the form for creating a new resource.
     */
    public function regular_download(string $id)
    {
        $data = certificate::find($id);
        if ($data) {
            $pdf  = Pdf::loadView( 'frontend.components.certificate',compact('data') )
            ->setPaper( 'a4', 'landscape' )
            ->setOption( ['dpi' => 350, 'defaultFont' => 'sans-serif'] );

            // $options = $pdf->getOptions();
            // $options->setFontCache(storage_path('fonts'));
            // $options->set('isRemoteEnabled', true);
            // $options->set('pdfBackend', 'CPDF');
            // $options->setChroot([
            //     'resources/views/',
            //     storage_path('fonts'),
            // ]);

        return $pdf->download( 'Certificate.pdf' );
        }
        return redirect()->back();
    }

      public function search(Request $request){

    if($request->ajax()){

        $data=certificate::where('reg_id','like','%'.$request->search.'%')
        ->orwhere('student_name','like','%'.$request->search.'%')
        ->orwhere('course_name','like','%'.$request->search.'%')->get();


        $output='';
    if(count($data)>0){

         $output ="
            <table class='table'>
            <thead class='notice-board-header'>
            <tr>
                <th scope='col'>Regestration No.</th>
                <th scope='col'>Student Name</th>
                <th scope='col'>Course Name</th>
                <th scope='col'>Download</th>
            </tr>
            </thead>
            <tbody>";

                foreach($data as $row){
                    $route = route('certificate-download',$row->id);

                    $output .="
                    <tr>
                    <th scope='row'>$row->reg_id</th>
                    <td>$row->student_name</td>
                    <td>$row->course_name</td>
                    <td><a class='btn-primary p-1 rounded' href='$route'>Download</a></td>
                    </tr>
                    ";
                }



         $output .= '
             </tbody>
            </table>';



    }
    else{

        $output .='No results';

    }

    return $output;

    }




  }


//   rpl certificate

public function rpl()
    {
        $data = certificate::where('certificate_type', 2)->latest()->paginate(20);
        return view('frontend.rpl_certificate',compact('data')); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = certificate::find($id);
        if ($data) {

        // return $data->description;
        return redirect('https://'.$data->description);
        }
        return redirect()->back();
    }

    public function rpl_search(Request $request){

        if($request->ajax()){
            
            $data=certificate::where('reg_id','like','%'.$request->search.'%')
            ->orwhere('student_name','like','%'.$request->search.'%')
            ->orwhere('course_name','like','%'.$request->search.'%')
            ->orwhere('certificate_type', 2)->get();
    
    
            $output='';
        if(count($data)>0){
    
             $output ="
                <table class='table'>
                <thead class='notice-board-header'>
                <tr>
                    <th scope='col'>Regestration No.</th>
                    <th scope='col'>Student Name</th>
                    <th scope='col'>Course Name</th>
                    <th scope='col'>Download</th>
                </tr>
                </thead>
                <tbody>";
    
                    foreach($data as $row){
                        $route = route('rpl-certificate-download',$row->id);
    
                        $output .="
                        <tr>
                        <th scope='row'>$row->reg_id</th>
                        <td>$row->student_name</td>
                        <td>$row->course_name</td>
                        <td><a class='btn-primary p-1 rounded' href='$route'>Download</a></td>
                        </tr>
                        ";
                    }
    
    
    
             $output .= '
                 </tbody>
                </table>';
    
    
    
        }
        else{
    
            $output .='No results';
    
        }
    
        return $output;
    
        }
    
    
    
    
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
