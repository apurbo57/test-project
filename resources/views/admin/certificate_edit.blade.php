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
            <a href="#">Edit Certificate</a>
        </li>
    </ul>
<div class="row-fluid sortable">
  @include('includes.message')
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Certificate</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
        <form class="form-horizontal" action="{{route('admin.update-certificate',$data->id)}}" method="post">
          @csrf
          @method('put')
              <fieldset>
                  <div class="control-group">
                      <label class="control-label" for="typeahead">Regestration No.</label>
                      <div class="controls">
                        <input type="number" class="span6 typeahead" name="reg_no" value="{{ $data->reg_id }}" id="typeahead" >
                      </div>
                    </div>
                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Student Name</label>
                  <div class="controls">
                        <input type="text" class="span6 typeahead" name="student_name" value="{{ $data->student_name }}" id="typeahead" >
                  </div>
                </div>
                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Course Name</label>
                  <div class="controls">
                        <input type="text" class="span6 typeahead" name="course_name" value="{{ $data->course_name }}" id="typeahead" >
                  </div>
                </div>
                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">About</label>
                  <div class="controls">
                    <textarea class="cleditor" name="description" id="textarea2" rows="2">{{ $data->description }}</textarea>
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Certificate Type</label>
                    <div class="controls">
                      <label class="radio">
                      <input type="radio" name="certificate_type" id="optionsRadios1" value="1" {{ ($data->certificate_type=="1")? "checked" : "" }}>
                      Regular
                      </label>
                      <div style="clear:both"></div>
                      <label class="radio">
                      <input type="radio" name="certificate_type" id="optionsRadios2" value="2" {{ ($data->certificate_type=="2")? "checked" : "" }}>
                      RPL
                      </label>
                    </div>
                    </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Update Certificate</button>
                  <a href="{{ url()->previous() }}" class="btn">Cancle</a>
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection