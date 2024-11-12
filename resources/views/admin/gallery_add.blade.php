@extends('admin_layout')

@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{route('dashboard')}}">Dashboard</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Add Image</a>
        </li>
    </ul>
<div class="row-fluid sortable">
  @include('includes.message')
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Image</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
        <form class="form-horizontal" action="{{route('admin.save-gallery')}}" method="post" enctype="multipart/form-data">
          @csrf
              <fieldset>
                
                <div class="control-group">
                  <label class="control-label" for="typeahead">Title</label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="title" value="{{Request::old('title')}}" id="typeahead" >
                  </div>
                </div>
                  <div class="control-group">
                    <label class="control-label" for="typeahead">Gallery Image</label>
                    <div class="controls">
                      <input type="file" class="span6 typeahead" name="image" id="typeahead" >
                    </div>
                  </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Image</button>
                  <a href="{{ url()->previous() }}" class="btn">Cancle</a>
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection