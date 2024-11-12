<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = slider::orderBy('id','DESC')->get();
        return view('admin.slider_all', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $fileEx = $image->getClientOriginalExtension();
        $fileName = date('Ydmhis.').$fileEx;

        $image->move(public_path('uploads/slider/'), $fileName);

        $data = new slider();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->image = $fileName;
        $data->save();

        session::flash('success', 'Slider Add Successfully !');

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
        $data = slider::find($id);
        return view('admin.slider_edit',compact('data'));
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
    
            $image->move(public_path('uploads/slider/'), $fileName);
    
            $data = slider::find($id);
            unlink(public_path('uploads/slider/') . $data->image);
            $data->title = $request->title;
            $data->description = $request->description;
            $data->image = $fileName;
            $data->update();
            }
            $request->validate([
                'title' => 'required',
            ]);
    
            $data = slider::find($id);
            $data->title = $request->title;
            $data->description = $request->description;
            $data->update();

            session::flash('success', 'Slider Update Successfully !');
           
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
        $slider = slider::find($id);
        unlink(public_path('uploads/slider/') . $slider->image);
        $slider->delete();

        session::flash('success', 'Slider Delete Successfully !');

        return back();
    }
}
