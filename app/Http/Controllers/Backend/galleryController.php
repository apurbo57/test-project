<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class galleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = gallery::orderBy('id','DESC')->get();
        return view('admin.gallery_all', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
        ]);

        $image = $request->file('image');
        $fileEx = $image->getClientOriginalExtension();
        $fileName = date('Ydmhis.').$fileEx;

        $image->move(public_path('uploads/images/'), $fileName);

        $data = new gallery();
        $data->title = $request->title;
        $data->image = $fileName;
        $data->save();

        session::flash('success', 'Image Add Successfully !');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            if($request->image){
             $request->validate([
                 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             ]);
     
             $image = $request->file('image');
             $fileEx = $image->getClientOriginalExtension();
             $fileName = date('Ydmhis.').$fileEx;
     
             $image->move(public_path('uploads/images/'), $fileName);
     
             $data = gallery::find($id);
             unlink(public_path('uploads/images/') . $data->image);
             $data->title = $request->title;
             $data->image = $fileName;
             $data->update();
             }
             $request->validate([
                 'title' => 'required',
             ]);
     
             $data = gallery::find($id);
             $data->title = $request->title;
             $data->update();
 
             session::flash('success', 'Image Update Successfully !');
            
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
        $slider = gallery::find($id);
        unlink(public_path('uploads/images/') . $slider->image);
        $slider->delete();

        session::flash('success', 'Image Delete Successfully !');

        return back();
    }
}
