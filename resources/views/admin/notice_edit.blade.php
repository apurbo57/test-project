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
            <a href="#">Edit Notice</a>
        </li>
    </ul>
<div class="row-fluid sortable">
  @include('includes.message')
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Notice</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
        <form class="form-horizontal" action="{{route('admin.update-notice',$data->id)}}" method="post">
          @csrf
          @method('put')
              <fieldset>
                  <div class="control-group">
                      <label class="control-label" for="typeahead">Title</label>
                      <div class="controls">
                        <input type="text" class="span6 typeahead" name="title" value="{{ $data->title }}" id="typeahead" >
                      </div>
                    </div>
                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Notice</label>
                  <div class="controls">
                    <textarea class="cleditor" name="notice" id="textarea2" rows="2">{{ $data->notice }}</textarea>
                  </div>
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Update Notice</button>
                  <a href="{{ url()->previous() }}" class="btn">Cancle</a>
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection