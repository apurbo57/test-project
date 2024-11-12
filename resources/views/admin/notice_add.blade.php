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
            <a href="#">Add Notice</a>
        </li>
    </ul>
<div class="row-fluid sortable">
  @include('includes.message')
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Notice</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
        <form class="form-horizontal" action="{{route('admin.save-notice')}}" method="post">
          @csrf
              <fieldset>
                  <div class="control-group">
                      <label class="control-label" for="typeahead">Title</label>
                      <div class="controls">
                        <input type="text" class="span6 typeahead" name="title" value="{{Request::old('title')}}" id="typeahead" >
                      </div>
                    </div>
                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Notice</label>
                  <div class="controls">
                    <textarea class="cleditor" name="notice" id="textarea2" rows="2">{{Request::old('description')}}</textarea>
                  </div>
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Notice</button>
                  <a href="{{ url()->previous() }}" class="btn">Cancle</a>
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection